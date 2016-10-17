<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 13.10.2016
 * Time: 14:06
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Controllers;

use Simplechat\Models\IDataSource;
use Simplechat\Models\UserModel;
use Simplechat\Models\MessageModel;

/**
 * Class ChatController
 * Handling all the required behaviour for the chat api
 * @package Simplechat\Controllers
 */
class ChatController
{
    /**
     * property for handling datasource interactions
     * @var IDataSource
     */
    private $db;

    /**
     * ChatController constructor.
     * initializing the datasource
     * @param IDataSource $db
     */
    public function __construct(IDataSource $db) {
        $this->db = $db;
    }


    /**
     * create a new user in the datasource
     * @param string $name name of the user
     * @return mixed
     */
    public function createUser($name)
    {
        $user = UserModel::createFromArray(array("name" => $name),$this->db);
        return $user->getUserId();
    }

    /**
     * create a new message to the receiver from sender
     * @param string $content message content
     * @param int $senderId sender user id
     * @param int $receiverId receiver user id
     * @return mixed
     */
    public function sendMessage($content, $senderId, $receiverId)
    {
        $message = MessageModel::createFromArray(array(
            "content" => $content,
            "timestamp"=>time(),
            "senderId" => $senderId,
            "receiverId" => $receiverId,
            "displayed" => 0
        ),
            $this->db);
        return $message->getMessageId();

    }

    /**
     * get and return messages which are not displayed to the current user yet
     * @param int $receiverId receiver user id
     * @return array
     */
    public function getNewMessages($receiverId)
    {
        $result = MessageModel::readBy(array("receiverId" => $receiverId,"displayed" => 0),$this->db);
        $response = array();
        foreach($result as $message)
        {
            $message->setDisplayed(1);
            $message->update($this->db);
            $user = UserModel::readById($message->getSenderId(),$this->db);
            $data = $message->toArray();
            $data['name'] = $user->getName();
            $response[] = json_encode($data);
        }
        return $response;
    }

}