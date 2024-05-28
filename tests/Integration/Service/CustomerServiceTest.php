<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Spatie\Snapshots\MatchesSnapshots;

class CustomerServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testGetCustomer()
    {
        $account = $this->sdk->customer()->get((new CustomerGetModel())->setHandle(
            $this->devConfig['service']['customer']['get']['handle']
        ));

        $this->assertMatchesJsonSnapshot(json_encode($account->toArray()));
    }

    public function testGetCustomerList()
    {
        $config = $this->devConfig['service']['customer']['list'];

        $accountList = $this->sdk->customer()->list(
            (new CustomerCollectionGetModel)
            ->setEmail($config['email'])
            ->setTo(new DateTime($config['to']))
        );

        $this->assertMatchesJsonSnapshot(json_encode($accountList->toArray()));
    }
}
