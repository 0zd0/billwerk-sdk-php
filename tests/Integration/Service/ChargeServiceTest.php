<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Model\Charge\ChargeCancelModel;
use Billwerk\Sdk\Model\Charge\ChargeCreateModel;
use Billwerk\Sdk\Model\Charge\ChargeGetModel;
use Billwerk\Sdk\Model\Charge\ChargeModel;
use Billwerk\Sdk\Model\Charge\ChargeSettleModel;
use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Spatie\Snapshots\MatchesSnapshots;

class ChargeServiceTest extends TestCase
{
    use MatchesSnapshots;

    /**
     * @param string|null $handle
     *
     * @return ChargeModel
     * @throws BillwerkApiException
     * @throws BillwerkClientException
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     */
    public function create(?string $handle): ChargeModel
    {
        $config = $this->devConfig['service']['charge'];

        return $this->sdk->charge()->create(
            (new ChargeCreateModel())
                ->setHandle($handle ?? $config['handle'])
                ->setSource($config['source'])
                ->setCustomerHandle($config['customer_handle'])
                ->setAmount($config['amount'])
        );
    }

    public function testChargeCreateAndCancel()
    {
        $config = $this->devConfig['service']['charge'];

        $charge = $this->create($config['handle']);
        self::assertSame($charge->getHandle(), $config['handle']);

        $cancel = $this->sdk->charge()->cancel(
            (new ChargeCancelModel())
                ->setHandle($charge->getHandle())
        );
        self::assertSame($cancel->getHandle(), $charge->getHandle());
    }

    public function testGetCharge()
    {
        $config = $this->devConfig['service']['charge'];

        $charge = $this->sdk->charge()->get(
            (new ChargeGetModel())
                ->setHandle($config['handle'])
        );

        $this->assertMatchesJsonSnapshot(json_encode($charge->toArray()));
    }

    public function testSettleCharge()
    {
        $config = $this->devConfig['service']['charge'];

        $charge = $this->create(
            $config['settle']['handle']
        );

        try {
            $this->sdk->charge()->settle(
                (new ChargeSettleModel())
                    ->setHandle($charge->getHandle())
            );
        } catch (BillwerkApiException $exception) {
            self::assertSame(422, $exception->getErrorApi()->getHttpStatus());
        }

        $settle = $this->sdk->charge()->settle(
            (new ChargeSettleModel())
                ->setHandle($charge->getHandle())
                ->setAmount($config['amount'])
        );
        self::assertSame($settle->getHandle(), $charge->getHandle());

        $this->assertMatchesJsonSnapshot(json_encode($settle->toArray()));
    }
}
