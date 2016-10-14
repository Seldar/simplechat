<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 12.10.2016
 * Time: 16:59
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;

/**
 * Interface IModel
 * Interface to define a template for datasource entities
 * @package Simplechat\Models
 */
interface IModel
{
    /**
     * get a specific field from the model.
     * @param string $fieldName name of the field to return
     * @return mixed;
     */
    function getField($fieldName);

    /**
     * get the table name of the model.
     * @return string;
     */
    function getTableName();

    /**
     * get the primary key of the models table.
     * @return string;
     */
    function getPrimaryKey();

    /**
     * get the model data as an object.
     * @return object;
     */
    function getAsObject();

    /**
     * get the model data as an array.
     * @return array;
     */
    function getAsArray();

    /**
     * initilize with an array.
     * @param array $model to initiate model with
     */
    function initArr($model);
}