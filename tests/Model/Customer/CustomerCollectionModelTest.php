<?php

namespace Billwerk\Sdk\Test\Model\Customer;

use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\Customer\CustomerCollectionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CustomerCollectionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CustomerCollectionModel::getClassName());
        $model = CustomerCollectionModel::fromArray($json);
        $this::assertSame(50, $model->getSize());
        $this::assertSame(51, $model->getCount());
        $this::assertEquals(new DateTime('2021-10-06T13:02:23.190'), $model->getTo());
        $this::assertEquals(new DateTime('2021-09-06T13:02:23.190'), $model->getFrom());
        $this::assertSame(null, $model->getRange());
        $this::containsOnlyInstancesOf(CustomerCollectionModel::CONTENT_CLASS, $model->getContent());
        $this::assertSame(null, $model->getNextPageToken());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CustomerCollectionModel::getClassName());
        $model = CustomerCollectionModel::fromArray($json);
        $this::assertSame(50, $model->getSize());
        $this::assertSame(51, $model->getCount());
        $this::assertEquals(new DateTime('2021-10-06T13:02:23.190'), $model->getTo());
        $this::assertEquals(new DateTime('2021-09-06T13:02:23.190'), $model->getFrom());
        $this::assertSame(RangeEnum::CREATED, $model->getRange());
        $this::containsOnlyInstancesOf(CustomerCollectionModel::CONTENT_CLASS, $model->getContent());
        $this::assertSame('MTYzMjkxNDc4NTAwMDoxMA', $model->getNextPageToken());
    }
}
