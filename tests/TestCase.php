<?php
/**
 * @link https://github.com/phpviet/yii-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\validation\tests;

use Yii;
use yii\helpers\ArrayHelper;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        $this->mockApplication();
    }

    public function tearDown(): void
    {
        $this->destroyApplication();
    }

    /**
     * Populates Yii::$app with a new application
     * The application will be destroyed on tearDown() automatically.
     *
     * @param array  $config   The application configuration, if needed
     * @param string $appClass name of the application class to create
     */
    protected function mockApplication($config = [], $appClass = '\yii\console\Application'): void
    {
        new $appClass(ArrayHelper::merge([
            'id'         => 'test',
            'language'   => 'vi',
            'bootstrap'  => ['phpviet\yii\validation\Bootstrap'],
            'basePath'   => __DIR__,
            'vendorPath' => dirname(__DIR__).'/vendor',
            'components' => [

            ],
        ], $config));
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication(): void
    {
        Yii::$app = null;
    }
}
