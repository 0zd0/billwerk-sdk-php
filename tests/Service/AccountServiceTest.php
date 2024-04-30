<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\AccountModel;

final class AccountServiceTest extends AbstractServiceTest
{
    public function testGetAccount()
    {
        $this->setMockJsonModel(AccountModel::getClassName());
        
        $account = $this->account->get();
        
        $this::assertInstanceOf(AccountModel::class, $account);
    }
}
