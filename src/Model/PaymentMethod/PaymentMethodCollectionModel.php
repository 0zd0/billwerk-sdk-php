<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\AbstractCollectionModel;

class PaymentMethodCollectionModel extends AbstractCollectionModel
{
    public const RANGES = [
        RangeEnum::CREATED,
    ];

    public const CONTENT_CLASS = PaymentMethodModel::class;

    /**
     * @return PaymentMethodModel[]
     */
    public function getContent(): array
    {
        return $this->content;
    }
}
