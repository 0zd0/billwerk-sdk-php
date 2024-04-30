<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\PaymentMethodModel;

final class PaymentMethodTestAbstract extends AbstractServiceTest
{
    public function testPaymentMethodGet()
    {
        $json = $this::getStubJsonModelWithRequiredFields(PaymentMethodModel::getClassName());
        
        $this->streamMock
            ->method('getContents')
            ->willReturn(json_encode($json));
        
        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamMock);
        
        $this->responseMock
            ->method('getStatusCode')
            ->willReturn(200);
        
        $this->clientMock
            ->method('sendRequest')
            ->willReturn($this->responseMock);
        
        $id = 'ca_fcfac2016614418f969fa5697383e47c';
        
        $paymentModel = $this->paymentMethod->get($id);
        
        $this::assertInstanceOf(PaymentMethodModel::class, $paymentModel);
        $this::assertSame($id, $paymentModel->getId());
    }
}
