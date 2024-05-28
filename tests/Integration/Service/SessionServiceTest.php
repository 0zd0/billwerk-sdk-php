<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Checkout\Session\CustomerModel;
use Billwerk\Sdk\Model\Checkout\Session\OrderModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionChargeModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionRecurringModel;
use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Spatie\Snapshots\MatchesSnapshots;

class SessionServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testChargeSession()
    {
        $config = $this->devConfig['service']['session']['charge'];

        $paymentMethod = $this->sdk->session()->charge(
            (new SessionChargeModel())
            ->setOrder(
                (new OrderModel())
                ->setHandle($config['handle'])
                ->setAmount($config['amount'])
                ->setCustomer(
                    (new CustomerModel())
                    ->setHandle($config['customer_handle'])
                )
            )
        );

        $this->assertMatchesJsonSnapshot(json_encode($paymentMethod->toArray()));
    }

    public function testRecurringSession()
    {
        $config = $this->devConfig['service']['session']['recurring'];

        $paymentMethod = $this->sdk->session()->recurring(
            (new SessionRecurringModel())
                ->setCustomer($config['customer_handle'])
        );

        $this->assertMatchesJsonSnapshot(json_encode($paymentMethod->toArray()));
    }
}
