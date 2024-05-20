<?php

namespace Billwerk\Sdk\Model\Customer;

use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\AbstractCollectionModel;

class CustomerCollectionModel extends AbstractCollectionModel
{
    public const RANGES = [
        RangeEnum::CREATED,
    ];

    public const CONTENT_CLASS = CustomerModel::class;
}
