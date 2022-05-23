<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\SubMerchant;
use Iyzipay\Model\SubMerchantType;
use Iyzipay\Options;
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

    function createPersonelSubMerchant(User $user)
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
        $request->setIban($user->iban->iban);
        $request->setIdentityNumber($user->tc);
        $request->setCurrency(Currency::TL);

        return SubMerchant::create($request, self::options());
    }

    public static function options()
    {
        self::$options->setApiKey('MazJRqHLrlZA4bV3XlNB52hs8SbOweFI');
        self::$options->setSecretKey('b2dbPWob6ju9PwGyDNNROs5VnFllJaTI');
        self::$options->setBaseUrl('https://api.iyzipay.com');

        return self::$options;
    }
}
