<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Billwerk;
use Billwerk\Sdk\BillwerkRequest;

abstract class AbstractService
{
    protected BillwerkRequest $request;

    public function __construct(
        BillwerkRequest $request
    ) {
        $this->request = $request;
    }

    /**
     * @return BillwerkRequest
     */
    public function getRequest(): BillwerkRequest
    {
        return $this->request;
    }

    public static function buildRoute(
        string $path,
        string $version = Billwerk::API_VERSION
    ): string {
        return '/v' . $version . '/' . $path;
    }
}
