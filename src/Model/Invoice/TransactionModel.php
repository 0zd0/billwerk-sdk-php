<?php

namespace Billwerk\Sdk\Model\Invoice;

use Billwerk\Sdk\Enum\PaymentContextEnum;
use Billwerk\Sdk\Enum\TransactionPaymentTypeEnum;
use Billwerk\Sdk\Enum\TransactionStateEnum;
use Billwerk\Sdk\Enum\TransactionTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasIdInterface;
use DateTime;
use Exception;

class TransactionModel extends AbstractModel implements HasIdInterface
{
    /**
     * Transaction id assigned by Reepay
     *
     * @var string $id
     */
    protected string $id;

    /**
     * State of the transaction, one of the following: pending, processing, authorized,
     * settled, refunded, failed, cancelled
     *
     * @see TransactionStateEnum
     * @var string $state
     */
    protected string $state;

    /**
     * Invoice handle
     *
     * @var string $invoice
     */
    protected string $invoice;

    /**
     * Transaction type, one of the following: settle, refund, authorization
     *
     * @var string $type
     */
    protected string $type;

    /**
     * The transaction amount
     *
     * @var int $amount
     */
    protected int $amount;

    /**
     * Currency in ISO 4217 three letter alpha code
     *
     * @var string|null $currency
     */
    protected ?string $currency = null;

    /**
     * When the transaction was settled, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $settled
     */
    protected ?DateTime $settled = null;

    /**
     * When the transaction was authorized, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $authorized
     */
    protected ?DateTime $authorized = null;

    /**
     * When the transaction failed, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $failed
     */
    protected ?DateTime $failed = null;

    /**
     * When the transaction was refunded, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $refunded
     */
    protected ?DateTime $refunded = null;

    /**
     * Date when the transaction was created. In ISO-8601 extended offset date-time format
     *     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Payment type for transaction, either: card, mpo, mobilepay, vipps, vipps_recurring, swish, viabill,
     * anyday, manual, applepay, googlepay, paypal, klarna_pay_now, klarna_pay_later, klarna_slice_it,
     * klarna_direct_bank_transfer, klarna_direct_debit, resurs, mobilepay_subscriptions, emv_token,
     * bancomatpay, bcmc, blik, pp_blik_oc, giropay, ideal, p24, sepa, trustly, eps, estonia_banks,
     * latvia_banks, lithuania_banks, mb_way, multibanco, mybank, payconiq, paysafecard, paysera,
     * postfinance, satispay, twint, wechatpay, santander, or verkkopankki, offline_cash,
     * offline_bank_transfer, offline_other
     *
     * @see TransactionPaymentTypeEnum
     * @var string $paymentType
     */
    protected string $paymentType;

    /**
     * Reference to payment method in case of a MIT transaction
     *
     * @var string|null $paymentMethod
     */
    protected ?string $paymentMethod = null;

    /**
     * Specifics in case of Card transaction
     *
     * @var CardTransactionModel|null $cardTransaction
     */
    protected ?CardTransactionModel $cardTransaction = null;

    /**
     * Specifics in case of mpo transaction
     *
     * @var MpoTransactionModel|null $mpoTransaction
     */
    protected ?MpoTransactionModel $mpoTransaction = null;

    /**
     * Specifics in case of Vipps transaction
     *
     * @var VippsTransactionModel|null $vippsTransaction
     */
    protected ?VippsTransactionModel $vippsTransaction = null;

    /**
     * Specifics in case of ApplePay transaction
     *
     * @var ApplePayTransactionModel|null $applepayTransaction
     */
    protected ?ApplePayTransactionModel $applepayTransaction = null;

    /**
     * Specifics in case of GooglePay transaction
     *
     * @var GooglePayTransactionModel|null $googlepayTransaction
     */
    protected ?GooglePayTransactionModel $googlepayTransaction = null;

    /**
     * Specifics in case of manual transaction
     *
     * @var ManualTransactionModel|null $manualTransaction
     */
    protected ?ManualTransactionModel $manualTransaction = null;

    /**
     * Specifics in case of ViaBill transaction
     *
     * @var ViabillTransactionModel|null $viabillTransaction
     */
    protected ?ViabillTransactionModel $viabillTransaction = null;

    /**
     * Specifics in case of Anyday transaction
     *
     * @var AnydayTransactionModel|null
     */
    protected ?AnydayTransactionModel $anydayTransaction = null;

    /**
     * Specifics in case of Santander transaction
     *
     * @var SantanderTransactionModel|null $santanderTransaction
     */
    protected ?SantanderTransactionModel $santanderTransaction = null;

