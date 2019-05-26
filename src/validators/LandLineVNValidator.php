<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation\validators;

use PHPViet\Validation\Rules\LandLineVN as PatternProvider;
use Yii;
use yii\validators\RegularExpressionValidator;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class LandLineVNValidator extends RegularExpressionValidator
{
    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        $this->message = $this->message ?? Yii::t('phpviet/validation', '{attribute} must be a land line phone number of Vietnam.');
        $this->pattern = PatternProvider::pregFormat();

        parent::init();
    }
}
