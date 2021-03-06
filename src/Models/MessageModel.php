<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 13.10.2016
 * Time: 14:16
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;

/**
 * Class MessageModel
 * Class to handle Message entity
 * @package Simplechat\Models
 */
class MessageModel extends Model
{
    /**
     * primary key message id
     * @var integer
     */
    private $messageId;

    /**
     * content of the message
     * @var string
     */
    private $content;

    /**
     * timestamp of the message
     * @var integer
     */
    private $timestamp;

    /**
     * senders user id
     * @var integer
     */
    private $senderId;

    /**
     * receivers user id
     * @var integer
     */
    private $receiverId;

    /**
     * if the message is displayed to the receiver
     * @var bool
     */
    private $displayed;

    /**
     * MessageModel constructor.
     * Initializing properties
     */
    public function __construct()
    {
        $this->tableName = "messages";
        $this->primaryKey = "messageId";
    }

    /**
     * update property values with the given array
     * @param $array
     * @return void
     */
    public function arrayToProperties($array)
    {
        $this->messageId = isset($array['messageId']) ? $array['messageId'] : null;
        $this->content =  isset($array['content']) ? $array['content'] : null;
        $this->timestamp = isset($array['timestamp']) ? $array['timestamp'] : null;
        $this->senderId =  isset($array['senderId']) ? $array['senderId'] : null;
        $this->receiverId = isset($array['receiverId']) ? $array['receiverId'] : null;
        $this->displayed =  isset($array['displayed']) ? $array['displayed'] : null;
    }

    /**
     * get the model data as an array.
     * @return array;
     */
    public function toArray(){
        $array = array();
        if(isset($this->messageId))
            $array['messageId'] = $this->messageId;
        if(isset($this->content))
            $array['content'] = $this->content;
        if(isset($this->timestamp))
            $array['timestamp'] = $this->timestamp;
        if(isset($this->senderId))
            $array['senderId'] = $this->senderId;
        if(isset($this->receiverId))
            $array['receiverId'] = $this->receiverId;
        if(isset($this->displayed))
            $array['displayed'] = $this->displayed;
        return $array;
    }

    /**
     * get field messageId
     * @return bool
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * set field messageId
     * @param int $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * get field displayed
     * @return bool
     */
    public function getDisplayed()
    {
        return $this->displayed;
    }

    /**
     * set field displayed
     * @param int $displayed
     */
    public function setDisplayed($displayed)
    {
        $this->displayed = $displayed;
    }

    /**
     * get field senderId
     * @return int
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * set field senderId
     * @param int $senderId
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
    }
}