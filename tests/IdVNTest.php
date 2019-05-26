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
 *
 * @since 1.0.0
 */
class IdVNTest extends TestCase
{
    public function testValid()
    {
        $model = DynamicModel::validateData([
            'id' => '025479661',
        ], [
            [['id'], 'id_vn'],
        ]);
        $this->assertFalse($model->hasErrors());
    }

    public function testInvalid()
    {
        $model = DynamicModel::validateData([
            'id' => '02 5479661',
        ], [
            [['id'], 'id_vn'],
        ]);
        $this->assertTrue($model->hasErrors());
    }

    public function testCanTranslateErrorMessage()
    {
        $model = DynamicModel::validateData([
            'id' => '02 5479661',
        ], [
            [['id'], 'id_vn'],
        ]);
        $this->assertContains('Việt Nam', current($model->getErrors('id')));
    }
}
