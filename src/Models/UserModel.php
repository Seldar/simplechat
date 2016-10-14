<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 12.10.2016
 * Time: 17:04
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;

/**
 * Class UserModel
 * Class to handle User entity
 * @package Simplechat\Models
 */
class UserModel extends Model
{
    /**
     * primary key user id
     * @var integer
     */
    private $userId;

    /**
     * user name
     * @var string
     */
    private $name;

    /**
     * UserModel constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->tableName = "users";
        $this->primaryKey = "userId";
    }

    /**
     * initilize with an array.
     * @param array $user User array to initiate model with
     */
    public function initArr($user)
    {
        $this->userId = isset($user['userId']) ? $user['userId'] : null;
        $this->name =  isset($user['name']) ? $user['name'] : null;
    }

    /**
     * get the model data as an array.
     * @return array;
     */
    public function getAsArray()
    {
        $array = array();
        if($this->userId)
            $array['userId'] = $this->userId;
        if($this->name)
            $array['name'] = $this->name;
        return $array;
    }

    /**
     * getter for field name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * setter for field name
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}