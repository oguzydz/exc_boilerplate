<?php

namespace App\Services;

use App\Http\Requests\PaymentRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Iyzipay\Model\Address;
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
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\CreateSubMerchantRequest;
use Throwable;

class IyzicoService
{
    /**
     * Iyzico options
     */
    static $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Options $options)
    {
        self::$options = $options;
    }

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

    public function payment(PaymentRequest $paymentRequest, Company $company)
    {
        /**
         * Price Informations
         */
        $request = new CreatePaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setPrice(Cart::subTotal());
        $request->setPaidPrice(Cart::total() + $company->cargoPrice());
        $request->setCurrency(Currency::TL);
        $request->setInstallment(1);
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setCallbackUrl(route($company->slug . '.payment.result'));

        /**
         * Card Informations
         */
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($paymentRequest->cardName);
        $paymentCard->setCardNumber(preg_replace('/\s+/', '', $paymentRequest->cardNumber));
        $paymentCard->setExpireMonth(explode('/', $paymentRequest->cardExpires)[0]);
        $paymentCard->setExpireYear(explode('/', $paymentRequest->cardExpires)[1]);
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
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("272.30");
        $firstBasketItem->setSubMerchantKey($company->subMerchant->sub_merchant_key);
        $firstBasketItem->setSubMerchantPrice(200);
        $basketItems[0] = $firstBasketItem;
        $request->setBasketItems($basketItems);

        return ThreedsInitialize::create($request, self::options());
    }

    public static function options()
    {
        // self::$options->setApiKey('MazJRqHLrlZA4bV3XlNB52hs8SbOweFI');
        // self::$options->setSecretKey('b2dbPWob6ju9PwGyDNNROs5VnFllJaTI');
        // self::$options->setBaseUrl('https://api.iyzipay.com');

        self::$options->setApiKey('sandbox-0s0AFotEep8pHVxfDaRmeOeyDHSbP6rM');
        self::$options->setSecretKey('sandbox-Uae7qhC7GlRosKBaNu5jCPPXLJv5ZFJc');
        self::$options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return self::$options;
    }
}
