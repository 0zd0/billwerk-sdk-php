<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\RefundCreateModel;
use Billwerk\Sdk\Model\RefundModel;
use Exception;

class RefundServiceTest extends AbstractServiceTest
{
    /**
     * @throws Exception
     */
    public function testCreateRefund()
    {
        $this->setMockJsonModel(RefundModel::getClassName());

        $createModel = new RefundCreateModel();
        $createModel
            ->setInvoice('order-0000213');
        $refundMethod = $this->refund->create($createModel);

        $this::assertInstanceOf(RefundModel::class, $refundMethod);
    }
}
