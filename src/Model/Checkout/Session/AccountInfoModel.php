<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Enum\AgeIndicatorEnum;
use Billwerk\Sdk\Enum\CardAgeIndicatorEnum;
use Billwerk\Sdk\Enum\ChangeIndicatorEnum;
use Billwerk\Sdk\Enum\PasswordChangeIndicatorEnum;
use Billwerk\Sdk\Enum\ShippingAddressUsageIndicatorEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class AccountInfoModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Date that the cardholder created the account. Format: yyyy-MM-dd
     *
     * @var string|null $created
     */
    protected ?string $created = null;

    /**
     * Date that the cardholder’s account was last changed, including Billing or Shipping address,
     * new payment method, or new user(s) added. Format: yyyy-MM-dd
     *
     * @var string|null $changed
     */
    protected ?string $changed = null;

    /**
     * Length of time that the cardholder has had the account. One off: guest_account - No account
     * (guest check-out), this_transaction - Created during this transaction, less_than_30_days
     * - Less than 30 days, from_30_to_60_days - 30−60 days, more_than_60_days - More than 60 days
     *
     * @see AgeIndicatorEnum
     * @var string|null $ageIndicator
     */
    protected ?string $ageIndicator = null;

    /**
     * Length of time since the cardholder’s account information was last changed, including Billing or
     * Shipping address, new payment account, or new user(s) added. One off: this_transaction - Changed
     * during this transaction, less_than_30_days - Less than 30 days, from_30_to_60_days - 30−60 days,
     * more_than_60_days - More than 60 days
     *
     * @see ChangeIndicatorEnum
     * @var string|null $changeIndicator
     */
    protected ?string $changeIndicator = null;

    /**
     * Date that cardholder’s account had a password change or account reset. Format: yyyy-MM-dd
     *
     * @var string|null $passwordChange
     */
    protected ?string $passwordChange = null;

    /**
     * Indicates the length of time since the cardholder’s account had a password change or account reset.
     * One off: no_change - No change, this_transaction - Changed during this transaction,
     * less_than_30_days - Less than 30 days, from_30_to_60_days - 30−60 days, more_than_60_days - More than 60 days
     *
     * @see PasswordChangeIndicatorEnum
     * @var string|null $passwordChangeIndicator
     */
    protected ?string $passwordChangeIndicator = null;

    /**
     * Number of purchases with this cardholder account during the previous six months
     *
     * @var int|null $purchaseCount
     */
    protected ?int $purchaseCount = null;

    /**
     * Number of Add Card attempts in the last 24 hours
     *
     * @var int|null $addCardAttempts
     */
    protected ?int $addCardAttempts = null;

    /**
     * Number of transactions (successful and abandoned) for this cardholder account (across payment methods)
     * in the previous 24 hours
     *
     * @var int|null $transactionsDay
     */
    protected ?int $transactionsDay = null;

    /**
     * Number of transactions (successful and abandoned) for this cardholder account (across payment methods)
     * in the previous year
     *
     * @var int|null $transactionsYear
     */
    protected ?int $transactionsYear = null;

    /**
     * For customer initiated card-on-file session, the date that the used card was added. Provided by Reepay
     * but can be overridden. Format: yyyy-MM-dd
     *
     * @var string|null $cardAge
     */
    protected ?string $cardAge = null;

    /**
     * For customer initiated card-on-file session, indicates the length of time that the card was enrolled in
     * the cardholder’s account. Provided by Reepay but can be overridden. One off: this_transaction - Changed
     * during this transaction, less_than_30_days - Less than 30 days, from_30_to_60_days - 30−60 days,
     * more_than_60_days - More than 60 days
     *
     * @see CardAgeIndicatorEnum
     * @var string|null $cardAgeIndicator
     */
    protected ?string $cardAgeIndicator = null;

    /**
     * Date when the shipping address used for this transaction was first used. Format: yyyy-MM-dd
     *
     * @var string|null $shippingAddressUsage
     */
    protected ?string $shippingAddressUsage = null;

    /**
     * Indicates when the shipping address used for this transaction was first used. One off:
     * this_transaction - During this transaction, less_than_30_days - Less than 30 days,
     * from_30_to_60_days - 30−60 days, more_than_60_days - More than 60 days
     *
     * @see ShippingAddressUsageIndicatorEnum
     * @var string|null $shippingAddressUsageIndicator
     */
    protected ?string $shippingAddressUsageIndicator = null;

    /**
     * Indicates if the Cardholder Name on the account is identical to the shipping Name used for this transaction
     *
     * @var bool|null $shippingNameIndicator
     */
    protected ?bool $shippingNameIndicator = null;

    /**
     * Indicates if there has been experienced suspicious activity (including previous fraud) on the cardholder account
     *
     * @var bool|null $suspiciousActivity
     */
    protected ?bool $suspiciousActivity = null;

    /**
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @return int|null
     */
    public function getAddCardAttempts(): ?int
    {
        return $this->addCardAttempts;
    }

    /**
     * @return string|null
     */
    public function getAgeIndicator(): ?string
    {
        return $this->ageIndicator;
    }

    /**
     * @return string|null
     */
    public function getCardAge(): ?string
    {
        return $this->cardAge;
    }

    /**
     * @return string|null
     */
    public function getCardAgeIndicator(): ?string
    {
        return $this->cardAgeIndicator;
    }

    /**
     * @return string|null
     */
    public function getChanged(): ?string
    {
        return $this->changed;
    }

    /**
     * @return string|null
     */
    public function getChangeIndicator(): ?string
    {
        return $this->changeIndicator;
    }

    /**
     * @return string|null
     */
    public function getPasswordChange(): ?string
    {
        return $this->passwordChange;
    }

    /**
     * @return string|null
     */
    public function getPasswordChangeIndicator(): ?string
    {
        return $this->passwordChangeIndicator;
    }

    /**
     * @return int|null
     */
    public function getPurchaseCount(): ?int
    {
        return $this->purchaseCount;
    }

    /**
     * @return string|null
     */
    public function getShippingAddressUsage(): ?string
    {
        return $this->shippingAddressUsage;
    }

    /**
     * @return string|null
     */
    public function getShippingAddressUsageIndicator(): ?string
    {
        return $this->shippingAddressUsageIndicator;
    }

    /**
     * @return bool|null
     */
    public function getShippingNameIndicator(): ?bool
    {
        return $this->shippingNameIndicator;
    }

    /**
     * @return bool|null
     */
    public function getSuspiciousActivity(): ?bool
    {
        return $this->suspiciousActivity;
    }

    /**
     * @return int|null
     */
    public function getTransactionsDay(): ?int
    {
        return $this->transactionsDay;
    }

    /**
     * @return int|null
     */
    public function getTransactionsYear(): ?int
    {
        return $this->transactionsYear;
    }

    /**
     * @param string|null $created
     *
     * @return self
     */
    public function setCreated(?string $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @param int|null $addCardAttempts
     *
     * @return self
     */
    public function setAddCardAttempts(?int $addCardAttempts): self
    {
        $this->addCardAttempts = $addCardAttempts;

        return $this;
    }

    /**
     * @param string|null $ageIndicator
     *
     * @return self
     */
    public function setAgeIndicator(?string $ageIndicator): self
    {
        $this->ageIndicator = $ageIndicator;

        return $this;
    }

    /**
     * @param string|null $cardAge
     *
     * @return self
     */
    public function setCardAge(?string $cardAge): self
    {
        $this->cardAge = $cardAge;

        return $this;
    }

    /**
     * @param string|null $cardAgeIndicator
     *
     * @return self
     */
    public function setCardAgeIndicator(?string $cardAgeIndicator): self
    {
        $this->cardAgeIndicator = $cardAgeIndicator;

        return $this;
    }

    /**
     * @param string|null $changed
     *
     * @return self
     */
    public function setChanged(?string $changed): self
    {
        $this->changed = $changed;

        return $this;
    }

    /**
     * @param string|null $changeIndicator
     *
     * @return self
     */
    public function setChangeIndicator(?string $changeIndicator): self
    {
        $this->changeIndicator = $changeIndicator;

        return $this;
    }

    /**
     * @param string|null $passwordChange
     *
     * @return self
     */
    public function setPasswordChange(?string $passwordChange): self
    {
        $this->passwordChange = $passwordChange;

        return $this;
    }

    /**
     * @param string|null $passwordChangeIndicator
     *
     * @return self
     */
    public function setPasswordChangeIndicator(?string $passwordChangeIndicator): self
    {
        $this->passwordChangeIndicator = $passwordChangeIndicator;

        return $this;
    }

    /**
     * @param int|null $purchaseCount
     *
     * @return self
     */
    public function setPurchaseCount(?int $purchaseCount): self
    {
        $this->purchaseCount = $purchaseCount;

        return $this;
    }

    /**
     * @param string|null $shippingAddressUsage
     *
     * @return self
     */
    public function setShippingAddressUsage(?string $shippingAddressUsage): self
    {
        $this->shippingAddressUsage = $shippingAddressUsage;

        return $this;
    }

    /**
     * @param string|null $shippingAddressUsageIndicator
     *
     * @return self
     */
    public function setShippingAddressUsageIndicator(?string $shippingAddressUsageIndicator): self
    {
        $this->shippingAddressUsageIndicator = $shippingAddressUsageIndicator;

        return $this;
    }

    /**
     * @param bool|null $shippingNameIndicator
     *
     * @return self
     */
    public function setShippingNameIndicator(?bool $shippingNameIndicator): self
    {
        $this->shippingNameIndicator = $shippingNameIndicator;

        return $this;
    }

    /**
     * @param bool|null $suspiciousActivity
     *
     * @return self
     */
    public function setSuspiciousActivity(?bool $suspiciousActivity): self
    {
        $this->suspiciousActivity = $suspiciousActivity;

        return $this;
    }

    /**
     * @param int|null $transactionsDay
     *
     * @return self
     */
    public function setTransactionsDay(?int $transactionsDay): self
    {
        $this->transactionsDay = $transactionsDay;

        return $this;
    }

    /**
     * @param int|null $transactionsYear
     *
     * @return self
     */
    public function setTransactionsYear(?int $transactionsYear): self
    {
        $this->transactionsYear = $transactionsYear;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['created'])) {
            $model->setCreated($response['created']);
        }

        if (isset($response['changed'])) {
            $model->setChanged($response['changed']);
        }

        if (in_array($response['age_indicator'], AgeIndicatorEnum::getAll(), true)
            && isset($response['age_indicator'])) {
            $model->setAgeIndicator($response['age_indicator']);
        }

        if (in_array($response['change_indicator'], ChangeIndicatorEnum::getAll(), true)
            && isset($response['change_indicator'])) {
            $model->setChangeIndicator($response['change_indicator']);
        }

        if (isset($response['password_change'])) {
            $model->setPasswordChange($response['password_change']);
        }

        if (in_array($response['password_change_indicator'], PasswordChangeIndicatorEnum::getAll(), true)
            && isset($response['password_change_indicator'])) {
            $model->setPasswordChangeIndicator($response['password_change_indicator']);
        }

        if (isset($response['purchase_count'])) {
            $model->setPurchaseCount($response['purchase_count']);
        }

        if (isset($response['add_card_attempts'])) {
            $model->setAddCardAttempts($response['add_card_attempts']);
        }

        if (isset($response['transactions_day'])) {
            $model->setTransactionsDay($response['transactions_day']);
        }

        if (isset($response['transactions_year'])) {
            $model->setTransactionsYear($response['transactions_year']);
        }

        if (isset($response['card_age'])) {
            $model->setCardAge($response['card_age']);
        }

        if (in_array($response['card_age_indicator'], CardAgeIndicatorEnum::getAll(), true)
            && isset($response['card_age_indicator'])) {
            $model->setCardAgeIndicator($response['card_age_indicator']);
        }

        if (isset($response['shipping_address_usage'])) {
            $model->setShippingAddressUsage($response['shipping_address_usage']);
        }

        if (in_array($response['shipping_address_usage_indicator'], ShippingAddressUsageIndicatorEnum::getAll(), true)
            && isset($response['shipping_address_usage_indicator'])) {
            $model->setShippingAddressUsageIndicator($response['shipping_address_usage_indicator']);
        }

        if (isset($response['shipping_name_indicator'])) {
            $model->setShippingNameIndicator($response['shipping_name_indicator']);
        }

        if (isset($response['suspicious_activity'])) {
            $model->setSuspiciousActivity($response['suspicious_activity']);
        }

        return $model;
    }

    public function toApi(): array
    {
        $result = [];

        if ( ! is_null($this->getCreated())) {
            $result['created'] = $this->getCreated();
        }

        if ( ! is_null($this->getChanged())) {
            $result['changed'] = $this->getChanged();
        }

        if ( ! is_null($this->getAgeIndicator())) {
            $result['age_indicator'] = $this->getAgeIndicator();
        }

        if ( ! is_null($this->getChangeIndicator())) {
            $result['change_indicator'] = $this->getChangeIndicator();
        }

        if ( ! is_null($this->getPasswordChange())) {
            $result['password_change'] = $this->getPasswordChange();
        }

        if ( ! is_null($this->getPasswordChangeIndicator())) {
            $result['password_change_indicator'] = $this->getPasswordChangeIndicator();
        }

        if ( ! is_null($this->getPurchaseCount())) {
            $result['purchase_count'] = $this->getPurchaseCount();
        }

        if ( ! is_null($this->getAddCardAttempts())) {
            $result['add_card_attempts'] = $this->getAddCardAttempts();
        }

        if ( ! is_null($this->getTransactionsDay())) {
            $result['transactions_day'] = $this->getTransactionsDay();
        }

        if ( ! is_null($this->getTransactionsYear())) {
            $result['transactions_year'] = $this->getTransactionsYear();
        }

        if ( ! is_null($this->getCardAge())) {
            $result['card_age'] = $this->getCardAge();
        }

        if ( ! is_null($this->getCardAgeIndicator())) {
            $result['card_age_indicator'] = $this->getCardAgeIndicator();
        }

        if ( ! is_null($this->getShippingAddressUsage())) {
            $result['shipping_address_usage'] = $this->getShippingAddressUsage();
        }

        if ( ! is_null($this->getShippingAddressUsageIndicator())) {
            $result['shipping_address_usage_indicator'] = $this->getShippingAddressUsageIndicator();
        }

        if ( ! is_null($this->getShippingNameIndicator())) {
            $result['shipping_name_indicator'] = $this->getShippingNameIndicator();
        }

        if ( ! is_null($this->getSuspiciousActivity())) {
            $result['suspicious_activity'] = $this->getSuspiciousActivity();
        }

        return $result;
    }
}
