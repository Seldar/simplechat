<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 12.10.2016
 * Time: 18:02
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Tests\Models;

use Simplechat\Models\SQLiteDataSource;


/**
 * Class SQLiteDataSourceTest
 * Testing sqlite interactions
 * @package Simplechat\Tests\Models
 */
class SQLiteDataSourceTest extends \PHPUnit_Extensions_Database_TestCase
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
     * Test for reading a record with primary key from database
     */
    public function testReadOne()
    {
        $controller = new SQLiteDataSource();

        $result = $controller->readOne("users","userId",1);
        $this->assertEquals(array("userId" => 1,"name" => "Obi-Wan Kenobi", 0 => 1, 1 => 'Obi-Wan Kenobi'),$result);

        $result = $controller->readOne("messages","messageId",1);
        $this->assertEquals(array("messageId" => 1,"content" => "We'll pay you two thousand now, plus fifteen when we reach Alderaan.","timestamp"=>1476361555, "senderId" => 1, "receiverId" => 2, "displayed" => 0, 0 => 1, 1 => "We'll pay you two thousand now, plus fifteen when we reach Alderaan.",2 => 1476361555, 3 => 1, 4 => 2, 5 => 0),$result);
    }

    /**
     * Test for reading a record with custom fields from database
     */
    public function testReadBy()
    {
        $controller = new SQLiteDataSource();

        $result = $controller->readBy("users",array("name" => "Obi-Wan Kenobi"));
        $this->assertEquals(array("userId" => 1,"name" => "Obi-Wan Kenobi", 0 => 1, 1 => 'Obi-Wan Kenobi'),$result[0]);

        $result = $controller->readBy("messages",array("displayed" => 0));
        $this->assertEquals(array("messageId" => 1,"content" => "We'll pay you two thousand now, plus fifteen when we reach Alderaan.","timestamp"=>1476361555, "senderId" => 1, "receiverId" => 2, "displayed" => 0, 0 => 1, 1 => "We'll pay you two thousand now, plus fifteen when we reach Alderaan.",2 => 1476361555, 3 => 1, 4 => 2, 5 => 0),$result[0]);
    }

    /**
     * Test for creating a new record in the database
     */
    public function testCreate()
    {
        $controller = new SQLiteDataSource();

        $result = $controller->create("users",array("name" => "Stephan Hawking"));
        $this->assertGreaterThan(0,$result);

        $result = $controller->create("messages",array("content" => "Seventeen? Okay, you guys got yourselves a ship. We'll be ready when you are. Docking Bay 94.","timestamp"=>1476361565, "senderId" => 2, "receiverId" => 1, "displayed" => 0));
        $this->assertGreaterThan(0,$result);
    }

    /**
     * Test for updating a row in the database
     */
    public function testUpdate()
    {
        $controller = new SQLiteDataSource();

        $result = $controller->update("users","userId",(array("userId" => 1,"name" => "Neil Degrasse Tyson")));
        $this->assertTrue($result);

        $result = $controller->update("messages","messageId",array("messageId" => 1,"displayed" => 1));
        $this->assertTrue($result);

    }
}
