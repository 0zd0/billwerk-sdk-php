<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Enum\AgreementStateEnum;
use Billwerk\Sdk\Enum\AgreementTypeEnum;
use Billwerk\Sdk\Enum\AgreementUsageEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasIdInterface;
use DateTime;
use Exception;

class AgreementModel extends AbstractModel implements HasIdInterface
{
    /**
     * Agreement id
     *
     * @var string $id
     */
    protected string $id;

    /**
     * Agreement state: active, disabled, pending or deleted
     *
     * @see AgreementStateEnum
     * @var string $state
     */
    protected string $state;

    /**
     * Agreement type: card, viabill, anyday, resurs, klarna_pay_now, klarna_pay_later, klarna_slice_it,
     * klarna_direct_bank_transfer, klarna_direct_debit, santander,mobilepay, mobilepay_subscriptions,
     * applepay, googlepay, vipps, swish, paypal, pp_bancomatpay, pp_bancontact, pp_blik_oc, pp_giropay,
     * pp_ideal, pp_p24, pp_sepa, pp_trustly, pp_verkkopankki, pp_eps, pp_estonia_banks, pp_latvia_banks,
     * pp_lithuania_banks, pp_mb_way, pp_multibanco, pp_mybank, pp_payconiq, pp_paysafecard, pp_paysera,
     * pp_postfinance, pp_satispay, pp_twint, pp_wechatpay
     *
     * @see AgreementTypeEnum
     * @var string|null $type
     */
    protected ?string $type = null;

    /**
     * Agreement payment type usage: single, reusable, subscription
     *
     * @see AgreementUsageEnum
     * @var string $usage
     */
    protected string $usage;

    /**
     * Test agreement or not
     *
     * @var bool $test
     */
    protected bool $test;

    /**
     * Date when the agreement was created. In ISO-8601 extended offset date-time format.
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Optional name
     *
     * @var string|null $name
     */
    protected ?string $name = null;

    /**
     * Card gateway agreement details in case of card gateway
     *
     * @var CardGatewayAgreementModel|null $cardGatewayAgreement
     */
    protected ?CardGatewayAgreementModel $cardGatewayAgreement = null;

    /**
     * Offline agreement details
     *
     * @var OfflineAgreementModel|null $offlineAgreement
     */
    protected ?OfflineAgreementModel $offlineAgreement = null;

    /**
     * MobilePay online agreement details
     *
     * @var MpoAgreementModel|null $mpoAgreement
     */
    protected ?MpoAgreementModel $mpoAgreement = null;

    /**
     * Vipps agreement details
     *
     * @var VippsAgreementModel|null $vippsAgreement
     */
    protected ?VippsAgreementModel $vippsAgreement = null;

    /**
     * Vipps Recurring agreement details
     *
     * @var VippsRecurringAgreementModel|null $vippsRecurringAgreement
     */
    protected ?VippsRecurringAgreementModel $vippsRecurringAgreement = null;

    /**
     * ViaBill agreement details
     *
     * @var ViabillAgreementModel|null $viabillAgreement
     */
    protected ?ViabillAgreementModel $viabillAgreement = null;

    /**
     * Anyday agreement details
     *
     * @var AnydayAgreementModel|null $anydayAgreement
     */
    protected ?AnydayAgreementModel $anydayAgreement = null;

    /**
     * Resurs Bank agreement details
     *
     * @var ResursAgreementModel|null $resursAgreement
     */
    protected ?ResursAgreementModel $resursAgreement = null;

    /**
     * Klarna agreement details
     *
     * @var KlarnaAgreementModel|null $klarnaAgreement
     */
    protected ?KlarnaAgreementModel $klarnaAgreement = null;

    /**
     * Swish agreement details
     *
     * @var SwishAgreementModel|null $swish
     */
    protected ?SwishAgreementModel $swish = null;

    /**
     * ApplePay agreement details
     *
     * @var ApplepayAgreementModel|null $applepayAgreement
     */
    protected ?ApplepayAgreementModel $applepayAgreement = null;

    /**
     * GooglePay agreement details
     *
     * @var GooglepayAgreementModel|null $googlepayAgreement
     */
    protected ?GooglepayAgreementModel $googlepayAgreement = null;

    /**
     * PayPal agreement details
     *
     * @var PaypalAgreementModel|null $paypalAgreement
     */
    protected ?PaypalAgreementModel $paypalAgreement = null;

