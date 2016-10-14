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

/**
 * Class MessageModelTest
 * @package Simplechat\Tests\Models
 */
class MessageModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test for __construct and initArr methods
     */
    public function testInitArr()
    {
        $controller = new MessageModel(array("messageId" => 1,"content" => "We'll pay you two thousand now, plus fifteen when we reach Alderaan.","timestamp"=>1476361555, "senderId" => 1, "receiverId" => 2, "displayed" => 0));
        $this->assertEquals(array("messageId" => 1,"content" => "We'll pay you two thousand now, plus fifteen when we reach Alderaan.","timestamp"=>1476361555, "senderId" => 1, "receiverId" => 2, "displayed" => 0),$controller->getAsArray());

        $controller->initArr(array("content" => "Seventeen? Okay, you guys got yourselves a ship. We'll be ready when you are. Docking Bay 94.","timestamp"=>1476361565, "senderId" => 2, "receiverId" => 1, "displayed" => 0));
        $this->assertEquals(array("content" => "Seventeen? Okay, you guys got yourselves a ship. We'll be ready when you are. Docking Bay 94.","timestamp"=>1476361565, "senderId" => 2, "receiverId" => 1, "displayed" => 0),$controller->getAsArray());
    }

    /**
     * test for setDisplayed and getDisplayed methods
     */
    public function testSetDisplayed()
    {
        $controller = new MessageModel(array());
        $controller->setDisplayed(1);
        $this->assertEquals(1,$controller->getDisplayed());
    }

    /**
     * test for setSenderId and getSenderId methods
     */
    public function testSetSenderId()
    {
        $controller = new MessageModel(array());
        $controller->setSenderId(1);
        $this->assertEquals(1,$controller->getSenderId());
    }

}
