<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 17.10.2016
 * Time: 17:39
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;


/**
 * Interface IModelCRUD
 * Interface to define crud methods for models.
 * @package Simplechat\Models
 */
interface IModelCRUD
{

    /**
     * create an object and save it to datasource with an array.
     * @param array $array User array to initiate model with
     * @param IDataSource $datasource datasource to initiate with
     * @return Model
     */
    public static function createFromArray($array,IDataSource $datasource);

    /**
     * read a row from datasource using primary key
     * @param int $id
     * @param IDataSource $datasource
     * @return Model
     */
    public static function readById($id, IDataSource $datasource);

    /**
     * read one or more rows using custom condition
     * @param array $conditions
     * @param IDataSource $datasource
     * @return array
     */
    public static function readBy($conditions, IDataSource $datasource);

    /**
     * update current object in the datasource.
     * @param IDatasource $datasource
     */
    public function update(IDataSource $datasource);

}