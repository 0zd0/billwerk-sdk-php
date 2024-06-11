<?php

namespace Billwerk\Sdk\Enum;

class PaymentMethodEnum
{
    public const CARD                      = 'card';
    public const DANKORT                   = 'dankort';
    public const VISA                      = 'visa';
    public const VISA_ELEC                 = 'visa_elec';
    public const MC                        = 'mc';
    public const AMEX                      = 'amex';
    public const MOBILEPAY                 = 'mobilepay';
    public const MOBILEPAY_SUBSCRIPTIONS   = 'mobilepay_subscriptions';
    public const VIABILL                   = 'viabill';
    public const ANYDAY                    = 'anyday';
    public const RESURS                    = 'resurs';
    public const SWISH                     = 'swish';
    public const VIPPS                     = 'vipps';
    public const VIPPS_RECURRING           = 'vipps_recurring';
    public const DINERS                    = 'diners';
    public const MAESTRO                   = 'maestro';
    public const LASER                     = 'laser';
    public const DISCOVER                  = 'discover';
    public const JCB                       = 'jcb';
    public const CHINA_UNION_PAY           = 'china_union_pay';
    public const FFK                       = 'ffk';
    public const PAYPAL                    = 'paypal';
    public const APPLEPAY                  = 'applepay';
    public const GOOGLEPAY                 = 'googlepay';
    public const KLARNA_PAY_LATER          = 'klarna_pay_later';
    public const KLARNA_PAY_NOW            = 'klarna_pay_now';
    public const KLARNA_SLICE_IT           = 'klarna_slice_it';
    public const KLARNA_DIRECT_BANK_TRANSFER = 'klarna_direct_bank_transfer';
    public const KLARNA_DIRECT_DEBIT       = 'klarna_direct_debit';
    public const IDEAL                     = 'ideal';
    public const BLIK                      = 'blik';
    public const P24                       = 'p24';
    public const VERKKOPANKKI              = 'verkkopankki';
    public const GIROPAY                   = 'giropay';
    public const SEPA                      = 'sepa';
    public const BANCOMATPAY               = 'bancomatpay';
    public const BANCONTACT                = 'bancontact';
    public const EPS                       = 'eps';
    public const ESTONIA_BANKS             = 'estonia_banks';
    public const LATVIA_BANKS              = 'latvia_banks';
    public const LITHUANIA_BANKS           = 'lithuania_banks';
    public const MB_WAY                    = 'mb_way';
    public const MULTIBANCO                = 'multibanco';
    public const MYBANK                    = 'mybank';
    public const PAYCONIQ                  = 'payconiq';
    public const PAYSAFECARD               = 'paysafecard';
    public const PAYSERA                   = 'paysera';
    public const POSTFINANCE               = 'postfinance';
    public const SATISPAY                  = 'satispay';
    public const TRUSTLY                   = 'trustly';
    public const TWINT                     = 'twint';
    public const WECHATPAY                 = 'wechatpay';
    public const SANTANDER                 = 'santander';
    public const OFFLINE_BANK_TRANSFER     = 'offline_bank_transfer';
    public const OFFLINE_CASH              = 'offline_cash';
    public const OFFLINE_OTHER             = 'offline_other';

    public static function getAll(): array
    {
        return [
            self::CARD,
            self::DANKORT,
            self::VISA,
            self::VISA_ELEC,
            self::MC,
            self::AMEX,
            self::MOBILEPAY,
            self::MOBILEPAY_SUBSCRIPTIONS,
            self::VIABILL,
            self::ANYDAY,
            self::RESURS,
            self::SWISH,
            self::VIPPS,
            self::VIPPS_RECURRING,
            self::DINERS,
            self::MAESTRO,
            self::LASER,
            self::DISCOVER,
            self::JCB,
            self::CHINA_UNION_PAY,
            self::FFK,
            self::PAYPAL,
            self::APPLEPAY,
            self::GOOGLEPAY,
            self::KLARNA_PAY_LATER,
            self::KLARNA_PAY_NOW,
            self::KLARNA_SLICE_IT,
            self::KLARNA_DIRECT_BANK_TRANSFER,
            self::KLARNA_DIRECT_DEBIT,
            self::IDEAL,
            self::BLIK,
            self::P24,
            self::VERKKOPANKKI,
            self::GIROPAY,
            self::SEPA,
            self::BANCOMATPAY,
            self::BANCONTACT,
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
            self::TRUSTLY,
            self::TWINT,
            self::WECHATPAY,
            self::SANTANDER,
            self::OFFLINE_BANK_TRANSFER,
            self::OFFLINE_CASH,
            self::OFFLINE_OTHER,
        ];
    }
}
