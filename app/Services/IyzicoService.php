<?php

namespace App\Services;

use App\Http\Requests\PaymentRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\OrderPaymentApprove;
use App\Models\OrderPaymentItem;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Iyzipay\Model\Address;
use Iyzipay\Model\Approval;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Model\SubMerchant;
use Iyzipay\Model\SubMerchantType;
use Iyzipay\Model\ThreedsInitialize;
use Iyzipay\Model\ThreedsPayment;
use Iyzipay\Options;
use Iyzipay\Request\CreateApprovalRequest;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\CreateSubMerchantRequest;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;

class IyzicoService
{
    /**
     * Iyzico options
     */
    static $options;

    /**
     * CommissionFee Service
     */
    public $commissionFeeService;

    /**
     * Create a new component instance.
     * @param  \Iyzipay\Options  $options
     * @param  \App\Services\ComissionFeeService  $comissionFeeService
     * @return void
     */
    public function __construct(Options $options, CommissionFeeService $commissionFeeService)
    {
        $this->commissionFeeService = $commissionFeeService;
        self::$options              = $options;
    }

    /**
     * Create Personel SubMerchant
     * @param  \App\Models\User  $user
     */
    public function createPersonelSubMerchant(User $user)
    {
        $request = new CreateSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setSubMerchantExternalId($user->company->id);
        $request->setSubMerchantType(SubMerchantType::PERSONAL);
        $request->setAddress($user->address);
        $request->setContactName($user->getFirstAndLastName()['firstName']);
        $request->setContactSurname($user->getFirstAndLastName()['lastName']);
        $request->setEmail($user->email);
        $request->setGsmNumber($user->phone);
        $request->setName($user->company->title);
        $request->setIban('TR' . $user->iban->iban);
        $request->setIdentityNumber($user->tc);
        $request->setCurrency(Currency::TL);

        return SubMerchant::create($request, self::options());
    }

    /**
     * Threeds Initialize
     * @param  \App\Http\Requests\PaymentRequest  $paymentRequest
     * @param  \App\Models\Company  $company
     * @param  \App\Models\Order  $order
     */
    public function threedsInitialize(PaymentRequest $paymentRequest, Company $company, Order $order)
    {
        $cardExpire = explode('/', $paymentRequest->cardExpires);
        $totalCount = Cart::count() + ($company->cargoPrice() ? 1 : 0);

        /**
         * Price Informations
         */
        $request = new CreatePaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId($order->id);
        $request->setPrice(Cart::total(null, '.', '') + $company->cargoPrice());
        $request->setPaidPrice(Cart::total(null, '.', '') + $company->cargoPrice());
        $request->setCurrency(Currency::TL);
        $request->setInstallment(1);
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setCallbackUrl(route($company->slug . '.payment.threedsPayment'));

        /**
         * Card Informations
         */
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($paymentRequest->cardName);
        $paymentCard->setCardNumber(preg_replace('/\s+/', '', $paymentRequest->cardNumber));
        $paymentCard->setExpireMonth($cardExpire[0]);
        $paymentCard->setExpireYear($cardExpire[1]);
        $paymentCard->setCvc($paymentRequest->cardSecurityCode);
        $request->setPaymentCard($paymentCard);

        /**
         * Buyer Informations
         */
        $buyer = new Buyer();
        $buyer->setId("BY789");
        $buyer->setName($paymentRequest->name);
        $buyer->setSurname($paymentRequest->surname);
        $buyer->setGsmNumber($paymentRequest->phone);
        $buyer->setEmail($paymentRequest->email);
        $buyer->setIdentityNumber($paymentRequest->identityNumber);
        $buyer->setRegistrationAddress($paymentRequest->address);
        $buyer->setIp($paymentRequest->ip());
        $buyer->setCity(City::find($paymentRequest->city)->city);
        $buyer->setCountry(City::DEFAULT_COUNTRY);
        $buyer->setZipCode($paymentRequest->zipCode);
        $request->setBuyer($buyer);

        /**
         * Shipping Informations
         */
        $shippingAddress = new Address();
        $shippingAddress->setContactName($paymentRequest->name);
        $shippingAddress->setCity(City::find($paymentRequest->city)->city);
        $shippingAddress->setCountry(City::DEFAULT_COUNTRY);
        $shippingAddress->setAddress($paymentRequest->address);
        $shippingAddress->setZipCode($paymentRequest->zipCode);
        $request->setShippingAddress($shippingAddress);

        /**
         * Billing Informations
         */
        $billingAddress = new Address();
        $billingAddress->setContactName($paymentRequest->name);
        $billingAddress->setCity(City::find($paymentRequest->city)->city);
        $billingAddress->setCountry(City::DEFAULT_COUNTRY);
        $billingAddress->setAddress($paymentRequest->address);
        $billingAddress->setZipCode($paymentRequest->zipCode);
        $request->setBillingAddress($billingAddress);

        /**
         * Basket Informations
         */
        $basketItems = [];

        foreach (Cart::content() as $cart) {
            $basketItem  = new BasketItem();
            $basketItem->setId($cart->rowId);
            $basketItem->setName($cart->name);
            $basketItem->setCategory1($cart->options->category);
            $basketItem->setItemType(BasketItemType::PHYSICAL);
            $basketItem->setPrice($cart->price * $cart->qty);
            $basketItem->setSubMerchantKey($company->subMerchant->sub_merchant_key);
            $basketItem->setSubMerchantPrice($this->commissionFeeService->getCommissionedPrice($cart->price, $cart->qty, $totalCount));
            $basketItems[] = $basketItem;
        }

        if ($company->cargoPrice()) {
            $basketItem  = new BasketItem();
            $basketItem->setId($this->commissionFeeService->getCargoProduct()['id']);
            $basketItem->setName($this->commissionFeeService->getCargoProduct()['name']);
            $basketItem->setCategory1($this->commissionFeeService->getCargoProduct()['category']);
            $basketItem->setItemType(BasketItemType::PHYSICAL);
            $basketItem->setPrice($company->cargoPrice());
            $basketItem->setSubMerchantKey($company->subMerchant->sub_merchant_key);
            $basketItem->setSubMerchantPrice($this->commissionFeeService->getCommissionedPrice($company->cargoPrice(), $this->commissionFeeService->getCargoProduct()['qty'], $totalCount));
            $basketItems[] = $basketItem;
        }

        $request->setBasketItems($basketItems);

        return ThreedsInitialize::create($request, self::options());
    }