    /**
     * MobilePay Subscriptions agreement details in case of MobilePay Subscriptions
     *
     * @var MpsAgreementModel|null $mpsAgreement
     */
    protected ?MpsAgreementModel $mpsAgreement = null;

    /**
     * Local payment methods agreement details
     *
     * @var PproAgreementModel|null $pproAgreement
     */
    protected ?PproAgreementModel $pproAgreement = null;

    /**
     * Payever agreement details
     *
     * @var PayeverAgreementModel|null $payeverAgreement
     */
    protected ?PayeverAgreementModel $payeverAgreement = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return bool
     */
    public function getTest(): bool
    {
        return $this->test;
    }

    /**
     * @return AnydayAgreementModel|null
     */
    public function getAnydayAgreement(): ?AnydayAgreementModel
    {
        return $this->anydayAgreement;
    }

    /**
     * @return ApplepayAgreementModel|null
     */
    public function getApplepayAgreement(): ?ApplepayAgreementModel
    {
        return $this->applepayAgreement;
    }

    /**
     * @return CardGatewayAgreementModel|null
     */
    public function getCardGatewayAgreement(): ?CardGatewayAgreementModel
    {
        return $this->cardGatewayAgreement;
    }

    /**
     * @return GooglepayAgreementModel|null
     */
    public function getGooglepayAgreement(): ?GooglepayAgreementModel
    {
        return $this->googlepayAgreement;
    }

    /**
     * @return KlarnaAgreementModel|null
     */
    public function getKlarnaAgreement(): ?KlarnaAgreementModel
    {
        return $this->klarnaAgreement;
    }

    /**
     * @return MpoAgreementModel|null
     */
    public function getMpoAgreement(): ?MpoAgreementModel
    {
        return $this->mpoAgreement;
    }

    /**
     * @return MpsAgreementModel|null
     */
    public function getMpsAgreement(): ?MpsAgreementModel
    {
        return $this->mpsAgreement;
    }

    /**
     * @return OfflineAgreementModel|null
     */
    public function getOfflineAgreement(): ?OfflineAgreementModel
    {
        return $this->offlineAgreement;
    }

