<?php

namespace Billwerk\Sdk\Test\Unit\Model;

use Billwerk\Sdk\Model\MetaDataValueModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class MetaDataValueModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json = $this::getStubJsonModelWithAllFields(MetaDataValueModel::getClassName());
        foreach ($json as $key => $value) {
            $model = new MetaDataValueModel();
            $model->setKey($key)
                  ->setValue($value);
            $this::assertSame($key, $model->getKey());
            $this::assertSame($value, $model->getValue());
        }
    }
}
