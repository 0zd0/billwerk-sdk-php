<?php

namespace Billwerk\Sdk\Exception;

use Billwerk\Sdk\Model\ErrorModel;
use Billwerk\Sdk\Util\LastRequestInfo;
use Exception;
use Throwable;

class BillwerkApiException extends Exception
{
    protected int $errorCode;
    protected string $title           = "";
    protected ?LastRequestInfo $lastRequestInfo = null;
    protected ?ErrorModel $errorApi        = null;


    public function __construct(
        $message = "",
        $code = 0,
        LastRequestInfo $lastRequestInfo = null,
        ErrorModel $errorApi = null,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this
            ->setTitle($message)
            ->setErrorCode($code)
            ->setLastRequestInfo($lastRequestInfo)
            ->setErrorApi($errorApi);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     *
     * @return BillwerkApiException
     */
    public function setErrorCode(int $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @return ErrorModel|null
     */
    public function getErrorApi(): ?ErrorModel
    {
        return $this->errorApi;
    }

    /**
     * @param ErrorModel|null $errorApi
     *
     * @return BillwerkApiException
     */
    public function setErrorApi(?ErrorModel $errorApi): self
    {
        $this->errorApi = $errorApi;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return BillwerkApiException
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param LastRequestInfo|null $lastRequestInfo
     *
     * @return BillwerkApiException
     */
    public function setLastRequestInfo(?LastRequestInfo $lastRequestInfo): self
    {
        $this->lastRequestInfo = $lastRequestInfo;

        return $this;
    }

    /**
     * @return LastRequestInfo|null
     */
    public function getLastRequestInfo(): ?LastRequestInfo
    {
        return $this->lastRequestInfo;
    }
}
