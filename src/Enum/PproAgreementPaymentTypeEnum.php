<?php

namespace Billwerk\Sdk\Enum;

class PproAgreementPaymentTypeEnum
{
    public const PP_BANCOMATPAY      = 'pp_bancomatpay';
    public const PP_BANCONTACT       = 'pp_bancontact';
    public const PP_BLIK_OC          = 'pp_blik_oc';
    public const PP_EPS              = 'pp_eps';
    public const PP_ESTONIA_BANKS    = 'pp_estonia_banks';
    public const PP_GIROPAY          = 'pp_giropay';
    public const PP_IDEAL            = 'pp_ideal';
    public const PP_LATVIA_BANKS     = 'pp_latvia_banks';
    public const PP_LITHUANIA_BANKS  = 'pp_lithuania_banks';
    public const PP_MB_WAY           = 'pp_mb_way';
    public const PP_MULTIBANCO       = 'pp_multibanco';
    public const PP_MYBANK           = 'pp_mybank';
    public const PP_P24              = 'pp_p24';
    public const PP_PAYCONIQ         = 'pp_payconiq';
    public const PP_PAYSAFECARD      = 'pp_paysafecard';
    public const PP_PAYSERA          = 'pp_paysera';
    public const PP_POSTFINANCE      = 'pp_postfinance';
    public const PP_SATISPAY         = 'pp_satispay';
    public const PP_SEPA             = 'pp_sepa';
    public const PP_TRUSTLY          = 'pp_trustly';
    public const PP_TWINT            = 'pp_twint';
    public const PP_VERKKOPANKKI     = 'pp_verkkopankki';
    public const PP_WECHATPAY        = 'pp_wechatpay';

    public static function getAll(): array
    {
        return [
            self::PP_BANCOMATPAY,
            self::PP_BANCONTACT,
            self::PP_BLIK_OC,
            self::PP_EPS,
            self::PP_ESTONIA_BANKS,
            self::PP_GIROPAY,
            self::PP_IDEAL,
            self::PP_LATVIA_BANKS,
            self::PP_LITHUANIA_BANKS,
            self::PP_MB_WAY,
            self::PP_MULTIBANCO,
            self::PP_MYBANK,
            self::PP_P24,
            self::PP_PAYCONIQ,
            self::PP_PAYSAFECARD,
            self::PP_PAYSERA,
            self::PP_POSTFINANCE,
            self::PP_SATISPAY,
            self::PP_SEPA,
            self::PP_TRUSTLY,
            self::PP_TWINT,
            self::PP_VERKKOPANKKI,
            self::PP_WECHATPAY,
        ];
    }
}
