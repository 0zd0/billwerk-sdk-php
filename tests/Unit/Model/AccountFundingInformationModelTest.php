<?php

namespace Billwerk\Sdk\Test\Unit\Model;

use Billwerk\Sdk\Model\AccountFundingInformationModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class AccountFundingInformationModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(AccountFundingInformationModel::getClassName());
        $model = AccountFundingInformationModel::fromArray($json);
        $this::assertSame(null, $model->getSenderAccountNumber());
        $this::assertSame(null, $model->getSenderReference());
        $this::assertSame(null, $model->getSenderFirstName());
        $this::assertSame(null, $model->getSenderLastName());
        $this::assertSame(null, $model->getSenderAddress());
        $this::assertSame(null, $model->getSenderCity());
        $this::assertSame(null, $model->getSenderPostalCode());
        $this::assertSame(null, $model->getSenderState());
        $this::assertSame(null, $model->getSenderCountry());
        $this::assertSame(null, $model->getSenderDateOfBirth());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(AccountFundingInformationModel::getClassName());
        $model = AccountFundingInformationModel::fromArray($json);
        $this::assertSame('1', $model->getSenderAccountNumber());
        $this::assertSame('2', $model->getSenderReference());
        $this::assertSame('3', $model->getSenderFirstName());
        $this::assertSame('4', $model->getSenderLastName());
        $this::assertSame('5', $model->getSenderAddress());
        $this::assertSame('6', $model->getSenderCity());
        $this::assertSame('7', $model->getSenderPostalCode());
        $this::assertSame('US', $model->getSenderState());
        $this::assertSame('DK', $model->getSenderCountry());
        $this::assertSame('1990-07-01', $model->getSenderDateOfBirth());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
