<?php

namespace Billwerk\Sdk\Model\Transaction;

use Billwerk\Sdk\Enum\KlarnaTransactionTypeEnum;

class KlarnaTransactionModel extends AbstractTransactionModel
{
    /**
     * Klarna id
     *
     * @var string|null $klarnaId
     */
    protected ?string $klarnaId = null;

    /**
     * Transaction type: klarna_pay_now, klarna_pay_later, klarna_slice_it,
     * klarna_direct_bank_transfer, klarna_direct_debit
     *
     * @see KlarnaTransactionTypeEnum
     * @var string $type
     */
    protected string $type;

    /**
     * Klarna id
     *
     * @return string|null
     */
    public function getKlarnaId(): ?string
    {
        return $this->klarnaId;
    }

    /**
     * Transaction type: klarna_pay_now, klarna_pay_later, klarna_slice_it,
     *  klarna_direct_bank_transfer, klarna_direct_debit
     *
     * @see KlarnaTransactionTypeEnum
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Klarna id
     *
     * @param string|null $klarnaId
     *
     * @return self
     */
    public function setKlarnaId(?string $klarnaId): self
    {
        $this->klarnaId = $klarnaId;

        return $this;
    }

    /**
     * Transaction type: klarna_pay_now, klarna_pay_later, klarna_slice_it,
     *  klarna_direct_bank_transfer, klarna_direct_debit
     *
     * @see KlarnaTransactionTypeEnum
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        if (in_array($response['type'], KlarnaTransactionTypeEnum::getAll(), true)) {
            $model->setType($response['type']);
        }

        if (isset($response['klarna_id'])) {
            $model->setKlarnaId($response['klarna_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'type' => $this->getType(),
            'klarna_id' => $this->getKlarnaId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
