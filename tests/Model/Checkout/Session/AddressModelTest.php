<?php

namespace Billwerk\Sdk\Test\Model\Checkout\Session;

use Billwerk\Sdk\Model\Checkout\Session\AddressModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class AddressModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(AddressModel::getClassName());
        $model = AddressModel::fromArray($json);
        $this::assertSame(null, $model->getAddress1());
        $this::assertSame(null, $model->getAddress2());
        $this::assertSame(null, $model->getAddress3());
        $this::assertSame(null, $model->getCity());
        $this::assertSame(null, $model->getCountry());
        $this::assertSame(null, $model->getPostalCode());
        $this::assertSame(null, $model->getStateOrProvince());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(AddressModel::getClassName());
        $model = AddressModel::fromArray($json);
        $this::assertSame('Grove Street 12', $model->getAddress1());
        $this::assertSame('Ganton', $model->getAddress2());
        $this::assertSame('Apartment 10', $model->getAddress3());
        $this::assertSame('Los Santos', $model->getCity());
        $this::assertSame('US', $model->getCountry());
        $this::assertSame('4531', $model->getPostalCode());
        $this::assertSame('WA', $model->getStateOrProvince());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
