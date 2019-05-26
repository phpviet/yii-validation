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
class IpVNTest extends TestCase
{

    public function testValid()
    {
        $model = DynamicModel::validateData([
            'ipv4' => '113.173.134.203',
            'ipv6' => '2405:4800:102:1::3'
        ], [
            [['ipv4', 'ipv6'], 'ip_vn'],
            [['ipv4'], 'ipv4_vn'],
            [['ipv6'], 'ipv6_vn']
        ]);
        $this->assertFalse($model->hasErrors());
    }

    public function testInvalid()
    {
        $model = DynamicModel::validateData([
            'ipv4' => '113.173.134.203@',
            'ipv6' => '2405:4800:102:1::3!'
        ], [
            [['ipv4', 'ipv6'], 'ip_vn'],
            [['ipv4'], 'ipv4_vn'],
            [['ipv6'], 'ipv6_vn']
        ]);
        $this->assertTrue($model->hasErrors());
    }

    public function testCanTranslateErrorMessage()
    {
        $model = DynamicModel::validateData([
            'ipv4' => '113.173.134.203@',
            'ipv6' => '2405:4800:102:1::3!'
        ], [
            [['ipv4', 'ipv6'], 'ip_vn'],
            [['ipv4'], 'ipv4_vn'],
            [['ipv6'], 'ipv6_vn']
        ]);
        $this->assertContains('Việt Nam', current($model->getErrors('ipv4')));
        $this->assertContains('Việt Nam', current($model->getErrors('ipv6')));
    }

}