    /**
     * Specifics in case of Resurs Bank transaction
     *
     * @var ResursTransactionModel|null $resursTransaction
     */
    protected ?ResursTransactionModel $resursTransaction = null;

    /**
     * Specifics in case of Klarna transaction
     *
     * @var KlarnaTransactionModel|null $klarnaTransaction
     */
    protected ?KlarnaTransactionModel $klarnaTransaction = null;

    /**
     * Specifics in case of Swish transaction
     *
     * @var SwishTransactionModel|null $swishTransaction
     */
    protected ?SwishTransactionModel $swishTransaction = null;

    /**
     * Specifics in case of PayPal transaction
     *
     * @var PaypalTransactionModel|null $paypalTransaction
     */
    protected ?PaypalTransactionModel $paypalTransaction = null;

    /**
     * Specifics in case of Bancomat Pay transaction
     *
     * @var BancomatpayTransactionModel|null $bancomatpayTransaction
     */
    protected ?BancomatpayTransactionModel $bancomatpayTransaction = null;

    /**
     * Specifics in case of Bancontact transaction
     *
     * @var BancontactTransactionModel|null $bancontactTransaction
     */
    protected ?BancontactTransactionModel $bancontactTransaction = null;

    /**
     * Specifics in case of BLIK transaction
     *
     * @var BlikTransactionModel|null $blikTransaction
     */
    protected ?BlikTransactionModel $blikTransaction = null;

    /**
     * Specifics in case of IDEAL transaction
     *
     * @var IdealTransactionModel|null $idealTransaction
     */
    protected ?IdealTransactionModel $idealTransaction = null;

    /**
     * Specifics in case of P24 transaction
     *
     * @var P24TransactionModel|null $p24Transaction
     */
    protected ?P24TransactionModel $p24Transaction = null;

    /**
     * Specifics in case of Trustly transaction
     *
     * @var TrustlyTransactionModel|null $trustlyTransaction
     */
    protected ?TrustlyTransactionModel $trustlyTransaction = null;

    /**
     * Specifics in case of Eps transaction
     *
     * @var EpsTransactionModel|null $epsTransaction
     */
    protected ?EpsTransactionModel $epsTransaction = null;

    /**
     * Specifics in case of Estonia Banks transaction
     *
     * @var EstoniaBanksTransactionModel|null $estoniaBanksTransaction
     */
    protected ?EstoniaBanksTransactionModel $estoniaBanksTransaction = null;

    /**
     * Specifics in case of Latvia Banks transaction
     *
     * @var LatviaBanksTransactionModel|null $latviaBanksTransaction
     */
    protected ?LatviaBanksTransactionModel $latviaBanksTransaction = null;

    /**
     * Specifics in case of Lithuania Banks transaction
     *
     * @var LithuaniaBanksTransactionModel|null $lithuaniaBanksTransaction
     */
    protected ?LithuaniaBanksTransactionModel $lithuaniaBanksTransaction = null;

    /**
     * Specifics in case of MB Way transaction
     *
     * @var MbwayTransactionModel|null $mbwayTransaction
     */
    protected ?MbwayTransactionModel $mbwayTransaction = null;

    /**
     * Specifics in case of Multibanco transaction
     *
     * @var MultibancoTransactionModel|null $multibancoTransaction
     */
    protected ?MultibancoTransactionModel $multibancoTransaction = null;

    /**
     * Specifics in case of MyBank transaction
     *
     * @var MybankTransactionModel|null $mybankTransaction
     */
    protected ?MybankTransactionModel $mybankTransaction = null;

    /**
     * Specifics in case of Payconiq transaction
     *
     * @var PayconiqTransactionModel|null $payconiqTransaction
     */
    protected ?PayconiqTransactionModel $payconiqTransaction = null;

    /**
     * Specifics in case of Paysafecard transaction
     *
     * @var PaysafecardTransactionModel|null $paysafecardTransaction
     */
    protected ?PaysafecardTransactionModel $paysafecardTransaction = null;

    /**
     * Specifics in case of Paysera transaction
     *
     * @var PayseraTransactionModel|null $payseraTransaction
     */
    protected ?PayseraTransactionModel $payseraTransaction = null;

    /**
     * Specifics in case of PostFinance transaction
     *
     * @var PostfinanceTransactionModel|null $postfinanceTransaction
     */
    protected ?PostfinanceTransactionModel $postfinanceTransaction = null;

    /**
     * Specifics in case of Satispay transaction
     *
     * @var SatispayTransactionModel|null $satispayTransaction
     */
    protected ?SatispayTransactionModel $satispayTransaction = null;

