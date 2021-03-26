<?php
/**
 * Class AbstractResourceModel
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Core;

use Exception;
use PDO;
use PDOException;

 /**
 * Class AbstractResourceModel
 */
class AbstractResourceModel
{
    /** @var array $dbConfig */
    protected $dbConfig;

    /** @var Logger $logger */
    protected $logger;

    /** @var string $mainTable */
    protected $mainTable;

    /** @var string $idFieldName */
    protected $idFieldName;

    /**
     * AbstractResourceModel constructor.
     */
    public function __construct()
    {
        $this->dbConfig = yaml_parse_file(__DIR__ . '/../config.yml')['config']['database'];
        $this->logger = new \Musicome\Core\Logger();
    }

    /**
     * Init method
     *
     * @param string $mainTable
     * @param string|null $idFieldName
     */
    protected function _init(string $mainTable, string $idFieldName = null)
    {
        $this->setMainTable($mainTable, $idFieldName);
    }

    /**
     * Set main table
     *
     * @param string $mainTable
     * @param string|null $idFieldName
     *
     * @return $this
     */
    protected function setMainTable(string $mainTable, string $idFieldName = null)
    {
        $this->mainTable = $mainTable;

        if (is_null($idFieldName)) {
            $idFieldName = 'id';
        }

        $this->idFieldName = $idFieldName;
        return $this;
    }

    /**
     * Get Id Field Name
     *
     * @return string
     */
    protected function getIdFieldName()
    {
        return $this->idFieldName;
    }

    /**
     * Get Main Table
     *
     * @return string
     */
    protected function getMainTable()
    {
        return $this->mainTable;
    }

    /**
     * Truncate table
     *
     * @return bool
     */
    public function truncate()
    {
        try {
            $connection = $this->getConnection();
            $sqlQuery = $connection->prepare("TRUNCATE TABLE {$this->getMainTable()}");
            $sqlQuery->execute();
        } catch (Exception $exception) {
            $this->logger->critical($exception->getMessage());
            $this->logger->debug(
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine(),
                $exception->getCode()
            );
        }

        return true;
    }

    /**
     * Load by field value
     *
     * @param $object
     * @param $value
     * @param null $field
     *
     * @return array|bool
     */
    public function load($object, $value = null, $field = null)
    {
        try {
            $connection = $this->getConnection();

            if ($value == null) {
                $sqlQuery = $connection->prepare("SELECT * FROM {$this->getMainTable()}");
                $sqlQuery->execute(['tablename' => $this->getMainTable()]);
                $data = $sqlQuery->fetchAll();
                return $this->prepareFetchAllQueryResult($object, $data);
            }

            if ($field == null) {
                $field = $this->getIdFieldName();
            }

            $sqlQuery = $connection->prepare(
                "SELECT * FROM {$this->getMainTable()} WHERE {$field} = :fieldvalue"
            );
            $sqlQuery->execute(['fieldvalue' => $value]);
        } catch (Exception $exception) {
            $this->logger->critical($exception->getMessage());
            $this->logger->debug(
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine(),
                $exception->getCode()
            );
        }

        if ($field == $this->getIdFieldName()) {
            $data = $sqlQuery->fetch();

            if (!$data) {
                return false;
            }

            return $this->prepareFetchQueryResult($object, $data);
        }

        $data = $sqlQuery->fetchAll();

        if (!$data) {
            return false;
        }

        return $this->prepareFetchAllQueryResultWithParam($object, $data);
    }

    /**
     * Prepare Fetch All Query Result
     *
     * @param $object
     * @param array $items
     *
     * @return array
     */
    protected function prepareFetchAllQueryResult($object, array $items)
    {
        $resultArray = [];

        foreach ($items as $item) {
            $subObject = clone $object;
            $resultArray[] = $this->prepareFetchQueryResult($subObject, $item);
        }

        return $resultArray;
    }

