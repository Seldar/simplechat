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
class UserModel extends Model implements IModelCRUD
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
     * Initializing properties
     */
    public function __construct()
    {
        $this->tableName = "users";
        $this->primaryKey = "userId";
    }

    /**
     * initilize with an array.
     * @param array $array User array to initiate model with
     * @param IDataSource $datasource datasource to initiate with
     * @return UserModel
     */
    public static function createFromArray($array,IDataSource $datasource)
    {
        $obj = new static();
        $array['userId'] = $datasource->create($obj->getTableName(),$array);
        $obj->arrayToProperties($array);
        return $obj;
    }

    /**
     * update current object in the datasource.
     * @param IDatasource $datasource
     * @return mixed
     */
    public function update(IDataSource $datasource)
    {
        return $datasource->update($this->getTableName(),$this->getPrimaryKey(),$this->toArray());
    }

    /**
     * read a row from datasource using primary key
     * @param int $id
     * @param IDataSource $datasource
     * @return UserModel
     */
    public static function readById($id, IDataSource $datasource)
    {
        $obj = new static();
        $array = $datasource->readOne($obj->getTableName(),$obj->getPrimaryKey(), $id);
        $obj->arrayToProperties($array);
        return $obj;
    }

    /**
     * read one or more rows using custom condition
     * @param array $conditions
     * @param IDataSource $datasource
     * @return array
     */
    public static function readBy($conditions, IDataSource $datasource)
    {
        $response = array();
        $obj = new static();
        $result = $datasource->readBy($obj->getTableName(), $conditions);
        foreach($result as $array)
        {
            $obj->arrayToProperties($array);
            $response[] = clone $obj;
        }

        return $response;
    }

    /**
     * update property values with the given array
     * @param $array
     * @return void
     */
    public function arrayToProperties($array)
    {
        $this->name =  isset($array['name']) ? $array['name'] : null;
        $this->userId =  isset($array['userId']) ? $array['userId'] : null;
    }

    /**
     * get the model data as an array.
     * @return array;
     */
    public function toArray()
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

    /**
     * getter for field userId
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * setter for field userId
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}