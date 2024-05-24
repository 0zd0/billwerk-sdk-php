<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Checkout\Session\SessionChargeModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionModel;

class SessionService extends AbstractService
{
    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     */
    public function charge(
        SessionChargeModel $data
    ): SessionModel {
        $url      = $this::buildRoute(UrlPathInterface::SESSION . "/" . UrlPathInterface::CHARGE);
        $response = $this->getRequest()->post($url, $data->toApi());

        return SessionModel::fromArray($response);
    }
}
