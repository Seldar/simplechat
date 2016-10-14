<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 14.10.2016
 * Time: 15:07
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Tests\Models;


/**
 * Class ModelTest
 * @package Simplechat\Tests\Models
 */
class ModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test getTableName method
     */
    public function testGetTableName()
    {
        $stub = $this->getMockForAbstractClass('Simplechat\Models\Model',array(array()));
        $reflection         = new \ReflectionClass($stub);
        $reflectionProperty = $reflection->getProperty("tableName");
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($stub,"testTable");

        $this->assertEquals("testTable", $stub->getTableName());
    }

    /**
     * test getPrimaryKey methods
     */
    public function testGetPrimaryKey()
    {
        $stub = $this->getMockForAbstractClass('Simplechat\Models\Model',array(array()));
        $reflection         = new \ReflectionClass($stub);
        $reflectionProperty = $reflection->getProperty("primaryKey");
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($stub,"testPrimaryKey");

        $this->assertEquals("testPrimaryKey", $stub->getPrimaryKey());
    }

    /**
     * test getField method
     */
    public function testGetField()
    {
        $stub = $this->getMockForAbstractClass('Simplechat\Models\Model',array(array()));
        $reflection         = new \ReflectionClass($stub);
        $reflectionProperty = $reflection->getProperty("primaryKey");
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($stub,"testPrimaryKey");

        $this->assertEquals("testPrimaryKey", $stub->getField("primaryKey"));
        $this->assertEquals("", $stub->getField("test"));
    }
}
