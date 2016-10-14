<?php
/**
 * Created by PhpStorm.
 * User: Ulukut
 * Date: 12.10.2016
 * Time: 16:54
 * @author Volkan Ulukut <arthan@gmail.com>
 */

namespace Simplechat\Models;


/**
 * Class SQLiteDataSource
 * Class to handle SQLite connections
 * @package Simplechat\Models
 */
class SQLiteDataSource extends DataSource
{

    /**
     * connecting to sqlite datasource.
     * @return void
     */
    public function connect()
    {
        $this->db = new \SQLite3('db/simplechat.db');

    }

    /**
     * Read a specific row from SQLite database and return an IModel.
     * @param IModel $model
     * @param integer $primaryId
     * @return IModel
     */
    public function readOne(IModel $model, $primaryId)
    {
        $query = 'SELECT * FROM ' . $model->getTableName() . " WHERE " . $model->getPrimaryKey() . " = :userId" ;
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $primaryId, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $model->initArr($result->fetchArray());
        return $model;
    }

    /**
     * All DataSources should implement reading with custom conditions from the datasource.
     * @param IModel $model
     * @param array $conditions
     * @return array
     */
    public function readBy(IModel $model, $conditions)
    {
        $query = 'SELECT * FROM ' . $model->getTableName() . " WHERE ";
        $queryArr = array();
        foreach($conditions as $key => $value)
        {
            $queryArr[] = $key . " = :" . $key;
        }
        $query .= implode(" AND ", $queryArr);
        $stmt = $this->db->prepare($query);
        foreach($conditions as $key => $value)
        {
            $stmt->bindValue(':' . $key, $value);
        }
        $result = $stmt->execute();
        $response = array();
        while($returnData = $result->fetchArray())
        {
            $model->initArr($returnData);
            $response[] = clone $model;
        }
        return $response;
    }

    /**
     * Create a new row in the database for the given IModel.
     * @param IModel $model
     * @return mixed
     */
    public function create(IModel $model)
    {
        $array = $model->getAsArray();
        $query = "INSERT INTO " . $model->getTableName() . " (" . implode(",",array_keys($array)) . ") VALUES (:" . implode(",:",array_keys($array)) . ")";
        $stmt = $this->db->prepare($query);
        foreach($array as $key => $value)
        {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->execute();
        return $this->db->lastInsertRowID();
    }

    /**
     * Update a specific row in the database for the given IModel.
     * @param IModel $model
     * @return mixed
     */
    public function update(IModel $model)
    {
        $array = $model->getAsArray();
        $query = "UPDATE " .$model->getTableName() . " SET ";
        $queryArr = array();
        foreach($array as $key => $value)
        {
            $queryArr[] = $key . " = :" . $key;
        }
        $query .= implode(",", $queryArr) . " WHERE " . $model->getPrimaryKey() . " = :" . $model->getPrimaryKey() . "";
        $stmt = $this->db->prepare($query);
        foreach($array as $key => $value)
        {
            $stmt->bindValue(':' . $key, $value);
        }

        return is_object($stmt->execute());

    }

}