    /**
     * Threeds Payment
     * @param  \Illuminate\Http\Request  $request
     */
    public function threedsPayment(Request $threedsPaymentRequest)
    {
        /**
         * Threeds Payment Informations
         */
        $request = new CreateThreedsPaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId($threedsPaymentRequest->conversationId);
        $request->setPaymentId($threedsPaymentRequest->paymentId);

        return ThreedsPayment::create($request, self::options());
    }

    /**
     * Threeds Payment
     * @param  \Illuminate\Http\Request  $request
     */
    public function retrieveInstallmentInfo(Request $threedsPaymentRequest)
    {
        $request = new RetrieveInstallmentInfoRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("554960");
        $request->setPrice("100");
    }

    /**
     * Threeds Payment
     * @param  \Illuminate\Http\Request  $request
     */
    public function approval(Order $order)
    {
        if (!count($order->payment->items))
            throw new \Exception('Sipariş kırılımları bulunamadı. Eski sipariş olabilir.');

        foreach ($order->payment->items as $item) {
            $request = new CreateApprovalRequest();
            $request->setLocale(Locale::TR);
            $request->setConversationId($item->id);
            $request->setPaymentTransactionId($item->payment_transaction_id);

            $approval = Approval::create($request, self::options());

            if ($approval->getStatus() !== 'success') {
                throw new \Exception($approval->getErrorMessage());
            }

            $this->createOrderPaymentApprove($approval, $order);
        }

        return $order->update(
            [
                'status' => Order::STATUS_COMPLETED
            ]
        );
    }

    /**
     * Create Order & Order Products
     * @param  \App\Http\Requests\PaymentRequest  $request
     * @param  \App\Models\Company  $company
     */
    public function createOrder(PaymentRequest $request, Company $company)
    {
        !count(Cart::search(function ($cartItem) {
            return $cartItem->options->type === Product::TYPE_DEFAULT;
        })) ? $type = 1 : $type = 0;

        /**
         * Order Data
         */
        $orderData = [
            'company_id'      => $company->id,
            'name'            => $request->name,
            'surname'         => $request->surname,
            'email'           => $request->email,
            'phone'           => $request->phone,
            'address'         => $request->address,
            'city_id'         => $request->city,
            'county_id'       => $request->county,
            'zip_code'        => $request->zipCode,
            'identity_number' => $request->identityNumber,
            'note'            => $request->note,
            'cargo_price'     => $company->cargoPrice(),
            'sub_total_price' => Cart::subtotal(null, '.', ''),
            'total_price'     => Cart::total(null, '.', '') + $company->cargoPrice(),
            'ip_address'      => $request->ip(),
            'type'            => $type,
        ];

        $order = Order::create($orderData);

        foreach (Cart::content() as $cart) {
            $cartData = [
                'order_id'    => $order->id,
                'product_id'  => $cart->id,
                'price'       => $cart->price,
                'total_price' => $cart->price * $cart->qty,
                'quantity'    => $cart->qty
            ];

            OrderProduct::create($cartData);
        }

        return $order;
    }

