<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Charge\ChargeCancelModel;
use Billwerk\Sdk\Model\Charge\ChargeCreateModel;
use Billwerk\Sdk\Model\Charge\ChargeGetModel;
use Billwerk\Sdk\Model\Charge\ChargeModel;
use Billwerk\Sdk\Model\Charge\ChargeSettleModel;
use Exception;

class ChargeService extends AbstractService
{
    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     * @throws Exception
     */
    public function get(
        ChargeGetModel $data
    ): ChargeModel {
        $url      = $this::buildRoute(UrlPathInterface::CHARGE . "/{$data->getHandle()}");
        $response = $this->getRequest()->get($url);

        return ChargeModel::fromArray($response);
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     */
    public function create(
        ChargeCreateModel $data
    ): ChargeModel {
        $url      = $this::buildRoute(UrlPathInterface::CHARGE);
        $response = $this->getRequest()->post($url, $data->toApi());

        return ChargeModel::fromArray($response);
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     */
    public function settle(
        ChargeSettleModel $data
    ): ChargeModel {
        $url      = $this::buildRoute(UrlPathInterface::CHARGE . "/{$data->getHandle()}/" . UrlPathInterface::SETTLE);
        $response = $this->getRequest()->post($url, $data->toApi());

        return ChargeModel::fromArray($response);
    }

    public function cancel(
        ChargeCancelModel $data
    ): ChargeModel {
        $url      = $this::buildRoute(UrlPathInterface::CHARGE . "/{$data->getHandle()}/" . UrlPathInterface::CANCEL);
        $response = $this->getRequest()->post($url);

        return ChargeModel::fromArray($response);
    }
}
