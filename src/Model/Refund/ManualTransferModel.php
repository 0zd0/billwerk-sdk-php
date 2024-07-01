<?php

namespace Billwerk\Sdk\Model\Refund;

use Billwerk\Sdk\Enum\ManualTransferMethodEnum;
use Billwerk\Sdk\Model\AbstractModel;
use DateTime;

/**
 * Optional manual transfer. If given no refund will be performed on potential online settled
 * transaction like card transaction
 *
 * @see https://optimize-docs.billwerk.com/reference/createrefund
 *
 * @package Billwerk\Sdk\Model
 */
class ManualTransferModel extends AbstractModel
{
    /**
     * Optional comment for manual transaction
     *
     * @var string|null $comment
     */
    protected ?string $comment = null;
    /**
     * Optional reference for the manual transaction
     *
     * @var string|null $reference
     */
    protected ?string $reference = null;
    /**
     * The refund method used for the offline manual transaction, allowable values:
     * cash, chargeback, bank_transfer, check, other
     *
     * @see ManualTransactionMethodEnum
     * @var string $method
     */
    protected string $method;

    /**
     * When the manual transaction was performed on the form yyyy-MM-dd, yyyyMMdd,
     * yyyy-MM-ddTHH:mm and yyyy-MM-ddTHH:mm:ss
     *
     * @var DateTime $paymentDate
     */
    protected DateTime $paymentDate;

    /**
     * The refund method used for the offline manual transaction, allowable values:
     *  cash, chargeback, bank_transfer, check, other
     *
     * @see ManualTransactionMethodEnum
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Optional comment for manual transaction
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * When the manual transaction was performed on the form yyyy-MM-dd, yyyyMMdd,
     *  yyyy-MM-ddTHH:mm and yyyy-MM-ddTHH:mm:ss
     *
     * @return DateTime
     */
    public function getPaymentDate(): DateTime
    {
        return $this->paymentDate;
    }

    /**
     * Optional reference for the manual transaction
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Optional comment for manual transaction
     *
     * @param string|null $comment
     *
     * @return ManualTransferModel
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * The refund method used for the offline manual transaction, allowable values:
     *  cash, chargeback, bank_transfer, check, other
     *
     * @see ManualTransactionMethodEnum
     *
     * @param string $method
     *
     * @return ManualTransferModel
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * When the manual transaction was performed on the form yyyy-MM-dd, yyyyMMdd,
     *  yyyy-MM-ddTHH:mm and yyyy-MM-ddTHH:mm:ss
     *
     * @param DateTime $paymentDate
     *
     * @return ManualTransferModel
     */
    public function setPaymentDate(DateTime $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Optional reference for the manual transaction
     *
     * @param string|null $reference
     *
     * @return ManualTransferModel
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['comment'])) {
            $model->setComment($response['comment']);
        }

        if (isset($response['reference'])) {
            $model->setReference($response['reference']);
        }

        if (in_array($response['method'], ManualTransferMethodEnum::getAll())) {
            $model->setMethod($response['method']);
        }

        $timestamp = strtotime($response['payment_date']);
        if ($timestamp !== false) {
            $date = new DateTime();
            $date->setTimestamp($timestamp);
            $model->setPaymentDate($date);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'comment' => $this->getComment(),
            'reference' => $this->getReference(),
            'method' => $this->getMethod(),
            'payment_date' => $this->getPaymentDate()->format('Y-m-d\TH:i:s.v'),
        ], function ($value) {
            return $value !== null;
        });
    }
}
