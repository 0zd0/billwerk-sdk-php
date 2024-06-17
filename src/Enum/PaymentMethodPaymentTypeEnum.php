<?php

namespace Billwerk\Sdk\Enum;

class PaymentMethodPaymentTypeEnum
{
    public const CARD                          = 'card';
    public const EMV_TOKEN                     = 'emv_token';
    public const VIPPS_RECURRING               = 'vipps_recurring';
    public const APPLEPAY                      = 'applepay';
    public const MOBILEPAY_SUBSCRIPTIONS       = 'mobilepay_subscriptions';
    public const SEPA                          = 'sepa';
    public const OFFLINE_CASH                  = 'offline_cash';
    public const OFFLINE_BANK_TRANSFER         = 'offline_bank_transfer';
    public const OFFLINE_OTHER                 = 'offline_other';
    public const MOBILEPAY                     = 'mobilepay';
    public const VIPPS                         = 'vipps';
    public const SWISH                         = 'swish';
    public const VIABILL                       = 'viabill';
    public const MANUAL                        = 'manual';
    public const GOOGLEPAY                     = 'googlepay';
    public const PAYPAL                        = 'paypal';
    public const SANTANDER                     = 'santander';
    public const KLARNA_PAY_NOW                = 'klarna_pay_now';
    public const KLARNA_PAY_LATER              = 'klarna_pay_later';
    public const KLARNA_SLICE_IT               = 'klarna_slice_it';
    public const KLARNA_DIRECT_BANK_TRANSFER   = 'klarna_direct_bank_transfer';
    public const KLARNA_DIRECT_DEBIT           = 'klarna_direct_debit';
    public const RESURS                        = 'resurs';
    public const IDEAL                         = 'ideal';
    public const P24                           = 'p24';
    public const BLIK                          = 'blik';
    public const BLIK_OC                       = 'blik_oc';
    public const BANCONTACT                    = 'bancontact';
    public const GIROPAY                       = 'giropay';
    public const TRUSTLY                       = 'trustly';
    public const VERKKOPANKKI                  = 'verkkopankki';
    public const EPS                           = 'eps';
    public const ESTONIA_BANKS                 = 'estonia_banks';
    public const LATVIA_BANKS                  = 'latvia_banks';
    public const LITHUANIA_BANKS               = 'lithuania_banks';
    public const MB_WAY                        = 'mb_way';
    public const MULTIBANCO                    = 'multibanco';
    public const MYBANK                        = 'mybank';
    public const PAYCONIQ                      = 'payconiq';
    public const PAYSAFECARD                   = 'paysafecard';
    public const PAYSERA                       = 'paysera';
    public const POSTFINANCE                   = 'postfinance';
    public const SATISPAY                      = 'satispay';
    public const WECHATPAY                     = 'wechatpay';

    public static function getAll(): array
    {
        return [
            self::CARD,
            self::EMV_TOKEN,
            self::VIPPS_RECURRING,
            self::APPLEPAY,
            self::MOBILEPAY_SUBSCRIPTIONS,
            self::SEPA,
            self::OFFLINE_CASH,
            self::OFFLINE_BANK_TRANSFER,
            self::OFFLINE_OTHER,
            self::MOBILEPAY,
            self::VIPPS,
            self::SWISH,
            self::VIABILL,
            self::MANUAL,
            self::GOOGLEPAY,
            self::PAYPAL,
            self::SANTANDER,
            self::KLARNA_PAY_NOW,
            self::KLARNA_PAY_LATER,
            self::KLARNA_SLICE_IT,
            self::KLARNA_DIRECT_BANK_TRANSFER,
            self::KLARNA_DIRECT_DEBIT,
            self::RESURS,
            self::IDEAL,
            self::P24,
            self::BLIK,
            self::BLIK_OC,
            self::BANCONTACT,
            self::GIROPAY,
            self::TRUSTLY,
            self::VERKKOPANKKI,
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
            self::WECHATPAY,
        ];
    }
}
