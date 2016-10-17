<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 14.10.2016
 * Time: 14:41
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Tests\Models;

use Simplechat\Models\SQLiteDataSource;
use Simplechat\Models\UserModel;

/**
 * Class UserModelTest
 * @package Simplechat\Tests\Models
 */
class UserModelTest extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * Connecting to database
     * @return \PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = new \PDO('sqlite:db/simplechat.db');
        return $this->createDefaultDBConnection($pdo, 'db/simplechat.db');
    }

    /**
     * Creating fixture
     * @return \PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet('db/simplechat-seed.xml');
    }

    /**
     * test for initArr and __construct methods
     */
    public function testInitArr()
    {
        $controller = UserModel::createFromArray(array("name" => "Stephan Hawking"), new SQLiteDataSource());
        $result = $controller->toArray();
        $userId = $result['userId'];
        unset($result['userId']);
        $this->assertEquals(array("name" => "Stephan Hawking"),$result);
        $this->assertGreaterThan(0,$userId);
    }

    /**
     * test for setName and getName methods
     */
    public function testSetName()
    {
        $controller = new UserModel(array());
        $controller->setName("Stephan Hawking");
        $this->assertEquals("Stephan Hawking",$controller->getName());
    }
}
