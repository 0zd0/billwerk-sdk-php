<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Spatie\Snapshots\MatchesSnapshots;

class TransactionServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testGetTransaction()
    {
        $config = $this->devConfig['service']['transaction']['get'];

        $paymentMethod = $this->sdk->transaction()->get(
            (new TransactionGetModel())
            ->setId($config['id'])
            ->setTransaction($config['transaction'])
        );

        $this->assertMatchesJsonSnapshot(json_encode($paymentMethod->toArray()));
    }
}
