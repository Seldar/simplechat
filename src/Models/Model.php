<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 12.10.2016
 * Time: 17:21
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;


/**
 * Class Model
 * Class to define datasource entities
 * @package Simplechat\Models
 */
abstract class Model
{
    /**
     * name of the table that this model represents
     * @var string
     */
    protected $tableName;

    /**
     * primary key of the table that this model represents
     * @var string
     */
    protected $primaryKey;

    /**
     * get the table name of the model.
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * get the primary key of the models table.
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * get model properties as an array.
     * @return array
     */
    abstract public function toArray();

    /**
     * update property values with the given array
     * @param $array
     * @return void
     */
    abstract public function arrayToProperties($array);



}