    /**
     * @return VippsAgreementModel|null
     */
    public function getVippsAgreement(): ?VippsAgreementModel
    {
        return $this->vippsAgreement;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return PayeverAgreementModel|null
     */
    public function getPayeverAgreement(): ?PayeverAgreementModel
    {
        return $this->payeverAgreement;
    }

    /**
     * @return PaypalAgreementModel|null
     */
    public function getPaypalAgreement(): ?PaypalAgreementModel
    {
        return $this->paypalAgreement;
    }

    /**
     * @return PproAgreementModel|null
     */
    public function getPproAgreement(): ?PproAgreementModel
    {
        return $this->pproAgreement;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return ResursAgreementModel|null
     */
    public function getResursAgreement(): ?ResursAgreementModel
    {
        return $this->resursAgreement;
    }

    /**
     * @return SwishAgreementModel|null
     */
    public function getSwish(): ?SwishAgreementModel
    {
        return $this->swish;
    }

    /**
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * @return ViabillAgreementModel|null
     */
    public function getViabillAgreement(): ?ViabillAgreementModel
    {
        return $this->viabillAgreement;
    }

    /**
     * @return VippsRecurringAgreementModel|null
     */
    public function getVippsRecurringAgreement(): ?VippsRecurringAgreementModel
    {
        return $this->vippsRecurringAgreement;
    }

    /**
     * @param string $usage
     *
     * @return self
     */
    public function setUsage(string $usage): self
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * @param bool $test
     *
     * @return self
     */
    public function setTest(bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param AnydayAgreementModel|null $anydayAgreement
     *
     * @return self
     */
    public function setAnydayAgreement(?AnydayAgreementModel $anydayAgreement): self
    {
        $this->anydayAgreement = $anydayAgreement;

        return $this;
    }

    /**
     * @param ApplepayAgreementModel|null $applepayAgreement
     *
     * @return self
     */
    public function setApplepayAgreement(?ApplepayAgreementModel $applepayAgreement): self
    {
        $this->applepayAgreement = $applepayAgreement;

        return $this;
    }

    /**
     * @param CardGatewayAgreementModel|null $cardGatewayAgreement
     *
     * @return self
     */
    public function setCardGatewayAgreement(?CardGatewayAgreementModel $cardGatewayAgreement): self
    {
        $this->cardGatewayAgreement = $cardGatewayAgreement;

        return $this;
    }

    /**
     * @param DateTime $created
     *
     * @return self
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @param GooglepayAgreementModel|null $googlepayAgreement
     *
     * @return self
     */
    public function setGooglepayAgreement(?GooglepayAgreementModel $googlepayAgreement): self
    {
        $this->googlepayAgreement = $googlepayAgreement;

        return $this;
    }

    /**
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param KlarnaAgreementModel|null $klarnaAgreement
     *
     * @return self
     */
    public function setKlarnaAgreement(?KlarnaAgreementModel $klarnaAgreement): self
    {
        $this->klarnaAgreement = $klarnaAgreement;

        return $this;
    }

    /**
     * @param MpoAgreementModel|null $mpoAgreement
     *
     * @return self
     */
    public function setMpoAgreement(?MpoAgreementModel $mpoAgreement): self
    {
        $this->mpoAgreement = $mpoAgreement;

        return $this;
    }

    /**
     * @param MpsAgreementModel|null $mpsAgreement
     *
     * @return self
     */
    public function setMpsAgreement(?MpsAgreementModel $mpsAgreement): self
    {
        $this->mpsAgreement = $mpsAgreement;

        return $this;
    }

    /**
     * @param OfflineAgreementModel|null $offlineAgreement
     *
     * @return self
     */
    public function setOfflineAgreement(?OfflineAgreementModel $offlineAgreement): self
    {
        $this->offlineAgreement = $offlineAgreement;

        return $this;
    }

    /**
     * @param VippsAgreementModel|null $vippsAgreement
     *
     * @return self
     */
    public function setVippsAgreement(?VippsAgreementModel $vippsAgreement): self
    {
        $this->vippsAgreement = $vippsAgreement;

        return $this;
    }

    /**
     * @param PayeverAgreementModel|null $payeverAgreement
     *
     * @return self
     */
    public function setPayeverAgreement(?PayeverAgreementModel $payeverAgreement): self
    {
        $this->payeverAgreement = $payeverAgreement;

        return $this;
    }

    /**
     * @param PaypalAgreementModel|null $paypalAgreement
     *
     * @return self
     */
    public function setPaypalAgreement(?PaypalAgreementModel $paypalAgreement): self
    {
        $this->paypalAgreement = $paypalAgreement;

        return $this;
    }

    /**
     * @param PproAgreementModel|null $pproAgreement
     *
     * @return self
     */
    public function setPproAgreement(?PproAgreementModel $pproAgreement): self
    {
        $this->pproAgreement = $pproAgreement;

        return $this;
    }

    /**
     * @param ResursAgreementModel|null $resursAgreement
     *
     * @return self
     */
    public function setResursAgreement(?ResursAgreementModel $resursAgreement): self
    {
        $this->resursAgreement = $resursAgreement;

        return $this;
    }

    /**
     * @param SwishAgreementModel|null $swish
     *
     * @return self
     */
    public function setSwish(?SwishAgreementModel $swish): self
    {
        $this->swish = $swish;

        return $this;
    }

    /**
     * @param ViabillAgreementModel|null $viabillAgreement
     *
     * @return self
     */
    public function setViabillAgreement(?ViabillAgreementModel $viabillAgreement): self
    {
        $this->viabillAgreement = $viabillAgreement;

        return $this;
    }

    /**
     * @param VippsRecurringAgreementModel|null $vippsRecurringAgreement
     *
     * @return self
     */
    public function setVippsRecurringAgreement(?VippsRecurringAgreementModel $vippsRecurringAgreement): self
    {
        $this->vippsRecurringAgreement = $vippsRecurringAgreement;

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
            ->setId($response['id'])
            ->setTest($response['test'])
            ->setCreated(new DateTime($response['created']));

        if (isset($response['state']) && in_array($response['state'], AgreementStateEnum::getAll(), true)) {
            $model->setState($response['state']);
        }

        if (isset($response['type']) && in_array($response['type'], AgreementTypeEnum::getAll(), true)) {
            $model->setType($response['type']);
        }

        if (isset($response['usage']) && in_array($response['usage'], AgreementUsageEnum::getAll(), true)) {
            $model->setUsage($response['usage']);
        }

        if (isset($response['name'])) {
            $model->setName($response['name']);
        }

        if (isset($response['card_gateway_agreement'])) {
            $model->setCardGatewayAgreement(CardGatewayAgreementModel::fromArray($response['card_gateway_agreement']));
        }

        if (isset($response['offline_agreement'])) {
            $model->setOfflineAgreement(OfflineAgreementModel::fromArray($response['offline_agreement']));
        }

        if (isset($response['mpo_agreement'])) {
            $model->setMpoAgreement(MpoAgreementModel::fromArray($response['mpo_agreement']));
        }

        if (isset($response['vipps_agreement'])) {
            $model->setVippsAgreement(VippsAgreementModel::fromArray($response['vipps_agreement']));
        }

        if (isset($response['vipps_recurring_agreement'])) {
            $model->setVippsRecurringAgreement(
                VippsRecurringAgreementModel::fromArray($response['vipps_recurring_agreement'])
            );
        }
        if (isset($response['viabill_agreement'])) {
            $model->setViabillAgreement(ViabillAgreementModel::fromArray($response['viabill_agreement']));
        }

        if (isset($response['anyday_agreement'])) {
            $model->setAnydayAgreement(AnydayAgreementModel::fromArray($response['anyday_agreement']));
        }

        if (isset($response['resurs_agreement'])) {
            $model->setResursAgreement(ResursAgreementModel::fromArray($response['resurs_agreement']));
        }

        if (isset($response['klarna_agreement'])) {
            $model->setKlarnaAgreement(KlarnaAgreementModel::fromArray($response['klarna_agreement']));
        }

        if (isset($response['swish'])) {
            $model->setSwish(SwishAgreementModel::fromArray($response['swish']));
        }

        if (isset($response['applepay_agreement'])) {
            $model->setApplepayAgreement(ApplepayAgreementModel::fromArray($response['applepay_agreement']));
        }

        if (isset($response['googlepay_agreement'])) {
            $model->setGooglepayAgreement(GooglepayAgreementModel::fromArray($response['googlepay_agreement']));
        }

        if (isset($response['paypal_agreement'])) {
            $model->setPaypalAgreement(PaypalAgreementModel::fromArray($response['paypal_agreement']));
        }

        if (isset($response['mps_agreement'])) {
            $model->setMpsAgreement(MpsAgreementModel::fromArray($response['mps_agreement']));
        }

        if (isset($response['ppro_agreement'])) {
            $model->setPproAgreement(PproAgreementModel::fromArray($response['ppro_agreement']));
        }

        if (isset($response['payever_agreement'])) {
            $model->setPayeverAgreement(PayeverAgreementModel::fromArray($response['payever_agreement']));
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'state' => $this->getState(),
            'type' => $this->getType(),
            'usage' => $this->getUsage(),
            'test' => $this->getTest(),
            'created' => $this->getCreated()->format('Y-m-d\TH:i:s.v'),
            'display_name' => $this->getName(),
            'card_gateway_agreement' =>
                $this->getCardGatewayAgreement() ? $this->getCardGatewayAgreement()->toArray() : null,
            'offline_agreement' => $this->getOfflineAgreement() ? $this->getOfflineAgreement()->toArray() : null,
            'mpo_agreement' => $this->getMpoAgreement() ? $this->getMpoAgreement()->toArray() : null,
            'vipps_agreement' => $this->getVippsAgreement() ? $this->getVippsAgreement()->toArray() : null,
            'vipps_recurring_agreement' =>
                $this->getVippsRecurringAgreement() ? $this->getVippsRecurringAgreement()->toArray() : null,
            'viabill_agreement' => $this->getViabillAgreement() ? $this->getViabillAgreement()->toArray() : null,
            'anyday_agreement' => $this->getAnydayAgreement() ? $this->getAnydayAgreement()->toArray() : null,
            'resurs_agreement' => $this->getResursAgreement() ? $this->getResursAgreement()->toArray() : null,
            'klarna_agreement' => $this->getKlarnaAgreement() ? $this->getKlarnaAgreement()->toArray() : null,
            'swish' => $this->getSwish() ? $this->getSwish()->toArray() : null,
            'applepay_agreement' => $this->getApplepayAgreement() ? $this->getApplepayAgreement()->toArray() : null,
            'googlepay_agreement' => $this->getGooglepayAgreement() ? $this->getGooglepayAgreement()->toArray() : null,
            'paypal_agreement' => $this->getPaypalAgreement() ? $this->getPaypalAgreement()->toArray() : null,
            'mps_agreement' => $this->getMpsAgreement() ? $this->getMpsAgreement()->toArray() : null,
            'ppro_agreement' => $this->getPproAgreement() ? $this->getPproAgreement()->toArray() : null,
            'payever_agreement' => $this->getPayeverAgreement() ? $this->getPayeverAgreement()->toArray() : null,
        ], function ($value) {
            return $value !== null;
        });
    }
}
