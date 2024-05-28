<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodModel;

final class PaymentMethodServiceTest extends AbstractServiceTest
{
    public function testGetPaymentMethod()
    {
        $this->setMockJsonModel(PaymentMethodModel::getClassName());

        $id = 'ca_fcfac2016614418f969fa5697383e47c';

        $paymentMethod = $this->paymentMethod->get(
            (new PaymentMethodGetModel())
            ->setId($id)
        );

        $this::assertInstanceOf(PaymentMethodModel::class, $paymentMethod);
        $this::assertSame($id, $paymentMethod->getId());
    }
}
