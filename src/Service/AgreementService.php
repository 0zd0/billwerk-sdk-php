<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Agreement\AgreementGetAllModel;
use Billwerk\Sdk\Model\Agreement\AgreementModel;
use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionModel;
use Exception;

class AgreementService extends AbstractService
{
    /**
     * @return AgreementModel[]
     *
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     * @throws Exception
     */
    public function all(
        ?AgreementGetAllModel $data = null
    ): array {
        $url = $this::buildRoute(
            UrlPathInterface::AGREEMENT
        );

        $response = $this->getRequest()->get($url, $data ? $data->toArray() : []);

        return array_map(fn($item) => AgreementModel::fromArray($item), $response);
    }
}
