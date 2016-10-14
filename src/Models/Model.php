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
abstract class Model implements IModel
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
     * Model constructor.
     * When model is initiated, it can be filled with array data.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->initArr($data);
    }

    /**
     * get the table name of the model.
     * @return string;
     */
    function getTableName()
    {
        return $this->tableName;
    }

    /**
     * get the primary key of the models table.
     * @return string;
     */
    function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * get a specific field from the model.
     * @param string $fieldName name of the field to return
     * @return mixed;
     */
    public function getField($fieldName){
        try {
            return $this->{$fieldName};
        } catch (\Exception $e) {
            return "";
        }
    }

    /**
     * get the model data as an object.
     * @return object;
     */
    public function getAsObject(){
        return (Object)$this->getAsArray();
    }

    /**
     * get the model data as an array.
     * @return array;
     */
    abstract public function getAsArray();

    /**
     * initilize with an array.
     * @param array $model Model array to initiate model with
     */
    abstract public function initArr($model);
}