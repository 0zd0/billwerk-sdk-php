<?php

namespace Billwerk\Sdk\Model\Transaction;

use Billwerk\Sdk\Model\AbstractModel;
use DateTime;
use Exception;

class ManualTransactionModel extends AbstractModel
{
    /**
     * The method used for the offline manual transaction, allowable values: cash,
     * bank_transfer, check, chargeback, other
     *
     * @see ManualTransactionMethodEnum
     * @var string $method
     */
    protected string $method;

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
     * When the manual transaction was performed on the form yyyy-MM-dd, yyyyMMdd,
     * yyyy-MM-ddTHH:mm and yyyy-MM-ddTHH:mm:ss
     *
     * @var DateTime $paymentDate
     */
    protected DateTime $paymentDate;

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return DateTime
     */
    public function getPaymentDate(): DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param string $method
     *
     * @return self
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param DateTime $paymentDate
     *
     * @return self
     */
    public function setPaymentDate(DateTime $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setMethod($response['method']);

        if (isset($response['comment'])) {
            $model->setComment($response['comment']);
        }

        if (isset($response['reference'])) {
            $model->setReference($response['reference']);
        }

        $model->setPaymentDate(new DateTime($response['payment_date']));

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'method' => $this->getMethod(),
            'comment' => $this->getComment(),
            'reference' => $this->getReference(),
            'payment_date' => $this->getPaymentDate() ? $this->getPaymentDate()->format('Y-m-d\TH:i:s.v') : null,
        ], function ($value) {
            return $value !== null;
        });
    }
}
