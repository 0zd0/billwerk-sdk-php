<?php

namespace Billwerk\Sdk\Test\Model\Checkout\Session;

use Billwerk\Sdk\Model\Checkout\Session\SessionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class SessionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(SessionModel::getClassName());
        $model = SessionModel::fromArray($json);
        $this::assertSame('string', $model->getId());
        $this::assertSame('string2', $model->getUrl());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(SessionModel::getClassName());
        $model = SessionModel::fromArray($json);
        $this::assertSame('string', $model->getId());
        $this::assertSame('string2', $model->getUrl());
    }
}
