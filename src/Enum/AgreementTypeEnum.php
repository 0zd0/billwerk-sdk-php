<?php

namespace Billwerk\Sdk\Enum;

class AgreementTypeEnum
{
    public const CARD = 'card';
    public const VIABILL = 'viabill';
    public const ANYDAY = 'anyday';
    public const RESURS = 'resurs';
    public const KLARNA_PAY_NOW = 'klarna_pay_now';
    public const KLARNA_PAY_LATER = 'klarna_pay_later';
    public const KLARNA_SLICE_IT = 'klarna_slice_it';
    public const KLARNA_DIRECT_BANK_TRANSFER = 'klarna_direct_bank_transfer';
    public const KLARNA_DIRECT_DEBIT = 'klarna_direct_debit';
    public const MOBILEPAY = 'mobilepay';
    public const MOBILEPAY_SUBSCRIPTIONS = 'mobilepay_subscriptions';
    public const SANTANDER = 'santander';
    public const APPLEPAY = 'applepay';
    public const GOOGLEPAY = 'googlepay';
    public const VIPPS = 'vipps';
    public const SWISH = 'swish';
    public const PAYPAL = 'paypal';
    public const PP_BANCOMATP = 'pp_bancomatpay';
    public const PP_BANCONTACT = 'pp_bancontact';
    public const PP_BLIK_OC = 'pp_blik_oc';
    public const PP_GIROPAY = 'pp_giropay';
    public const PP_IDEAL = 'pp_ideal';
    public const PP_P24 = 'pp_p24';
    public const PP_SEPA = 'pp_sepa';
    public const PP_TRUSTLY = 'pp_trustly';
    public const PP_VERKKOPANKKI = 'pp_verkkopankki';
    public const PP_EPS = 'pp_eps';
    public const PP_ESTONIA_BANKS = 'pp_estonia_banks';
    public const PP_LATVIA_BANKS = 'pp_latvia_banks';
    public const PP_LITHUANIA_BANKS = 'pp_lithuania_banks';
    public const PP_MB_WAY = 'pp_mb_way';
    public const PP_MULTIBANCO = 'pp_multibanco';
    public const PP_MYBANK = 'pp_mybank';
    public const PP_PAYCONIQ = 'pp_payconiq';
    public const PP_PAYSAFECARD = 'pp_paysafecard';
    public const PP_PAYSERA = 'pp_paysera';
    public const PP_POSTFINANCE = 'pp_postfinance';
    public const PP_TWINT = 'pp_twint';
    public const PP_SATISPAY = 'pp_satispay';
    public const PP_WECHATPAY = 'pp_wechatpay';
    public const PE_SANTANDER = 'pe_santander';

    public static function getAll(): array
    {
        return [
            self::CARD,
            self::VIABILL,
            self::ANYDAY,
            self::RESURS,
            self::KLARNA_PAY_NOW,
            self::KLARNA_PAY_LATER,
            self::KLARNA_SLICE_IT,
            self::KLARNA_DIRECT_BANK_TRANSFER,
            self::KLARNA_DIRECT_DEBIT,
            self::MOBILEPAY,
            self::MOBILEPAY_SUBSCRIPTIONS,
            self::SANTANDER,
            self::APPLEPAY,
            self::GOOGLEPAY,
            self::VIPPS,
            self::SWISH,
            self::PAYPAL,
            self::PP_BANCOMATP,
            self::PP_BANCONTACT,
            self::PP_BLIK_OC,
            self::PP_GIROPAY,
            self::PP_IDEAL,
            self::PP_P24,
            self::PP_SEPA,
            self::PP_TRUSTLY,
            self::PP_VERKKOPANKKI,
            self::PP_EPS,
            self::PP_ESTONIA_BANKS,
            self::PP_LATVIA_BANKS,
            self::PP_LITHUANIA_BANKS,
            self::PP_MB_WAY,
            self::PP_MULTIBANCO,
            self::PP_MYBANK,
            self::PP_PAYCONIQ,
            self::PP_PAYSAFECARD,
            self::PP_PAYSERA,
            self::PP_POSTFINANCE,
            self::PP_TWINT,
            self::PP_SATISPAY,
            self::PP_WECHATPAY,
            self::PE_SANTANDER,
        ];
    }
}
