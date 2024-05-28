<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\Refund\RefundCreateModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Spatie\Snapshots\MatchesSnapshots;

class RefundServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testCreateRefund()
    {
        $invoice = $this->sdk->refund()->create(
            (new RefundCreateModel())
                ->setInvoice($this->devConfig['service']['refund']['create']['invoice'])
        );

        $this->assertMatchesJsonSnapshot(json_encode($invoice->toArray()));
    }
}
