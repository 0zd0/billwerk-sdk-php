<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Model\Checkout\Session\SessionChargeModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionRecurringModel;

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

    public function testRecurringSession()
    {
        $this->setMockJsonModel(SessionModel::getClassName());

        $charge = $this->session->recurring(
            (new SessionRecurringModel())
        );

        $this::assertInstanceOf(SessionModel::class, $charge);
        $this::assertSame('string', $charge->getId());
    }
}
