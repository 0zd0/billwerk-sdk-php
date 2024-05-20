<?php

namespace Billwerk\Sdk\Helper;

interface UrlPathInterface
{
    public const LIST             = 'list';
    public const PAYMENT_METHOD   = 'payment_method';
    public const ACCOUNT          = 'account';
    public const WEBHOOK_SETTINGS = 'webhook_settings';
    public const REFUND = 'refund';
    public const INVOICE = 'invoice';
    public const TRANSACTION = 'transaction';
}