    /**
     * Prepare Fetch All Query Result
     *
     * @param $object
     * @param array $items
     *
     * @return array
     */
    protected function prepareFetchAllQueryResultWithParam($object, array $items)
    {
        $resultArray = [];

        foreach ($items as $item) {
            $subObject = clone $object;
            $currentItem = [];

            foreach ($item as $key =>  $value) {
                if (is_string($key)) {
                    $currentItem[$key] = $value;
                }
            }

            $model = $subObject->setData($currentItem);

            $resultArray[] = $model;
        }

        return $resultArray;
    }

    /**
     * Prepare Fetch Query Result
     *
     * @param $object
     * @param $item
     *
     * @return array
     */
    protected function prepareFetchQueryResult($object, $item)
    {
        $currentItem = [];

        foreach ($item as $key =>  $value) {
            if (is_string($key)) {
                $currentItem[$key] = $value;
            }
        }

        return $object->setData($currentItem);
    }

    /**
     * Save
     *
     * @param Model $object
     *
     * @return $this
     */
    public function save(Model $object)
    {
        try {
            if ($object->getId() || $object->getId() !== null) {
                $this->updateObject($object);
            } else {
                return $this->createObject($object);
            }
        } catch (Exception $exception) {
            $this->logger->debug(
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine(),
                $exception->getCode()
            );
        }

        return $this;
    }

    /**
     * Update object
     *
     * @param Model $object
     *
     * @return $this
     */
    protected function updateObject(Model $object)
    {
        try {
            $data = $object->getData();
            $updateDataString = "";
            $i = 0;

            foreach ($data as $key => $item) {
                if ($i === 0) {
                    $updateDataString .= "$key = '$item'";
                    $i++;
                    continue;
                }

                $updateDataString .= ", $key = '$item'";
            }

            $connection = $this->getConnection();
            $sqlQuery = $connection->prepare(
                "UPDATE {$this->getMainTable()} SET {$updateDataString} WHERE {$this->getIdFieldName()} = {$object->getId()}"
            );
            $sqlQuery->execute();
        } catch (Exception $exception) {
            $this->logger->critical($exception->getMessage());
            throw $exception;
        }

        return $this;
    }

    /**
     * Save object
     *
     * @param Model $object
     *
     * @return $this
     */
    protected function createObject(Model $object)
    {
        $connectionId = 0;
        try {
            $data = $object->getData();
            $connection = $this->getConnection();
            $fields = array_keys($data);
            $fields = implode(',', $fields);
            $values = array_values($data);
            $valueList = "";
            $i = 0;

            foreach ($values as $value) {
                if ($i === 0) {
                    $valueList .= "'" . $value .  "'";
                    $i++;
                    continue;
                }

                $valueList .= ", '" . $value .  "'";
            }

            $sqlQuery = $connection->prepare(
                "INSERT INTO {$this->getMainTable()} ({$fields}) VALUES({$valueList})"
            );
            $connection->beginTransaction();
            $sqlQuery->execute();
            $connectionId = $connection->lastInsertId();
            $connection->commit();
        } catch (Exception $exception) {
            $connection->rollBack();
            $this->logger->critical($exception->getMessage());
            throw $exception;
        }

        return $connectionId;
    }

    public function delete($object)
    {
        try {
            $connection = $this->getConnection();
            $objectId = $object;

            if (!is_int($object)) {
                $objectId = $object->getId();
            }

            $sqlQuery = $connection->prepare(
                "DELETE FROM {$this->getMainTable()} WHERE {$this->getIdFieldName()} = :idvalue"
            );
            $sqlQuery->execute([
                'idvalue' => $objectId
            ]);
        } catch (Exception $exception) {
            $this->logger->critical($exception->getMessage());
            $this->logger->debug(
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine(),
                $exception->getCode()
            );
        }

        return $this;
    }

    /**
     * Get Connection
     *
     * @return bool|PDO
     */
    public function getConnection()
    {

        try {
            $connectionString = "mysql:host=" . $this->dbConfig['host'] . ";dbname=" . $this->dbConfig['name'];
            $connection = new PDO(
                $connectionString,
                $this->dbConfig['username'],
                $this->dbConfig['password']
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $exception) {
            $this->logger->critical($exception->getMessage());
        }

        return false;
    }
}