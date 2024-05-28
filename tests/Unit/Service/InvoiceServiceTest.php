<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceModel;

final class InvoiceServiceTest extends AbstractServiceTest
{
    public function testGetInvoice()
    {
        $this->setMockJsonModel(InvoiceModel::getClassName());

        $id = 'dafba2016614418f969fa5697383e47c';

        $invoice = $this->invoice->get((new InvoiceGetModel())->setId($id));

        $this::assertInstanceOf(InvoiceModel::class, $invoice);
        $this::assertSame($id, $invoice->getId());
    }
}
