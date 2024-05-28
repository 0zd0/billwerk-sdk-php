<?php

namespace Billwerk\Sdk\Test\Unit\Model\Charge;

use Billwerk\Sdk\Model\Charge\ParametersModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class ParametersModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ParametersModel::getClassName());
        $model = ParametersModel::fromArray($json);
        $this::assertSame(null, $model->getMpsTtl());
        $this::assertSame(null, $model->getOfflineAgreementHandle());
        $this::assertSame(null, $model->getOfflinePaymentInstructions());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ParametersModel::getClassName());
        $model = ParametersModel::fromArray($json);
        $this::assertSame('P1D', $model->getMpsTtl());
        $this::assertSame('offline_cash_handle_123', $model->getOfflineAgreementHandle());
        $this::assertSame('Transfer to account 1234', $model->getOfflinePaymentInstructions());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
