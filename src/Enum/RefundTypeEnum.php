<?php

namespace Billwerk\Sdk\Enum;

class RefundTypeEnum
{
    public const CARD                        = 'card';
    public const MPO                         = 'mpo';
    public const MOBILEPAY                   = 'mobilepay';
    public const VIPPS                       = 'vipps';
    public const VIPPS_RECURRING             = 'vipps_recurring';
    public const SWISH                       = 'swish';
    public const VIABILL                     = 'viabill';
    public const ANYDAY                      = 'anyday';
    public const MANUAL                      = 'manual';
    public const APPLEPAY                    = 'applepay';
    public const GOOGLEPAY                   = 'googlepay';
    public const PAYPAL                      = 'paypal';
    public const KLARNA_PAY_NOW              = 'klarna_pay_now';
    public const KLARNA_PAY_LATER            = 'klarna_pay_later';
    public const KLARNA_SLICE_IT             = 'klarna_slice_it';
    public const KLARNA_DIRECT_BANK_TRANSFER = 'klarna_direct_bank_transfer';
    public const KLARNA_DIRECT_DEBIT         = 'klarna_direct_debit';
    public const RESURS                      = 'resurs';
    public const MOBILEPAY_SUBSCRIPTIONS     = 'mobilepay_subscriptions';
    public const EMV_TOKEN                   = 'emv_token';
    public const BANCOMATPAY                 = 'bancomatpay';
    public const BCMC                        = 'bcmc';
    public const BLIK                        = 'blik';
    public const PP_BLIK_OC                  = 'pp_blik_oc';
    public const GIROPAY                     = 'giropay';
    public const IDEAL                       = 'ideal';
    public const P24                         = 'p24';
    public const SEPA                        = 'sepa';
    public const TRUSTLY                     = 'trustly';
    public const EPS                         = 'eps';
    public const ESTONIA_BANKS               = 'estonia_banks';
    public const LATVIA_BANKS                = 'latvia_banks';
    public const LITHUANIA_BANKS             = 'lithuania_banks';
    public const MB_WAY                      = 'mb_way';
    public const MULTIBANCO                  = 'multibanco';
    public const MYBANK                      = 'mybank';
    public const PAYCONIQ                    = 'payconiq';
    public const PAYSAFECARD                 = 'paysafecard';
    public const PAYSERA                     = 'paysera';
    public const POSTFINANCE                 = 'postfinance';
    public const SATISPAY                    = 'satispay';
    public const TWINT                       = 'twint';
    public const WECHATPAY                   = 'wechatpay';
    public const SANTANDER                   = 'santander';
    public const VERKKOPANKKI                = 'verkkopankki';
    public const OFFLINE_CASH                = 'offline_cash';
    public const OFFLINE_BANK_TRANSFER       = 'offline_bank_transfer';
    public const OFFLINE_OTHER               = 'offline_other';

    public static function getAll(): array
    {
        return [
            self::CARD,
            self::MPO,
            self::MOBILEPAY,
            self::VIPPS,
            self::VIPPS_RECURRING,
            self::SWISH,
            self::VIABILL,
            self::ANYDAY,
            self::MANUAL,
            self::APPLEPAY,
            self::GOOGLEPAY,
            self::PAYPAL,
            self::KLARNA_PAY_NOW,
            self::KLARNA_PAY_LATER,
            self::KLARNA_SLICE_IT,
            self::KLARNA_DIRECT_BANK_TRANSFER,
            self::KLARNA_DIRECT_DEBIT,
            self::RESURS,
            self::MOBILEPAY_SUBSCRIPTIONS,
            self::EMV_TOKEN,
            self::BANCOMATPAY,
            self::BCMC,
            self::BLIK,
            self::PP_BLIK_OC,
            self::GIROPAY,
            self::IDEAL,
            self::P24,
            self::SEPA,
            self::TRUSTLY,
            self::EPS,
            self::ESTONIA_BANKS,
            self::LATVIA_BANKS,
            self::LITHUANIA_BANKS,
            self::MB_WAY,
            self::MULTIBANCO,
            self::MYBANK,
            self::PAYCONIQ,
            self::PAYSAFECARD,
            self::PAYSERA,
            self::POSTFINANCE,
            self::SATISPAY,
            self::TWINT,
            self::WECHATPAY,
            self::SANTANDER,
            self::VERKKOPANKKI,
            self::OFFLINE_CASH,
            self::OFFLINE_BANK_TRANSFER,
            self::OFFLINE_OTHER,
        ];
    }
}
