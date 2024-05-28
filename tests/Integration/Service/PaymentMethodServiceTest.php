<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
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
}
