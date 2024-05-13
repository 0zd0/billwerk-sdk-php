<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Model\Refund\RefundCreateModel;
use Billwerk\Sdk\Model\Refund\RefundModel;
use Exception;

class RefundService extends AbstractService
{
    /**
     * @throws Exception
     */
    public function create(RefundCreateModel $data): RefundModel
    {
        $url      = $this::buildRoute(UrlPathInterface::REFUND);
        $response = $this->getRequest()->post($url, $data->toApi());

        return RefundModel::fromArray($response);
    }
}
