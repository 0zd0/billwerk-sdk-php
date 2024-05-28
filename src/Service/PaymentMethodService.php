<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodModel;
use Exception;

class PaymentMethodService extends AbstractService
{
    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     * @throws Exception
     */
    public function get(
        PaymentMethodGetModel $data
    ): PaymentMethodModel {
        $url      = $this::buildRoute(UrlPathInterface::PAYMENT_METHOD . "/" . $data->getId());
        $response = $this->getRequest()->get($url);

        return PaymentMethodModel::fromArray($response);
    }
}
