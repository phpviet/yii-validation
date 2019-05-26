<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation\tests;

use yii\base\DynamicModel;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class MobileVNTest extends TestCase
{
    public function testValid()
    {
        $model = DynamicModel::validateData([
            'mobile' => '0909113911',
        ], [
            [['mobile'], 'mobile_vn'],
        ]);
        $this->assertFalse($model->hasErrors());
    }

    public function testInvalid()
    {
        $model = DynamicModel::validateData([
            'mobile' => '02 5479661',
        ], [
            [['mobile'], 'mobile_vn'],
        ]);
        $this->assertTrue($model->hasErrors());
    }

    public function testCanTranslateErrorMessage()
    {
        $model = DynamicModel::validateData([
            'mobile' => '02 547966_1',
        ], [
            [['mobile'], 'mobile_vn'],
        ]);
        $this->assertContains('Việt Nam', current($model->getErrors('mobile')));
    }
}
