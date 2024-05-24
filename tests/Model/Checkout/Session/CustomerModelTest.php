<?php

namespace Billwerk\Sdk\Test\Model\Checkout\Session;

use Billwerk\Sdk\Model\Checkout\Session\CustomerModel;
use Billwerk\Sdk\Model\MetaDataModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class CustomerModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CustomerModel::getClassName());
        $model = CustomerModel::fromArray($json);
        $this::assertSame(null, $model->getEmail());
        $this::assertSame(null, $model->getAddress());
        $this::assertSame(null, $model->getAddress2());
        $this::assertSame(null, $model->getCity());
        $this::assertSame(null, $model->getCountry());
        $this::assertSame(null, $model->getPhone());
        $this::assertSame(null, $model->getCompany());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getLanguage());
        $this::assertSame(null, $model->getHandle());
        $this::assertSame(null, $model->getTest());
        $this::assertSame(null, $model->getFirstName());
        $this::assertSame(null, $model->getLastName());
        $this::assertSame(null, $model->getPostalCode());
        $this::assertSame(null, $model->getDebtorId());
        $this::assertSame(null, $model->getGenerateHandle());
        $this::assertSame(null, $model->getMetadata());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CustomerModel::getClassName());
        $model = CustomerModel::fromArray($json);
        $this::assertSame('carl@leone.com', $model->getEmail());
        $this::assertSame('Grove Street 12', $model->getAddress());
        $this::assertSame('Ganton', $model->getAddress2());
        $this::assertSame('Los Santos', $model->getCity());
        $this::assertSame('US', $model->getCountry());
        $this::assertSame('555-gotcars', $model->getPhone());
        $this::assertSame('Leones Cars', $model->getCompany());
        $this::assertSame('US123456789', $model->getVat());
        $this::assertSame('en', $model->getLanguage());
        $this::assertSame('customer006', $model->getHandle());
        $this::assertSame(true, $model->getTest());
        $this::assertSame('Carl', $model->getFirstName());
        $this::assertSame('Johnson', $model->getLastName());
        $this::assertSame('4531', $model->getPostalCode());
        $this::assertSame(10001, $model->getDebtorId());
        $this::assertSame(true, $model->getGenerateHandle());
        $this::assertContainsOnlyInstancesOf(MetaDataModel::class, $model->getMetadata());

        $toApi = $model->toApi();
        $this::assertSame($toApi['metadata'], $json['metadata']);
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
