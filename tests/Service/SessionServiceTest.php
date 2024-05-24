<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Checkout\Session\SessionChargeModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionModel;

final class SessionServiceTest extends AbstractServiceTest
{
    public function testChargeSession()
    {
        $this->setMockJsonModel(SessionModel::getClassName());

        $charge = $this->session->charge(
            (new SessionChargeModel())
        );

        $this::assertInstanceOf(SessionModel::class, $charge);
        $this::assertSame('string', $charge->getId());
    }
}
