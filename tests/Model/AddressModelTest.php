<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Model\AddressModel;
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
        $this::assertSame(null, $model->getCompany());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getAttention());
        $this::assertSame(null, $model->getAddress());
        $this::assertSame(null, $model->getAddress2());
        $this::assertSame(null, $model->getCity());
        $this::assertSame(null, $model->getCountry());
        $this::assertSame(null, $model->getEmail());
        $this::assertSame(null, $model->getPhone());
        $this::assertSame(null, $model->getFirstName());
        $this::assertSame(null, $model->getLastName());
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
        $this::assertSame('Leones Cars', $model->getCompany());
        $this::assertSame('US123456789', $model->getVat());
        $this::assertSame('Mary Schmidt', $model->getAttention());
        $this::assertSame('Grove Street 12', $model->getAddress());
        $this::assertSame('Ganton', $model->getAddress2());
        $this::assertSame('Los Santos', $model->getCity());
        $this::assertSame('US', $model->getCountry());
        $this::assertSame('carl@leone.com', $model->getEmail());
        $this::assertSame('555-gotcars', $model->getPhone());
        $this::assertSame('Carl', $model->getFirstName());
        $this::assertSame('Johnson', $model->getLastName());
        $this::assertSame('4531', $model->getPostalCode());
        $this::assertSame('WA', $model->getStateOrProvince());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
