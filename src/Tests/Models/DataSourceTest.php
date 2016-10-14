<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 14.10.2016
 * Time: 14:50
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Tests\Models;

/**
 * Class DataSourceTest
 * @package Simplechat\Tests\Models
 */
class DataSourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test for getConnection method
     */
    public function testGetConnection()
    {
        $stub = $this->getMockForAbstractClass('Simplechat\Models\DataSource');
        $reflection         = new \ReflectionClass($stub);
        $reflectionProperty = $reflection->getProperty("db");
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($stub,true);

        $this->assertTrue($stub->getConnection());
    }
}
