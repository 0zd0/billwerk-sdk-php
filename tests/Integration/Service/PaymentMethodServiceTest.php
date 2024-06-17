<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Enum\PaymentMethodStateEnum;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodCollectionGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Test\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class PaymentMethodServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testGetPaymentMethod()
    {
        $paymentMethod = $this->sdk->paymentMethod()->get((new PaymentMethodGetModel())->setId(
            $this->devConfig['service']['payment-method']['get']['id']
        ));

        $this->assertMatchesJsonSnapshot(json_encode($paymentMethod->toArray()));
    }

    public function testGetPaymentMethodList()
    {
        $paymentMethodList = $this->sdk->paymentMethod()->list(
            (new PaymentMethodCollectionGetModel())
                ->setState([PaymentMethodStateEnum::INACTIVATED, PaymentMethodStateEnum::ACTIVE])
        );

        $this->assertMatchesJsonSnapshot(json_encode($paymentMethodList->toArray()));
    }
}
