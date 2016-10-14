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
        $this->db->connect();
    }


    /**
     * create a new user in the datasource
     * @param string $name name of the user
     * @return mixed
     */
    public function createUser($name)
    {
        return $this->db->create(new UserModel(array("name" => $name)));
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
        return $this->db->create(
            new MessageModel(
                array(
                    "content" => $content,
                    "timestamp"=>time(),
                    "senderId" => $senderId,
                    "receiverId" => $receiverId,
                    "displayed" => 0
                )
            )
        );
    }

    /**
     * get and return messages which are not displayed to the current user yet
     * @param int $receiverId receiver user id
     * @return array
     */
    public function getNewMessages($receiverId)
    {
        $result = $this->db->readBy(new MessageModel(array()),array("receiverId" => $receiverId,"displayed" => 0));
        $response = array();
        foreach($result as $message)
        {
            $message->setDisplayed(1);
            $this->db->update($message);
            $user = $this->db->readOne(new UserModel(array()),$message->getSenderId());
            $data = $message->getAsArray();
            $data['name'] = $user->getName();
            $response[] = json_encode($data);
        }
        return $response;
    }

}