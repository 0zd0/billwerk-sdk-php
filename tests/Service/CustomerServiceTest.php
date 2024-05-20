<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Customer\CustomerModel;

final class CustomerServiceTest extends AbstractServiceTest
{
    public function testGetInvoice()
    {
        $this->setMockJsonModel(CustomerModel::getClassName());

        $handle = 'customer006';

        $invoice = $this->customer->get((new CustomerGetModel())->setHandle($handle));

        $this::assertInstanceOf(CustomerModel::class, $invoice);
        $this::assertSame($handle, $invoice->getHandle());
    }
}
