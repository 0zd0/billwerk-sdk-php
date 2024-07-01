<?php

namespace Billwerk\Sdk\Model\Invoice;

use Billwerk\Sdk\Model\AbstractModel;
use DateTime;
use Exception;

/**
 * Credits applied to invoice
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Model\Invoice
 */
class CreditModel extends AbstractModel
{
    /**
     * Credit handle
     *
     * @var string $credit
     */
    protected string $credit;

    /**
     * The credit amount transferred to invoice
     *
     * @var int $amount
     */
    protected int $amount;

    /**
     * Date when credit was transferred to invoice. In ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Text describing the credit
     *
     * @var string $text
     */
    protected string $text;

    /**
     * The credit amount transferred to invoice
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Date when credit was transferred to invoice. In ISO-8601 extended offset date-time format
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Credit handle
     *
     * @return string
     */
    public function getCredit(): string
    {
        return $this->credit;
    }

    /**
     * Text describing the credit
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Date when credit was transferred to invoice. In ISO-8601 extended offset date-time format
     *
     * @param DateTime $created
     *
     * @return CreditModel
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * The credit amount transferred to invoice
     *
     * @param int $amount
     *
     * @return CreditModel
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Credit handle
     *
     * @param string $credit
     *
     * @return CreditModel
     */
    public function setCredit(string $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Text describing the credit
     *
     * @param string $text
     *
     * @return CreditModel
     */
    public function setText(string $text): self
    {
        $this->text = $text;

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

        $model
            ->setCredit($response['credit'])
            ->setAmount($response['amount'])
            ->setCreated(new DateTime($response['created']))
            ->setText($response['text']);

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'credit' => $this->getCredit(),
            'amount' => $this->getAmount(),
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'text' => $this->getText(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
