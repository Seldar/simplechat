<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 12.10.2016
 * Time: 16:02
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;


/**
 * Interface IDataSource
 * Interface to define a template for datasources
 * @package Simplechat\Models
 */
interface IDataSource
{
    /**
     * All DataSources should implement connect to connect the datasource.
     * @return mixed
     */
    public function connect();

    /**
     * All DataSources should implement reading from the datasource.
     * @param IModel $model
     * @param integer $primaryId
     * @return IModel
     */
    public function readOne(IModel $model, $primaryId);

    /**
     * All DataSources should implement reading with custom conditions from the datasource.
     * @param IModel $model
     * @param array $conditions
     * @return array
     */
    public function readBy(IModel $model, $conditions);

    /**
     * All DataSources should implement creating from the datasource.
     * @param IModel $model
     * @return mixed
     */
    public function create(IModel $model);

    /**
     * All DataSources should implement update from the datasource.
     * @param IModel $model
     * @return mixed
     */
    public function update(IModel $model);

}