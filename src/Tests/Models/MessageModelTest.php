<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 14.10.2016
 * Time: 14:29
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Tests\Models;

use Simplechat\Models\MessageModel;
use Simplechat\Models\SQLiteDataSource;

/**
 * Class MessageModelTest
 * @package Simplechat\Tests\Models
 */
class MessageModelTest extends \PHPUnit_Extensions_Database_TestCase
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
     * test for __construct and initArr methods
     */
    public function testInitArr()
    {
        $controller = MessageModel::createFromArray(array("content" => "Seventeen? Okay, you guys got yourselves a ship. We'll be ready when you are. Docking Bay 94.","timestamp"=>1476361565, "senderId" => 2, "receiverId" => 1, "displayed" => 0),new SQLiteDataSource());
        $result = $controller->toArray();
        $messageId = $result['messageId'];
        unset($result['messageId']);
        $this->assertEquals(array("content" => "Seventeen? Okay, you guys got yourselves a ship. We'll be ready when you are. Docking Bay 94.","timestamp"=>1476361565, "senderId" => 2, "receiverId" => 1, "displayed" => 0),$result);
        $this->assertGreaterThan(0,$messageId);
    }

    /**
     * test for setDisplayed and getDisplayed methods
     */
    public function testSetDisplayed()
    {
        $controller = new MessageModel();
        $controller->setDisplayed(1);
        $this->assertEquals(1,$controller->getDisplayed());
    }

    /**
     * test for setSenderId and getSenderId methods
     */
    public function testSetSenderId()
    {
        $controller = new MessageModel();
        $controller->setSenderId(1);
        $this->assertEquals(1,$controller->getSenderId());
    }

}
