<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Billwerk;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Billwerk\Sdk\Service\AbstractService;

class ServiceTest extends AbstractServiceTest
{
    public function testBuildRoute()
    {
        $url = AbstractService::buildRoute(UrlPathInterface::LIST . '/' . UrlPathInterface::ACCOUNT);
        $this::assertSame(
            '/v' . Billwerk::API_VERSION . '/' . UrlPathInterface::LIST . '/' . UrlPathInterface::ACCOUNT,
            $url
        );

        $versionApi = '2';
        $url        = AbstractService::buildRoute(
            UrlPathInterface::LIST . '/' . UrlPathInterface::ACCOUNT,
            $versionApi
        );
        $this::assertSame(
            '/v' . $versionApi . '/' . UrlPathInterface::LIST . '/' . UrlPathInterface::ACCOUNT,
            $url
        );
    }
}
