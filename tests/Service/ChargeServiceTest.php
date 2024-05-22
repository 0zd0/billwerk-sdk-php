<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Charge\ChargeCreateModel;
use Billwerk\Sdk\Model\Charge\ChargeGetModel;
use Billwerk\Sdk\Model\Charge\ChargeModel;
use Billwerk\Sdk\Model\Charge\ChargeSettleModel;

final class ChargeServiceTest extends AbstractServiceTest
{
    public function testGetCharge()
    {
        $this->setMockJsonModel(ChargeModel::getClassName());

        $handle = 'order-0000213';

        $charge = $this->charge->get((new ChargeGetModel())->setHandle($handle));

        $this::assertInstanceOf(ChargeModel::class, $charge);
        $this::assertSame($handle, $charge->getHandle());
    }

    public function testCreateCharge()
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

    public function testSettleInvoice()
    {
        $this->setMockJsonModel(ChargeModel::getClassName());

        $handle = 'order-0000213';

        $charge = $this->charge->settle(
            (new ChargeSettleModel())
                ->setHandle($handle)
        );

        $this::assertInstanceOf(ChargeModel::class, $charge);
        $this::assertSame($handle, $charge->getHandle());
    }
}
