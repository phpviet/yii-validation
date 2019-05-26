<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation;

use yii\base\BootstrapInterface;
use yii\i18n\I18N;
use yii\validators\Validator;

use phpviet\yii\validation\validators\LandLineVNValidator;
use phpviet\yii\validation\validators\MobileVNValidator;
use phpviet\yii\validation\validators\IdVNValidator;
use phpviet\yii\validation\validators\IpVNValidator;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Bootstrap implements BootstrapInterface
{

    /**
     * @inheritDoc
     */
    public function bootstrap($app): void
    {
        $this->loadTrans($app->i18n);
        $this->loadShortValidators();
    }

    /**
     * Nạp translation hổ trợ đa ngôn ngữ cho câu báo lỗi.
     *
     * @param I18N $i18n
     */
    protected function loadTrans(I18N $i18n): void
    {
        $i18n->translations['phpviet/validation'] = array_merge([
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@phpviet/yii/validation/messages',
            'fileMap' => [
                'phpviet/validation' => 'validation.php'
            ]
        ], $i18n->translations['phpviet/validation'] ?? []);
    }

    /**
     * Nạp short validators vào lớp `yii\validators\Validator` hổ trợ friendly syntax.
     */
    protected function loadShortValidators(): void
    {
        Validator::$builtInValidators = array_merge(Validator::$builtInValidators, [
            'land_line_vn' => LandLineVNValidator::class,
            'mobile_vn' => MobileVNValidator::class,
            'id_vn' => IdVNValidator::class,
            'ip_vn' => IpVNValidator::class,
            'ipv4_vn' => [
                'class' => IpVNValidator::class,
                'version' => IpVNValidator::IPV4
            ],
            'ipv6_vn' => [
                'class' => IpVNValidator::class,
                'version' => IpVNValidator::IPV6
            ]
        ]);
    }
}
