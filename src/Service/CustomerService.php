<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Model\Customer\CustomerModel;
use Exception;

class CustomerService extends AbstractService
{
    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     * @throws Exception
     */
    public function get(
        CustomerGetModel $data
    ): CustomerModel {
        $url      = $this::buildRoute(UrlPathInterface::CUSTOMER . "/{$data->getHandle()}");
        $response = $this->getRequest()->get($url);

        return CustomerModel::fromArray($response);
    }
}
