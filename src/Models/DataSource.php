<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 13.10.2016
 * Time: 14:12
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;

/**
 * Class DataSource
 * Class to allow shared methods for different datasources
 * @package Models
 */
abstract class DataSource implements IDataSource
{
    /**
     * database resource.
     * @var mixed
     */
    protected $db;

    /**
     * All DataSources should implement connect to connect the datasource.
     * @return mixed
     */
    abstract public function connect();

    /**
     * All DataSources should implement reading with primary key from the datasource.
     * @param IModel $model
     * @param integer $primaryId
     * @return IModel
     */
    abstract public function readOne(IModel $model, $primaryId);

    /**
     * All DataSources should implement reading with custom conditions from the datasource.
     * @param IModel $model
     * @param array $conditions
     * @return array
     */
    abstract public function readBy(IModel $model, $conditions);

    /**
     * All DataSources should implement creating from the datasource.
     * @param IModel $model
     * @return mixed
     */
    abstract public function create(IModel $model);

    /**
     * All DataSources should implement update from the datasource.
     * @param IModel $model
     * @return mixed
     */
    abstract public function update(IModel $model);

    /**
     * All DataSources should return their connection variable.
     * @return mixed
     */

    public function getConnection()
    {
        return $this->db;
    }
}