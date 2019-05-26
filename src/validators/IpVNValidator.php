<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation\validators;

use PHPViet\Validation\Rules\IpVN as ConcreteIpVN;
use PHPViet\Validation\Validator as ConcreteValidator;
use Yii;
use yii\validators\IpValidator;
use yii\validators\Validator;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class IpVNValidator extends Validator
{
    const IPV4 = ConcreteIpVN::IPV4;

    const IPV6 = ConcreteIpVN::IPV6;

    /**
     * @var int|null Version ip cần kiểm tra
     */
    public $version;

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        $this->message = $this->message ?? $this->getDefaultMessage();

        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function validateValue($value): ?array
    {
        if (ConcreteValidator::ipVN($this->version)->validate($value)) {
            return;
        }

        return [$this->message, []];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function clientValidateAttribute($model, $attribute, $view): ?string
    {
        return $this->getClientIpValidator()->clientValidateAttribute($model, $attribute, $view);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getClientOptions($model, $attribute): array
    {
        return $this->getClientIpValidator()->getClientOptions($model, $attribute);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultMessage(): string
    {
        switch ($this->version) {
            case self::IPV4:
                return Yii::t('phpviet/validation', '{attribute} must be Vietnam ipv4.');
            case self::IPV6:
                return Yii::t('phpviet/validation', '{attribute} must be Vietnam ipv6.');
            default:
                return Yii::t('phpviet/validation', '{attribute} must be Vietnam ip.');
        }
    }

    /**
     * @var IpValidator
     *
     * @see getClientIpValidator()
     */
    private $_clientIpValidator;

    /**
     * Trả về [[IpValidator]] hổ trợ cho việc tạo js validator tại client.
     *
     * @return IpValidator
     * @throws \yii\base\InvalidConfigException
     *
     */
    protected function getClientIpValidator(): IpValidator
    {
        if (null === $this->_clientIpValidator) {
            return $this->_clientIpValidator = Yii::createObject([
                'class' => IpValidator::class,
                'message' => $this->message,
                'ipv4NotAllowed' => $this->message,
                'ipv6NotAllowed' => $this->message,
                'ipv4' => null === $this->version || self::IPV4 === $this->version,
                'ipv6' => null === $this->version || self::IPV6 === $this->version,
            ]);
        }

        return $this->_clientIpValidator;
    }
}
