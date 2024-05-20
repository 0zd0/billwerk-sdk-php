<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerCollectionModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Customer\CustomerModel;

final class CustomerServiceTest extends AbstractServiceTest
{
    public function testGetCustomer()
    {
        $this->setMockJsonModel(CustomerModel::getClassName());

        $handle = 'customer006';

        $customer = $this->customer->get((new CustomerGetModel())->setHandle($handle));

        $this::assertInstanceOf(CustomerModel::class, $customer);
        $this::assertSame($handle, $customer->getHandle());
    }

    public function testGetList()
    {
        $this->setMockJsonModel(CustomerCollectionModel::getClassName());

        $data = new CustomerCollectionGetModel();

        $customerList = $this->customer->list($data);

        $this::assertContainsOnlyInstancesOf(CustomerModel::class, $customerList->getContent());
    }
}
