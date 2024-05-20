<?php

namespace Billwerk\Sdk\Test\Model\Customer;

use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CustomerCollectionGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CustomerCollectionGetModel::getClassName());
        $model = CustomerCollectionGetModel::fromArray($json);
        $this::assertEquals(null, $model->getFrom());
        $this::assertEquals(null, $model->getTo());
        $this::assertSame(null, $model->getInterval());
        $this::assertSame(null, $model->getSize());
        $this::assertSame(null, $model->getNextPageToken());
        $this::assertSame(null, $model->getRange());
        $this::assertSame(null, $model->getHandle());
        $this::assertSame(null, $model->getHandlePrefix());
        $this::assertSame(null, $model->getHandleContains());
        $this::assertSame(null, $model->getName());
        $this::assertSame(null, $model->getEmail());
        $this::assertSame(null, $model->getEmailPrefix());
        $this::assertSame(null, $model->getFirstName());
        $this::assertSame(null, $model->getLastName());
        $this::assertSame(null, $model->getAddress());
        $this::assertSame(null, $model->getAddress2());
        $this::assertSame(null, $model->getPostalCode());
        $this::assertSame(null, $model->getCity());
        $this::assertSame(null, $model->getCountry());
        $this::assertSame(null, $model->getPhone());
        $this::assertSame(null, $model->getCompany());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getDebtorId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CustomerCollectionGetModel::getClassName());
        $model = CustomerCollectionGetModel::fromArray($json);
        $this::assertEquals(new DateTime('2021-09-06T13:02:23.190'), $model->getFrom());
        $this::assertEquals(new DateTime('2021-10-06T13:02:23.190'), $model->getTo());
        $this::assertSame('P1W', $model->getInterval());
        $this::assertSame(50, $model->getSize());
        $this::assertSame('MTYzMjkxNDc4NTAwMDoxMA', $model->getNextPageToken());
        $this::assertSame(RangeEnum::CREATED, $model->getRange());
        $this::assertSame('cust-1234', $model->getHandle());
        $this::assertSame('cust-1', $model->getHandlePrefix());
        $this::assertSame('123', $model->getHandleContains());
        $this::assertSame('John Doe', $model->getName());
        $this::assertSame('mail@example.com', $model->getEmail());
        $this::assertSame('mail', $model->getEmailPrefix());
        $this::assertSame('Max', $model->getFirstName());
        $this::assertSame('Power', $model->getLastName());
        $this::assertSame('Some street', $model->getAddress());
        $this::assertSame('Some apartment', $model->getAddress2());
        $this::assertSame('Some number', $model->getPostalCode());
        $this::assertSame('Some City', $model->getCity());
        $this::assertSame('US', $model->getCountry());
        $this::assertSame('+4531313131', $model->getPhone());
        $this::assertSame('Acme', $model->getCompany());
        $this::assertSame('US123456789', $model->getVat());
        $this::assertSame(10001, $model->getDebtorId());

        $this::assertEqualsCanonicalizing($model->toApi(), $json);
    }
}
