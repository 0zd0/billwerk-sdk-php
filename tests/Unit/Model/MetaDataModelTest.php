<?php

namespace Billwerk\Sdk\Test\Unit\Model;

use Billwerk\Sdk\Model\MetaDataModel;
use Billwerk\Sdk\Model\MetaDataValueModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class MetaDataModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(MetaDataModel::getClassName());
        foreach ($json as $key => $object) {
            $model = MetaDataModel::fromObject($key, $object);
            $this::assertSame($key, $model->getKey());
            $this::assertContainsOnlyInstancesOf(MetaDataValueModel::class, $model->getValue());
        }
    }
}
