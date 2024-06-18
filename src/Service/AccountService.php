<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsUpdateModel;
use Exception;

class AccountService extends AbstractService
{
    /**
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
     * @throws BillwerkApiException
     */
    public function getWebHookSettings(): WebHookSettingsModel
    {
        $url      = $this::buildRoute(UrlPathInterface::ACCOUNT . "/" . UrlPathInterface::WEBHOOK_SETTINGS);
        $response = $this->getRequest()->get($url);

        return WebhookSettingsModel::fromArray($response);
    }

    /**
     * @throws BillwerkApiException
     */
    public function updateWebHookSettings(WebhookSettingsUpdateModel $data): WebHookSettingsModel
    {
        $url      = $this::buildRoute(UrlPathInterface::ACCOUNT . "/" . UrlPathInterface::WEBHOOK_SETTINGS);
        $response = $this->getRequest()->put($url, $data->toApi());

        return WebhookSettingsModel::fromArray($response);
    }
}
