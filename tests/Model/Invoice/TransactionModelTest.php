<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\PaymentContextEnum;
use Billwerk\Sdk\Enum\TransactionPaymentTypeEnum;
use Billwerk\Sdk\Enum\TransactionStateEnum;
use Billwerk\Sdk\Enum\TransactionTypeEnum;
use Billwerk\Sdk\Model\Invoice\AnydayTransactionModel;
use Billwerk\Sdk\Model\Invoice\ApplePayTransactionModel;
use Billwerk\Sdk\Model\Invoice\BancomatpayTransactionModel;
use Billwerk\Sdk\Model\Invoice\BancontactTransactionModel;
use Billwerk\Sdk\Model\Invoice\BlikTransactionModel;
use Billwerk\Sdk\Model\Invoice\CardTransactionModel;
use Billwerk\Sdk\Model\Invoice\EpsTransactionModel;
use Billwerk\Sdk\Model\Invoice\EstoniaBanksTransactionModel;
use Billwerk\Sdk\Model\Invoice\GooglePayTransactionModel;
use Billwerk\Sdk\Model\Invoice\IdealTransactionModel;
use Billwerk\Sdk\Model\Invoice\KlarnaTransactionModel;
use Billwerk\Sdk\Model\Invoice\LatviaBanksTransactionModel;
use Billwerk\Sdk\Model\Invoice\LithuaniaBanksTransactionModel;
use Billwerk\Sdk\Model\Invoice\ManualTransactionModel;
use Billwerk\Sdk\Model\Invoice\MbwayTransactionModel;
use Billwerk\Sdk\Model\Invoice\MpoTransactionModel;
use Billwerk\Sdk\Model\Invoice\MpsTransactionModel;
use Billwerk\Sdk\Model\Invoice\MultibancoTransactionModel;
use Billwerk\Sdk\Model\Invoice\MybankTransactionModel;
use Billwerk\Sdk\Model\Invoice\OfflineTransactionModel;
use Billwerk\Sdk\Model\Invoice\P24TransactionModel;
use Billwerk\Sdk\Model\Invoice\PayconiqTransactionModel;
use Billwerk\Sdk\Model\Invoice\PaypalTransactionModel;
use Billwerk\Sdk\Model\Invoice\PaysafecardTransactionModel;
use Billwerk\Sdk\Model\Invoice\PayseraTransactionModel;
use Billwerk\Sdk\Model\Invoice\PostfinanceTransactionModel;
use Billwerk\Sdk\Model\Invoice\ResursTransactionModel;
use Billwerk\Sdk\Model\Invoice\SantanderTransactionModel;
use Billwerk\Sdk\Model\Invoice\SatispayTransactionModel;
use Billwerk\Sdk\Model\Invoice\SwishTransactionModel;
use Billwerk\Sdk\Model\Invoice\TransactionModel;
use Billwerk\Sdk\Model\Invoice\TrustlyTransactionModel;
use Billwerk\Sdk\Model\Invoice\TwintTransactionModel;
use Billwerk\Sdk\Model\Invoice\ViabillTransactionModel;
use Billwerk\Sdk\Model\Invoice\VippsTransactionModel;
use Billwerk\Sdk\Model\Invoice\WechatpayTransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class TransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(TransactionModel::getClassName());
        $model = TransactionModel::fromArray($json);
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(TransactionStateEnum::SETTLED, $model->getState());
        $this::assertSame('order-1234', $model->getInvoice());
        $this::assertSame(TransactionTypeEnum::SETTLE, $model->getType());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame(null, $model->getCurrency());
        $this::assertEquals(null, $model->getSettled());
        $this::assertEquals(null, $model->getAuthorized());
        $this::assertEquals(null, $model->getFailed());
        $this::assertEquals(null, $model->getRefunded());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(TransactionPaymentTypeEnum::CARD, $model->getPaymentType());
        $this::assertSame(null, $model->getPaymentMethod());
        $this::assertSame(null, $model->getCardTransaction());
        $this::assertSame(null, $model->getMpoTransaction());
        $this::assertSame(null, $model->getVippsTransaction());
        $this::assertSame(null, $model->getApplepayTransaction());
        $this::assertSame(null, $model->getGooglepayTransaction());
        $this::assertSame(null, $model->getManualTransaction());
        $this::assertSame(null, $model->getViabillTransaction());
        $this::assertSame(null, $model->getAnydayTransaction());
        $this::assertSame(null, $model->getSantanderTransaction());
        $this::assertSame(null, $model->getResursTransaction());
        $this::assertSame(null, $model->getKlarnaTransaction());
        $this::assertSame(null, $model->getSwishTransaction());
        $this::assertSame(null, $model->getPaypalTransaction());
        $this::assertSame(null, $model->getBancomatpayTransaction());
        $this::assertSame(null, $model->getBancontactTransaction());
        $this::assertSame(null, $model->getBlikTransaction());
        $this::assertSame(null, $model->getIdealTransaction());
        $this::assertSame(null, $model->getP24Transaction());
        $this::assertSame(null, $model->getTrustlyTransaction());
        $this::assertSame(null, $model->getEpsTransaction());
        $this::assertSame(null, $model->getEstoniaBanksTransaction());
        $this::assertSame(null, $model->getLatviaBanksTransaction());
        $this::assertSame(null, $model->getLithuaniaBanksTransaction());
        $this::assertSame(null, $model->getMbwayTransaction());
        $this::assertSame(null, $model->getMultibancoTransaction());
        $this::assertSame(null, $model->getMybankTransaction());
        $this::assertSame(null, $model->getPayconiqTransaction());
        $this::assertSame(null, $model->getPaysafecardTransaction());
        $this::assertSame(null, $model->getPayseraTransaction());
        $this::assertSame(null, $model->getPostfinanceTransaction());
        $this::assertSame(null, $model->getSatispayTransaction());
        $this::assertSame(null, $model->getTwintTransaction());
        $this::assertSame(null, $model->getWechatpayTransaction());
        $this::assertSame(null, $model->getMpsTransaction());
        $this::assertSame(null, $model->getVippsTransaction());
        $this::assertSame(null, $model->getOfflineTransaction());
        $this::assertSame(null, $model->getPaymentContext());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(TransactionModel::getClassName());
        $model = TransactionModel::fromArray($json);
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(TransactionStateEnum::SETTLED, $model->getState());
        $this::assertSame('order-1234', $model->getInvoice());
        $this::assertSame(TransactionTypeEnum::SETTLE, $model->getType());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getSettled());
        $this::assertEquals(new DateTime('2024-05-16T22:41:12.921Z'), $model->getAuthorized());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getRefunded());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(TransactionPaymentTypeEnum::CARD, $model->getPaymentType());
        $this::assertSame('sr_4f3b975246e6acb7f569297d67830d64', $model->getPaymentMethod());
        $this::assertInstanceOf(CardTransactionModel::class, $model->getCardTransaction());
        $this::assertInstanceOf(MpoTransactionModel::class, $model->getMpoTransaction());
        $this::assertInstanceOf(VippsTransactionModel::class, $model->getVippsTransaction());
        $this::assertInstanceOf(ApplePayTransactionModel::class, $model->getApplepayTransaction());
        $this::assertInstanceOf(GooglePayTransactionModel::class, $model->getGooglepayTransaction());
        $this::assertInstanceOf(ManualTransactionModel::class, $model->getManualTransaction());
        $this::assertInstanceOf(ViabillTransactionModel::class, $model->getViabillTransaction());
        $this::assertInstanceOf(AnydayTransactionModel::class, $model->getAnydayTransaction());
        $this::assertInstanceOf(SantanderTransactionModel::class, $model->getSantanderTransaction());
        $this::assertInstanceOf(ResursTransactionModel::class, $model->getResursTransaction());
        $this::assertInstanceOf(KlarnaTransactionModel::class, $model->getKlarnaTransaction());
        $this::assertInstanceOf(SwishTransactionModel::class, $model->getSwishTransaction());
        $this::assertInstanceOf(PaypalTransactionModel::class, $model->getPaypalTransaction());
        $this::assertInstanceOf(BancomatpayTransactionModel::class, $model->getBancomatpayTransaction());
        $this::assertInstanceOf(BancontactTransactionModel::class, $model->getBancontactTransaction());
        $this::assertInstanceOf(BlikTransactionModel::class, $model->getBlikTransaction());
        $this::assertInstanceOf(IdealTransactionModel::class, $model->getIdealTransaction());
        $this::assertInstanceOf(P24TransactionModel::class, $model->getP24Transaction());
        $this::assertInstanceOf(TrustlyTransactionModel::class, $model->getTrustlyTransaction());
        $this::assertInstanceOf(EpsTransactionModel::class, $model->getEpsTransaction());
        $this::assertInstanceOf(EstoniaBanksTransactionModel::class, $model->getEstoniaBanksTransaction());
        $this::assertInstanceOf(LatviaBanksTransactionModel::class, $model->getLatviaBanksTransaction());
        $this::assertInstanceOf(LithuaniaBanksTransactionModel::class, $model->getLithuaniaBanksTransaction());
        $this::assertInstanceOf(MbwayTransactionModel::class, $model->getMbwayTransaction());
        $this::assertInstanceOf(MultibancoTransactionModel::class, $model->getMultibancoTransaction());
        $this::assertInstanceOf(MybankTransactionModel::class, $model->getMybankTransaction());
        $this::assertInstanceOf(PayconiqTransactionModel::class, $model->getPayconiqTransaction());
        $this::assertInstanceOf(PaysafecardTransactionModel::class, $model->getPaysafecardTransaction());
        $this::assertInstanceOf(PayseraTransactionModel::class, $model->getPayseraTransaction());
        $this::assertInstanceOf(PostfinanceTransactionModel::class, $model->getPostfinanceTransaction());
        $this::assertInstanceOf(SatispayTransactionModel::class, $model->getSatispayTransaction());
        $this::assertInstanceOf(TwintTransactionModel::class, $model->getTwintTransaction());
        $this::assertInstanceOf(WechatpayTransactionModel::class, $model->getWechatpayTransaction());
        $this::assertInstanceOf(MpsTransactionModel::class, $model->getMpsTransaction());
        $this::assertInstanceOf(VippsTransactionModel::class, $model->getVippsTransaction());
        $this::assertInstanceOf(OfflineTransactionModel::class, $model->getOfflineTransaction());
        $this::assertSame(PaymentContextEnum::CIT, $model->getPaymentContext());
    }
}
