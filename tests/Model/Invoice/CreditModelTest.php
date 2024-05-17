<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Model\Invoice\CreditModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CreditModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CreditModel::getClassName());
        $model = CreditModel::fromArray($json);
        $this::assertSame('credit002', $model->getCredit());
        $this::assertSame(10000, $model->getAmount());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('Credit for lower bandwidth', $model->getText());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CreditModel::getClassName());
        $model = CreditModel::fromArray($json);
        $this::assertSame('credit002', $model->getCredit());
        $this::assertSame(10000, $model->getAmount());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('Credit for lower bandwidth', $model->getText());
    }
}
