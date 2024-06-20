<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class EmvConfigurationModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(EmvConfigurationModel::getClassName());
        $model = EmvConfigurationModel::fromArray($json);
        $this::assertSame('string', $model->getEmvTokenizationStatus());
        $this::assertSame('string2', $model->getTokenRequestorId());
        $this::assertSame(null, $model->getOnboardingState());
        $this::assertSame('string4', $model->getCardScheme());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(EmvConfigurationModel::getClassName());
        $model = EmvConfigurationModel::fromArray($json);
        $this::assertSame('string', $model->getEmvTokenizationStatus());
        $this::assertSame('string2', $model->getTokenRequestorId());
        $this::assertSame('string3', $model->getOnboardingState());
        $this::assertSame('string4', $model->getCardScheme());
    }
}
