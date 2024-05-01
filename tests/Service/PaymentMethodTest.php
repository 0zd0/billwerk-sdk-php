<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\PaymentMethodModel;

final class PaymentMethodTest extends AbstractServiceTest
{
    public function testGetPaymentMethod()
    {
        $this->setMockJsonModel(PaymentMethodModel::getClassName());

        $id = 'ca_fcfac2016614418f969fa5697383e47c';

        $paymentMethod = $this->paymentMethod->get($id);

        $this::assertInstanceOf(PaymentMethodModel::class, $paymentMethod);
        $this::assertSame($id, $paymentMethod->getId());
    }
}
