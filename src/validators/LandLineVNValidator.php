<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation\validators;

use Yii;

use yii\validators\RegularExpressionValidator;

use PHPViet\Validation\Rules\LandLineVN as PatternProvider;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class LandLineVNValidator extends RegularExpressionValidator
{

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->message = $this->message ?? Yii::t('phpviet/validation', 'land_line');
        $this->pattern = PatternProvider::pregFormat();

        parent::init();
    }

}