    /**
     * Specifics in case of Twint transaction
     *
     * @var TwintTransactionModel|null $twintTransaction
     */
    protected ?TwintTransactionModel $twintTransaction = null;

    /**
     * Specifics in case of WeChat Pay transaction
     *
     * @var WechatpayTransactionModel|null $wechatpayTransaction
     */
    protected ?WechatpayTransactionModel $wechatpayTransaction = null;

    /**
     * Specifics in case of MobilePay Subscriptions transaction
     *
     * @var MpsTransactionModel|null $mpsTransaction
     */
    protected ?MpsTransactionModel $mpsTransaction = null;

    /**
     * Specifics in case of Vipps Recurring transaction
     *
     * @var VippsRecurringTransactionModel|null $vippsRecurringTransaction
     */
    protected ?VippsRecurringTransactionModel $vippsRecurringTransaction = null;

    /**
     * Specifics in case of Offline transaction
     *
     * @var OfflineTransactionModel|null $offlineTransaction
     */
    protected ?OfflineTransactionModel $offlineTransaction = null;

    /**
     * Payment context describing if the transaction is customer or merchant initiated,
     * one of the following values: cit, mit, cit_cof
     *
     * @see PaymentContextEnum
     * @var string|null $paymentContext
     */
    protected ?string $paymentContext = null;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return DateTime|null
     */
    public function getSettled(): ?DateTime
    {
        return $this->settled;
    }

    /**
     * @return DateTime|null
     */
    public function getAuthorized(): ?DateTime
    {
        return $this->authorized;
    }

    /**
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
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
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @return AnydayTransactionModel|null
     */
    public function getAnydayTransaction(): ?AnydayTransactionModel
    {
        return $this->anydayTransaction;
    }

    /**
     * @return ApplePayTransactionModel|null
     */
    public function getApplepayTransaction(): ?ApplePayTransactionModel
    {
        return $this->applepayTransaction;
    }

    /**
     * @return BancomatpayTransactionModel|null
     */
    public function getBancomatpayTransaction(): ?BancomatpayTransactionModel
    {
        return $this->bancomatpayTransaction;
    }

    /**
     * @return BancontactTransactionModel|null
     */
    public function getBancontactTransaction(): ?BancontactTransactionModel
    {
        return $this->bancontactTransaction;
    }

    /**
     * @return BlikTransactionModel|null
     */
    public function getBlikTransaction(): ?BlikTransactionModel
    {
        return $this->blikTransaction;
    }

    /**
     * @return CardTransactionModel|null
     */
    public function getCardTransaction(): ?CardTransactionModel
    {
        return $this->cardTransaction;
    }

    /**
     * @return EpsTransactionModel|null
     */
    public function getEpsTransaction(): ?EpsTransactionModel
    {
        return $this->epsTransaction;
    }

    /**
     * @return EstoniaBanksTransactionModel|null
     */
    public function getEstoniaBanksTransaction(): ?EstoniaBanksTransactionModel
    {
        return $this->estoniaBanksTransaction;
    }

    /**
     * @return GooglePayTransactionModel|null
     */
    public function getGooglepayTransaction(): ?GooglePayTransactionModel
    {
        return $this->googlepayTransaction;
    }

    /**
     * @return IdealTransactionModel|null
     */
    public function getIdealTransaction(): ?IdealTransactionModel
    {
        return $this->idealTransaction;
    }

    /**
     * @return string
     */
    public function getInvoice(): string
    {
        return $this->invoice;
    }

    /**
     * @return KlarnaTransactionModel|null
     */
    public function getKlarnaTransaction(): ?KlarnaTransactionModel
    {
        return $this->klarnaTransaction;
    }

    /**
     * @return LatviaBanksTransactionModel|null
     */
    public function getLatviaBanksTransaction(): ?LatviaBanksTransactionModel
    {
        return $this->latviaBanksTransaction;
    }

    /**
     * @return LithuaniaBanksTransactionModel|null
     */
    public function getLithuaniaBanksTransaction(): ?LithuaniaBanksTransactionModel
    {
        return $this->lithuaniaBanksTransaction;
    }

    /**
     * @return ManualTransactionModel|null
     */
    public function getManualTransaction(): ?ManualTransactionModel
    {
        return $this->manualTransaction;
    }

    /**
     * @return MbwayTransactionModel|null
     */
    public function getMbwayTransaction(): ?MbwayTransactionModel
    {
        return $this->mbwayTransaction;
    }

    /**
     * @return MpoTransactionModel|null
     */
    public function getMpoTransaction(): ?MpoTransactionModel
    {
        return $this->mpoTransaction;
    }

