<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Model\SepaMandateModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class SepaMandateModelTest extends TestCase
{
    use StubTrait;
    
    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json = $this::getStubJsonModelWithRequiredFields(SepaMandateModel::getClassName());
        $model = SepaMandateModel::fromArray($json);
        $this::assertSame(null, $model->getIban());
    }
    
    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(SepaMandateModel::getClassName());
        $model = SepaMandateModel::fromArray($json);
        $this::assertSame('string', $model->getIban());
    }
}