    /**
     * Create Order Payment
     * @param  \Iyzipay\Model\ThreedsPayment  $request
     */
    public function createOrderPayment(ThreedsPayment $threedsPayment)
    {
        /**
         * Threeds Payment Response
         */
        $paymentData = [
            'order_id'                        => $threedsPayment->getConversationId(),
            'sub_total_price'                 => $threedsPayment->getPrice(),
            'total_price'                     => $threedsPayment->getPaidPrice(),
            'currency'                        => $threedsPayment->getCurrency(),
            'payment_id'                      => $threedsPayment->getPaymentId(),
            'payment_status'                  => $threedsPayment->getPaymentStatus(),
            'fraud_status'                    => $threedsPayment->getFraudStatus(),
            'merchant_commission_rate'        => $threedsPayment->getMerchantCommissionRate(),
            'merchant_commission_rate_amount' => $threedsPayment->getMerchantCommissionRateAmount(),
            'iyzi_commission_rate_amount'     => $threedsPayment->getIyziCommissionRateAmount(),
            'iyzi_commission_fee'             => $threedsPayment->getIyziCommissionFee(),
            'card_type'                       => $threedsPayment->getCardType(),
            'card_association'                => $threedsPayment->getCardAssociation(),
            'card_family'                     => $threedsPayment->getCardFamily(),
            'card_token'                      => $threedsPayment->getCardToken(),
            'card_user_key'                   => $threedsPayment->getCardUserKey(),
            'bin_number'                      => $threedsPayment->getBinNumber(),
            'basket_id'                       => $threedsPayment->getBasketId(),
            'connector_name'                  => $threedsPayment->getConnectorName(),
            'auth_code'                       => $threedsPayment->getAuthCode(),
            'phase'                           => $threedsPayment->getPhase(),
            'last_four_digits'                => $threedsPayment->getLastFourDigits(),
            'pos_order_id'                    => $threedsPayment->getPosOrderId(),
            'status'                          => $threedsPayment->getStatus(),
            'error_code'                      => $threedsPayment->getErrorCode(),
            'error_message'                   => $threedsPayment->getErrorMessage(),
            'error_group'                     => $threedsPayment->getErrorGroup(),
            'locale'                          => $threedsPayment->getLocale(),
            'systemTime'                      => $threedsPayment->getSystemTime()
        ];

        $orderPayment = OrderPayment::create($paymentData);

        foreach ($threedsPayment->getPaymentItems() as $paymentItem) {
            /**
             * Threeds Payment Item Response
             */
            $paymentItemData = [
                'item_id'                           => $paymentItem->getItemId(),
                'order_id'                          => $threedsPayment->getConversationId(),
                'order_payment_id'                  => $orderPayment->id,
                'payment_transaction_id'            => $paymentItem->getPaymentTransactionId(),
                'transaction_status'                => $paymentItem->getTransactionStatus(),
                'price'                             => $paymentItem->getPrice(),
                'paid_price'                        => $paymentItem->getPaidPrice(),
                'merchant_commission_rate'          => $paymentItem->getMerchantCommissionRate(),
                'merchant_commission_rate_amount'   => $paymentItem->getMerchantCommissionRateAmount(),
                'iyzi_commission_rate_amount'       => $paymentItem->getIyziCommissionRateAmount(),
                'iyzi_commission_fee'               => $paymentItem->getIyziCommissionFee(),
                'blockage_rate'                     => $paymentItem->getBlockageRate(),
                'blockage_rate_amount_merchant'     => $paymentItem->getBlockageRateAmountMerchant(),
                'blockage_rate_amount_sub_merchant' => $paymentItem->getBlockageRateAmountSubMerchant(),
                'blockage_resolved_date'            => $paymentItem->getBlockageResolvedDate(),
                'sub_merchant_key'                  => $paymentItem->getSubMerchantKey(),
                'sub_merchant_price'                => $paymentItem->getSubMerchantPrice(),
                'sub_merchant_payout_rate'          => $paymentItem->getSubMerchantPayoutRate(),
                'sub_merchant_payout_amount'        => $paymentItem->getSubMerchantPayoutAmount(),
                'merchant_payout_amount'            => $paymentItem->getMerchantPayoutAmount(),
            ];

            OrderPaymentItem::create($paymentItemData);
        }

        return $orderPayment;
    }

    /**
     * Create Order Payment Aprove
     * @param  \Iyzipay\Model\Approval  $approval
     */
    public function createOrderPaymentApprove(Approval $approval, Order $order)
    {
        /**
         * Approval Response
         */
        $paymentData = [
            'order_id'               => $order->id,
            'order_payment_id'       => $order->payment->id,
            'order_payment_item_id'  => $approval->getConversationId(),
            'payment_transaction_id' => $approval->getPaymentTransactionId(),
            'status'                 => $approval->getStatus(),
            'error_code'             => $approval->getErrorCode(),
            'error_message'          => $approval->getErrorMessage(),
            'error_group'            => $approval->getErrorGroup(),
            'locale'                 => $approval->getLocale(),
            'system_time'            => $approval->getSystemTime()
        ];

        return OrderPaymentApprove::create($paymentData);
    }

    /**
     * Iyzico options
     */
    public static function options()
    {
        self::$options->setApiKey('MazJRqHLrlZA4bV3XlNB52hs8SbOweFI');
        self::$options->setSecretKey('b2dbPWob6ju9PwGyDNNROs5VnFllJaTI');
        self::$options->setBaseUrl('https://api.iyzipay.com');

        //self::$options->setApiKey('sandbox-0s0AFotEep8pHVxfDaRmeOeyDHSbP6rM');
        //self::$options->setSecretKey('sandbox-Uae7qhC7GlRosKBaNu5jCPPXLJv5ZFJc');
        //self::$options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return self::$options;
    }
}
