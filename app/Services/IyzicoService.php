<?php

namespace App\Services;

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

    function createPersonelSubMerchant()
    {
        $request = new CreateSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("B49224");
        $request->setSubMerchantType(SubMerchantType::PERSONAL);
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setContactName("John");
        $request->setContactSurname("Doe");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("John's market");
        $request->setIban("TR180006200119000006672315");
        $request->setIdentityNumber("31300864726");
        $request->setCurrency(Currency::TL);

        $subMerchant = SubMerchant::create($request, self::options());

        # print result
        dd($subMerchant);
    }

    public static function options()
    {
        self::$options->setApiKey('sandbox-0s0AFotEep8pHVxfDaRmeOeyDHSbP6rM');
        self::$options->setSecretKey('sandbox-Uae7qhC7GlRosKBaNu5jCPPXLJv5ZFJc');
        self::$options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return self::$options;
    }
}
