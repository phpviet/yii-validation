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
class LandLineVNTest extends TestCase
{
    public function testValid()
    {
        $model = DynamicModel::validateData([
            'landLine' => '02838574955',
        ], [
            [['landLine'], 'land_line_vn'],
        ]);
        $this->assertFalse($model->hasErrors());
    }

    public function testInvalid()
    {
        $model = DynamicModel::validateData([
            'landLine' => '02838574955!',
        ], [
            [['landLine'], 'land_line_vn'],
        ]);
        $this->assertTrue($model->hasErrors());
    }

    public function testCanTranslateErrorMessage()
    {
        $model = DynamicModel::validateData([
            'landLine' => '02838574_955',
        ], [
            [['landLine'], 'land_line_vn'],
        ]);
        $this->assertContains('Việt Nam', current($model->getErrors('landLine')));
    }
}
