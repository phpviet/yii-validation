<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation\validators;

use PHPViet\Validation\Rules\MobileVN as PatternProvider;
use Yii;
use yii\validators\RegularExpressionValidator;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class MobileVNValidator extends RegularExpressionValidator
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->message = $this->message ?? Yii::t('phpviet/validation', '{attribute} must be a mobile phone number of Vietnam.');
        $this->pattern = PatternProvider::pregFormat();

        parent::init();
    }
}
