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
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->tableName = "messages";
        $this->primaryKey = "messageId";
    }

    /**
     * initilize with an array.
     * @param array $message Message array to initiate model with
     */
    public function initArr($message)
    {
        $this->messageId = isset($message['messageId']) ? $message['messageId'] : null;
        $this->content =  isset($message['content']) ? $message['content'] : null;
        $this->timestamp = isset($message['timestamp']) ? $message['timestamp'] : null;
        $this->senderId =  isset($message['senderId']) ? $message['senderId'] : null;
        $this->receiverId = isset($message['receiverId']) ? $message['receiverId'] : null;
        $this->displayed =  isset($message['displayed']) ? $message['displayed'] : null;

    }

    /**
     * get the model data as an array.
     * @return array;
     */
    public function getAsArray(){
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
     * get field displayed
     * @return bool
     */
    public function getDisplayed()
    {
        return $this->displayed;
    }

    /**
     * set field displayed
     * @param $displayed
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
     * @param $senderId
     */
    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
    }
}