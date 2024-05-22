<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Charge\ChargeCreateModel;
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

    public function testCreateInvoice()
    {
        $this->setMockJsonModel(ChargeModel::getClassName());

        $handle = 'order-0000213';

        $charge = $this->charge->create(
            (new ChargeCreateModel())
                ->setHandle($handle)
                ->setSource('ca_f96004cae4308473c92bea0638b5b688')
        );

        $this::assertInstanceOf(ChargeModel::class, $charge);
        $this::assertSame($handle, $charge->getHandle());
    }
}
