<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Model\PaymentMethod\OfflineMandateModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class OfflineMandateModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(OfflineMandateModel::getClassName());
        $model = OfflineMandateModel::fromArray($json);
        $this::assertSame('string', $model->getOfflineAgreementHandle());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OfflineMandateModel::getClassName());
        $model = OfflineMandateModel::fromArray($json);
        $this::assertSame('string', $model->getOfflineAgreementHandle());
    }
}
