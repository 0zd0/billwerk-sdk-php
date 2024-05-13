<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Enum\ManualTransferMethodEnum;
use Billwerk\Sdk\Model\ManualTransferModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class ManualTransferModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ManualTransferModel::getClassName());
        $model = ManualTransferModel::fromArray($json);
        $this::assertSame(null, $model->getReference());
        $this::assertSame(null, $model->getComment());
        $this::assertSame(ManualTransferMethodEnum::CHARGEBACK, $model->getMethod());
        $this::assertEquals(new DateTime('2016-07-10'), $model->getPaymentDate());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ManualTransferModel::getClassName());
        $model = ManualTransferModel::fromArray($json);
        $this::assertSame('231', $model->getReference());
        $this::assertSame('Paid by cash in the shop', $model->getComment());
        $this::assertSame(ManualTransferMethodEnum::CHARGEBACK, $model->getMethod());
        $this::assertEquals(new DateTime('2016-07-10'), $model->getPaymentDate());
    }
}
