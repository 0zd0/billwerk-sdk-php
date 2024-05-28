<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Spatie\Snapshots\MatchesSnapshots;

class InvoiceServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testGetInvoice()
    {
        $invoice = $this->sdk->invoice()->get((new InvoiceGetModel())->setId(
            $this->devConfig['service']['invoice']['get']['id']
        ));

        $this->assertMatchesJsonSnapshot(json_encode($invoice->toArray()));
    }
}
