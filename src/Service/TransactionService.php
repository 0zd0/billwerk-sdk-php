<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionModel;
use Exception;

class TransactionService extends AbstractService
{
    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     * @throws Exception
     */
    public function get(
        TransactionGetModel $data
    ): TransactionModel {
        $url = $this::buildRoute(
            UrlPathInterface::INVOICE . "/{$data->getId()}/" .
            UrlPathInterface::TRANSACTION . "/{$data->getTransaction()}"
        );

        $response = $this->getRequest()->get($url);

        return TransactionModel::fromArray($response);
    }
}
