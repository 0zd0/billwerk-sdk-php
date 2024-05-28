<?php

namespace Billwerk\Sdk\Test\Unit\Model\Checkout\Session;

use Billwerk\Sdk\Model\Checkout\Session\PhoneModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class PhoneModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PhoneModel::getClassName());
        $model = PhoneModel::fromArray($json);
        $this::assertSame('45', $model->getCc());
        $this::assertSame('56565656', $model->getSubscriber());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
