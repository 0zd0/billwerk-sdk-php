<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\AccountModel;
use Billwerk\Sdk\Model\WebhookSettingsModel;
use Exception;

class AccountService extends AbstractService
{
    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     * @throws Exception
     */
    public function get(): AccountModel
    {
        $url      = $this::buildRoute(UrlPathInterface::ACCOUNT);
        $response = $this->getRequest()->get($url);

        return AccountModel::fromArray($response);
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     */
    public function getWebHookSettings(): WebHookSettingsModel
    {
        $url      = $this::buildRoute(UrlPathInterface::ACCOUNT . "/", UrlPathInterface::WEBHOOK_SETTINGS);
        $response = $this->getRequest()->get($url);

        return WebhookSettingsModel::fromArray($response);
    }
}
