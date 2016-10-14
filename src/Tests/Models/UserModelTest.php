<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 14.10.2016
 * Time: 14:41
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Tests\Models;

use Simplechat\Models\UserModel;

/**
 * Class UserModelTest
 * @package Simplechat\Tests\Models
 */
class UserModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test for initArr and __construct methods
     */
    public function testInitArr()
    {
        $controller = new UserModel(array("userId" => 2, "name" => "Isaac Newton"));
        $this->assertEquals(array("userId" => 2, "name" => "Isaac Newton"),$controller->getAsArray());

        $controller->initArr(array("userId" => 1, "name" => "Stephan Hawking"));
        $this->assertEquals(array("userId" => 1, "name" => "Stephan Hawking"),$controller->getAsArray());
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
