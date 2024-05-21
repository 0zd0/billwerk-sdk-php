<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Charge\ChargeGetModel;
use Billwerk\Sdk\Model\Charge\ChargeModel;

final class ChargeServiceTest extends AbstractServiceTest
{
    public function testGetInvoice()
    {
        $this->setMockJsonModel(ChargeModel::getClassName());

        $handle = 'order-0000213';

        $charge = $this->charge->get((new ChargeGetModel())->setHandle($handle));

        $this::assertInstanceOf(ChargeModel::class, $charge);
        $this::assertSame($handle, $charge->getHandle());
    }
}