    /**
     * @return MpsTransactionModel|null
     */
    public function getMpsTransaction(): ?MpsTransactionModel
    {
        return $this->mpsTransaction;
    }

    /**
     * @return MultibancoTransactionModel|null
     */
    public function getMultibancoTransaction(): ?MultibancoTransactionModel
    {
        return $this->multibancoTransaction;
    }

    /**
     * @return MybankTransactionModel|null
     */
    public function getMybankTransaction(): ?MybankTransactionModel
    {
        return $this->mybankTransaction;
    }

    /**
     * @return OfflineTransactionModel|null
     */
    public function getOfflineTransaction(): ?OfflineTransactionModel
    {
        return $this->offlineTransaction;
    }

    /**
     * @return P24TransactionModel|null
     */
    public function getP24Transaction(): ?P24TransactionModel
    {
        return $this->p24Transaction;
    }

    /**
     * @return PayconiqTransactionModel|null
     */
    public function getPayconiqTransaction(): ?PayconiqTransactionModel
    {
        return $this->payconiqTransaction;
    }

    /**
     * @return string|null
     */
    public function getPaymentContext(): ?string
    {
        return $this->paymentContext;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @return PaypalTransactionModel|null
     */
    public function getPaypalTransaction(): ?PaypalTransactionModel
    {
        return $this->paypalTransaction;
    }

    /**
     * @return PaysafecardTransactionModel|null
     */
    public function getPaysafecardTransaction(): ?PaysafecardTransactionModel
    {
        return $this->paysafecardTransaction;
    }

    /**
     * @return PayseraTransactionModel|null
     */
    public function getPayseraTransaction(): ?PayseraTransactionModel
    {
        return $this->payseraTransaction;
    }

    /**
     * @return PostfinanceTransactionModel|null
     */
    public function getPostfinanceTransaction(): ?PostfinanceTransactionModel
    {
        return $this->postfinanceTransaction;
    }

    /**
     * @return DateTime|null
     */
    public function getRefunded(): ?DateTime
    {
        return $this->refunded;
    }

    /**
     * @return ResursTransactionModel|null
     */
    public function getResursTransaction(): ?ResursTransactionModel
    {
        return $this->resursTransaction;
    }

    /**
     * @return SantanderTransactionModel|null
     */
    public function getSantanderTransaction(): ?SantanderTransactionModel
    {
        return $this->santanderTransaction;
    }

    /**
     * @return SatispayTransactionModel|null
     */
    public function getSatispayTransaction(): ?SatispayTransactionModel
    {
        return $this->satispayTransaction;
    }

    /**
     * @return SwishTransactionModel|null
     */
    public function getSwishTransaction(): ?SwishTransactionModel
    {
        return $this->swishTransaction;
    }

    /**
     * @return TrustlyTransactionModel|null
     */
    public function getTrustlyTransaction(): ?TrustlyTransactionModel
    {
        return $this->trustlyTransaction;
    }

    /**
     * @return TwintTransactionModel|null
     */
    public function getTwintTransaction(): ?TwintTransactionModel
    {
        return $this->twintTransaction;
    }

    /**
     * @return ViabillTransactionModel|null
     */
    public function getViabillTransaction(): ?ViabillTransactionModel
    {
        return $this->viabillTransaction;
    }

    /**
     * @return VippsRecurringTransactionModel|null
     */
    public function getVippsRecurringTransaction(): ?VippsRecurringTransactionModel
    {
        return $this->vippsRecurringTransaction;
    }

    /**
     * @return VippsTransactionModel|null
     */
    public function getVippsTransaction(): ?VippsTransactionModel
    {
        return $this->vippsTransaction;
    }

    /**
     * @return WechatpayTransactionModel|null
     */
    public function getWechatpayTransaction(): ?WechatpayTransactionModel
    {
        return $this->wechatpayTransaction;
    }

    /**
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
     * @param DateTime|null $settled
     *
     * @return self
     */
    public function setSettled(?DateTime $settled): self
    {
        $this->settled = $settled;

        return $this;
    }

    /**
     * @param DateTime|null $authorized
     *
     * @return self
     */
    public function setAuthorized(?DateTime $authorized): self
    {
        $this->authorized = $authorized;

        return $this;
    }

    /**
     * @param DateTime|null $failed
     *
     * @return self
     */
    public function setFailed(?DateTime $failed): self
    {
        $this->failed = $failed;

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
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

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
     * @param int $amount
     *
     * @return self
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

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
     * @param string $paymentType
     *
     * @return self
     */
    public function setPaymentType(string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * @param AnydayTransactionModel|null $anydayTransaction
     *
     * @return self
     */
    public function setAnydayTransaction(?AnydayTransactionModel $anydayTransaction): self
    {
        $this->anydayTransaction = $anydayTransaction;

        return $this;
    }

    /**
     * @param ApplePayTransactionModel|null $applepayTransaction
     *
     * @return self
     */
    public function setApplepayTransaction(?ApplePayTransactionModel $applepayTransaction): self
    {
        $this->applepayTransaction = $applepayTransaction;

        return $this;
    }

    /**
     * @param BancomatpayTransactionModel|null $bancomatpayTransaction
     *
     * @return self
     */
    public function setBancomatpayTransaction(?BancomatpayTransactionModel $bancomatpayTransaction): self
    {
        $this->bancomatpayTransaction = $bancomatpayTransaction;

        return $this;
    }

    /**
     * @param BancontactTransactionModel|null $bancontactTransaction
     *
     * @return self
     */
    public function setBancontactTransaction(?BancontactTransactionModel $bancontactTransaction): self
    {
        $this->bancontactTransaction = $bancontactTransaction;

        return $this;
    }

    /**
     * @param BlikTransactionModel|null $blikTransaction
     *
     * @return self
     */
    public function setBlikTransaction(?BlikTransactionModel $blikTransaction): self
    {
        $this->blikTransaction = $blikTransaction;

        return $this;
    }

    /**
     * @param CardTransactionModel|null $cardTransaction
     *
     * @return self
     */
    public function setCardTransaction(?CardTransactionModel $cardTransaction): self
    {
        $this->cardTransaction = $cardTransaction;

        return $this;
    }

    /**
     * @param EpsTransactionModel|null $epsTransaction
     *
     * @return self
     */
    public function setEpsTransaction(?EpsTransactionModel $epsTransaction): self
    {
        $this->epsTransaction = $epsTransaction;

        return $this;
    }

    /**
     * @param EstoniaBanksTransactionModel|null $estoniaBanksTransaction
     *
     * @return self
     */
    public function setEstoniaBanksTransaction(?EstoniaBanksTransactionModel $estoniaBanksTransaction): self
    {
        $this->estoniaBanksTransaction = $estoniaBanksTransaction;

        return $this;
    }

    /**
     * @param GooglePayTransactionModel|null $googlepayTransaction
     *
     * @return self
     */
    public function setGooglepayTransaction(?GooglePayTransactionModel $googlepayTransaction): self
    {
        $this->googlepayTransaction = $googlepayTransaction;

        return $this;
    }

    /**
     * @param IdealTransactionModel|null $idealTransaction
     *
     * @return self
     */
    public function setIdealTransaction(?IdealTransactionModel $idealTransaction): self
    {
        $this->idealTransaction = $idealTransaction;

        return $this;
    }

    /**
     * @param string $invoice
     *
     * @return self
     */
    public function setInvoice(string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @param KlarnaTransactionModel|null $klarnaTransaction
     *
     * @return self
     */
    public function setKlarnaTransaction(?KlarnaTransactionModel $klarnaTransaction): self
    {
        $this->klarnaTransaction = $klarnaTransaction;

        return $this;
    }

    /**
     * @param LatviaBanksTransactionModel|null $latviaBanksTransaction
     *
     * @return self
     */
    public function setLatviaBanksTransaction(?LatviaBanksTransactionModel $latviaBanksTransaction): self
    {
        $this->latviaBanksTransaction = $latviaBanksTransaction;

        return $this;
    }

    /**
     * @param LithuaniaBanksTransactionModel|null $lithuaniaBanksTransaction
     *
     * @return self
     */
    public function setLithuaniaBanksTransaction(?LithuaniaBanksTransactionModel $lithuaniaBanksTransaction): self
    {
        $this->lithuaniaBanksTransaction = $lithuaniaBanksTransaction;

        return $this;
    }

    /**
     * @param ManualTransactionModel|null $manualTransaction
     *
     * @return self
     */
    public function setManualTransaction(?ManualTransactionModel $manualTransaction): self
    {
        $this->manualTransaction = $manualTransaction;

        return $this;
    }

    /**
     * @param MbwayTransactionModel|null $mbwayTransaction
     *
     * @return self
     */
    public function setMbwayTransaction(?MbwayTransactionModel $mbwayTransaction): self
    {
        $this->mbwayTransaction = $mbwayTransaction;

        return $this;
    }

    /**
     * @param MpoTransactionModel|null $mpoTransaction
     *
     * @return self
     */
    public function setMpoTransaction(?MpoTransactionModel $mpoTransaction): self
    {
        $this->mpoTransaction = $mpoTransaction;

        return $this;
    }

    /**
     * @param MpsTransactionModel|null $mpsTransaction
     *
     * @return self
     */
    public function setMpsTransaction(?MpsTransactionModel $mpsTransaction): self
    {
        $this->mpsTransaction = $mpsTransaction;

        return $this;
    }

    /**
     * @param MultibancoTransactionModel|null $multibancoTransaction
     *
     * @return self
     */
    public function setMultibancoTransaction(?MultibancoTransactionModel $multibancoTransaction): self
    {
        $this->multibancoTransaction = $multibancoTransaction;

        return $this;
    }

    /**
     * @param MybankTransactionModel|null $mybankTransaction
     *
     * @return self
     */
    public function setMybankTransaction(?MybankTransactionModel $mybankTransaction): self
    {
        $this->mybankTransaction = $mybankTransaction;

        return $this;
    }

    /**
     * @param OfflineTransactionModel|null $offlineTransaction
     *
     * @return self
     */
    public function setOfflineTransaction(?OfflineTransactionModel $offlineTransaction): self
    {
        $this->offlineTransaction = $offlineTransaction;

        return $this;
    }

    /**
     * @param P24TransactionModel|null $p24Transaction
     *
     * @return self
     */
    public function setP24Transaction(?P24TransactionModel $p24Transaction): self
    {
        $this->p24Transaction = $p24Transaction;

        return $this;
    }

    /**
     * @param PayconiqTransactionModel|null $payconiqTransaction
     *
     * @return self
     */
    public function setPayconiqTransaction(?PayconiqTransactionModel $payconiqTransaction): self
    {
        $this->payconiqTransaction = $payconiqTransaction;

        return $this;
    }

    /**
     * @param string|null $paymentContext
     *
     * @return self
     */
    public function setPaymentContext(?string $paymentContext): self
    {
        $this->paymentContext = $paymentContext;

        return $this;
    }

    /**
     * @param string|null $paymentMethod
     *
     * @return self
     */
    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @param PaypalTransactionModel|null $paypalTransaction
     *
     * @return self
     */
    public function setPaypalTransaction(?PaypalTransactionModel $paypalTransaction): self
    {
        $this->paypalTransaction = $paypalTransaction;

        return $this;
    }

    /**
     * @param PaysafecardTransactionModel|null $paysafecardTransaction
     *
     * @return self
     */
    public function setPaysafecardTransaction(?PaysafecardTransactionModel $paysafecardTransaction): self
    {
        $this->paysafecardTransaction = $paysafecardTransaction;

        return $this;
    }

    /**
     * @param PayseraTransactionModel|null $payseraTransaction
     *
     * @return self
     */
    public function setPayseraTransaction(?PayseraTransactionModel $payseraTransaction): self
    {
        $this->payseraTransaction = $payseraTransaction;

        return $this;
    }

    /**
     * @param PostfinanceTransactionModel|null $postfinanceTransaction
     *
     * @return self
     */
    public function setPostfinanceTransaction(?PostfinanceTransactionModel $postfinanceTransaction): self
    {
        $this->postfinanceTransaction = $postfinanceTransaction;

        return $this;
    }

    /**
     * @param DateTime|null $refunded
     *
     * @return self
     */
    public function setRefunded(?DateTime $refunded): self
    {
        $this->refunded = $refunded;

        return $this;
    }

    /**
     * @param ResursTransactionModel|null $resursTransaction
     *
     * @return self
     */
    public function setResursTransaction(?ResursTransactionModel $resursTransaction): self
    {
        $this->resursTransaction = $resursTransaction;

        return $this;
    }

    /**
     * @param SantanderTransactionModel|null $santanderTransaction
     *
     * @return self
     */
    public function setSantanderTransaction(?SantanderTransactionModel $santanderTransaction): self
    {
        $this->santanderTransaction = $santanderTransaction;

        return $this;
    }

    /**
     * @param SatispayTransactionModel|null $satispayTransaction
     *
     * @return self
     */
    public function setSatispayTransaction(?SatispayTransactionModel $satispayTransaction): self
    {
        $this->satispayTransaction = $satispayTransaction;

        return $this;
    }

    /**
     * @param SwishTransactionModel|null $swishTransaction
     *
     * @return self
     */
    public function setSwishTransaction(?SwishTransactionModel $swishTransaction): self
    {
        $this->swishTransaction = $swishTransaction;

        return $this;
    }

    /**
     * @param TrustlyTransactionModel|null $trustlyTransaction
     *
     * @return self
     */
    public function setTrustlyTransaction(?TrustlyTransactionModel $trustlyTransaction): self
    {
        $this->trustlyTransaction = $trustlyTransaction;

        return $this;
    }

    /**
     * @param TwintTransactionModel|null $twintTransaction
     *
     * @return self
     */
    public function setTwintTransaction(?TwintTransactionModel $twintTransaction): self
    {
        $this->twintTransaction = $twintTransaction;

        return $this;
    }

    /**
     * @param ViabillTransactionModel|null $viabillTransaction
     *
     * @return self
     */
    public function setViabillTransaction(?ViabillTransactionModel $viabillTransaction): self
    {
        $this->viabillTransaction = $viabillTransaction;

        return $this;
    }

    /**
     * @param VippsRecurringTransactionModel|null $vippsRecurringTransaction
     *
     * @return self
     */
    public function setVippsRecurringTransaction(?VippsRecurringTransactionModel $vippsRecurringTransaction): self
    {
        $this->vippsRecurringTransaction = $vippsRecurringTransaction;

        return $this;
    }

    /**
     * @param VippsTransactionModel|null $vippsTransaction
     *
     * @return self
     */
    public function setVippsTransaction(?VippsTransactionModel $vippsTransaction): self
    {
        $this->vippsTransaction = $vippsTransaction;

        return $this;
    }

    /**
     * @param WechatpayTransactionModel|null $wechatpayTransaction
     *
     * @return self
     */
    public function setWechatpayTransaction(?WechatpayTransactionModel $wechatpayTransaction): self
    {
        $this->wechatpayTransaction = $wechatpayTransaction;

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

        $model->setId($response['id']);

        if (in_array($response['state'], TransactionStateEnum::getAll(), true)) {
            $model->setState($response['state']);
        }

        $model->setInvoice($response['invoice']);

        if (in_array($response['type'], TransactionTypeEnum::getAll(), true)) {
            $model->setType($response['type']);
        }

        $model->setAmount($response['amount']);

        if (isset($response['currency'])) {
            $model->setCurrency($response['currency']);
        }

        if (isset($response['settled'])) {
            $model->setSettled(new DateTime($response['settled']));
        }

        if (isset($response['authorized'])) {
            $model->setAuthorized(new DateTime($response['authorized']));
        }

        if (isset($response['failed'])) {
            $model->setFailed(new DateTime($response['failed']));
        }

        if (isset($response['refunded'])) {
            $model->setRefunded(new DateTime($response['refunded']));
        }

        $model->setCreated(new DateTime($response['created']));

        if (in_array($response['payment_type'], TransactionPaymentTypeEnum::getAll(), true)) {
            $model->setPaymentType($response['payment_type']);
        }

        if (isset($response['payment_method'])) {
            $model->setPaymentMethod($response['payment_method']);
        }

        if (isset($response['card_transaction'])) {
            $model->setCardTransaction(CardTransactionModel::fromArray($response['card_transaction']));
        }

        if (isset($response['mpo_transaction'])) {
            $model->setMpoTransaction(MpoTransactionModel::fromArray($response['mpo_transaction']));
        }

        if (isset($response['vipps_transaction'])) {
            $model->setVippsTransaction(VippsTransactionModel::fromArray($response['vipps_transaction']));
        }

        if (isset($response['applepay_transaction'])) {
            $model->setApplepayTransaction(ApplePayTransactionModel::fromArray($response['applepay_transaction']));
        }

        if (isset($response['googlepay_transaction'])) {
            $model->setGooglepayTransaction(GooglePayTransactionModel::fromArray($response['googlepay_transaction']));
        }

        if (isset($response['manual_transaction'])) {
            $model->setManualTransaction(ManualTransactionModel::fromArray($response['manual_transaction']));
        }

        if (isset($response['viabill_transaction'])) {
            $model->setViabillTransaction(ViabillTransactionModel::fromArray($response['viabill_transaction']));
        }

        if (isset($response['anyday_transaction'])) {
            $model->setAnydayTransaction(AnydayTransactionModel::fromArray($response['anyday_transaction']));
        }

        if (isset($response['santander_transaction'])) {
            $model->setSantanderTransaction(SantanderTransactionModel::fromArray($response['santander_transaction']));
        }

        if (isset($response['resurs_transaction'])) {
            $model->setResursTransaction(ResursTransactionModel::fromArray($response['resurs_transaction']));
        }

        if (isset($response['klarna_transaction'])) {
            $model->setKlarnaTransaction(KlarnaTransactionModel::fromArray($response['klarna_transaction']));
        }

        if (isset($response['swish_transaction'])) {
            $model->setSwishTransaction(SwishTransactionModel::fromArray($response['swish_transaction']));
        }

        if (isset($response['paypal_transaction'])) {
            $model->setPaypalTransaction(PaypalTransactionModel::fromArray($response['paypal_transaction']));
        }

        if (isset($response['bancomatpay_transaction'])) {
            $model->setBancomatpayTransaction(
                BancomatpayTransactionModel::fromArray($response['bancomatpay_transaction'])
            );
        }

        if (isset($response['bancontact_transaction'])) {
            $model->setBancontactTransaction(
                BancontactTransactionModel::fromArray($response['bancontact_transaction'])
            );
        }

        if (isset($response['blik_transaction'])) {
            $model->setBlikTransaction(BlikTransactionModel::fromArray($response['blik_transaction']));
        }

        if (isset($response['ideal_transaction'])) {
            $model->setIdealTransaction(IdealTransactionModel::fromArray($response['ideal_transaction']));
        }

        if (isset($response['p24_transaction'])) {
            $model->setP24Transaction(P24TransactionModel::fromArray($response['p24_transaction']));
        }

        if (isset($response['trustly_transaction'])) {
            $model->setTrustlyTransaction(TrustlyTransactionModel::fromArray($response['trustly_transaction']));
        }

        if (isset($response['eps_transaction'])) {
            $model->setEpsTransaction(EpsTransactionModel::fromArray($response['eps_transaction']));
        }

        if (isset($response['estonia_banks_transaction'])) {
            $model->setEstoniaBanksTransaction(
                EstoniaBanksTransactionModel::fromArray($response['estonia_banks_transaction'])
            );
        }

        if (isset($response['latvia_banks_transaction'])) {
            $model->setLatviaBanksTransaction(
                LatviaBanksTransactionModel::fromArray($response['latvia_banks_transaction'])
            );
        }

        if (isset($response['lithuania_banks_transaction'])) {
            $model->setLithuaniaBanksTransaction(
                LithuaniaBanksTransactionModel::fromArray($response['lithuania_banks_transaction'])
            );
        }

        if (isset($response['mbway_transaction'])) {
            $model->setMbwayTransaction(MbwayTransactionModel::fromArray($response['mbway_transaction']));
        }

        if (isset($response['multibanco_transaction'])) {
            $model->setMultibancoTransaction(
                MultibancoTransactionModel::fromArray($response['multibanco_transaction'])
            );
        }

        if (isset($response['mybank_transaction'])) {
            $model->setMybankTransaction(MybankTransactionModel::fromArray($response['mybank_transaction']));
        }

        if (isset($response['payconiq_transaction'])) {
            $model->setPayconiqTransaction(PayconiqTransactionModel::fromArray($response['payconiq_transaction']));
        }

        if (isset($response['paysafecard_transaction'])) {
            $model->setPaysafecardTransaction(
                PaysafecardTransactionModel::fromArray($response['paysafecard_transaction'])
            );
        }

        if (isset($response['paysera_transaction'])) {
            $model->setPayseraTransaction(
                PayseraTransactionModel::fromArray($response['paysera_transaction'])
            );
        }

        if (isset($response['postfinance_transaction'])) {
            $model->setPostfinanceTransaction(
                PostfinanceTransactionModel::fromArray($response['postfinance_transaction'])
            );
        }

        if (isset($response['satispay_transaction'])) {
            $model->setSatispayTransaction(SatispayTransactionModel::fromArray($response['satispay_transaction']));
        }

        if (isset($response['twint_transaction'])) {
            $model->setTwintTransaction(TwintTransactionModel::fromArray($response['twint_transaction']));
        }

        if (isset($response['wechatpay_transaction'])) {
            $model->setWechatpayTransaction(WechatpayTransactionModel::fromArray($response['wechatpay_transaction']));
        }

        if (isset($response['mps_transaction'])) {
            $model->setMpsTransaction(MpsTransactionModel::fromArray($response['mps_transaction']));
        }

        if (isset($response['vipps_recurring_transaction'])) {
            $model->setVippsRecurringTransaction(
                VippsRecurringTransactionModel::fromArray($response['vipps_recurring_transaction'])
            );
        }

        if (isset($response['offline_transaction'])) {
            $model->setOfflineTransaction(
                OfflineTransactionModel::fromArray($response['offline_transaction'])
            );
        }

        if (isset($response['payment_context'])
            && in_array($response['payment_context'], PaymentContextEnum::getAll(), true)) {
            $model->setPaymentContext($response['payment_context']);
        }

        return $model;
    }
}
