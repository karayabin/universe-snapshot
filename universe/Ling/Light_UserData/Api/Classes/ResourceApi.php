<?php


namespace Ling\Light_UserData\Api\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\Light_UserData\Api\Interfaces\ResourceApiInterface;



/**
 * The ResourceApi class.
 */
abstract class ResourceApi extends LightUserDataBaseApi implements ResourceApiInterface
{


    /**
     * Builds the ResourceApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "luda_resource";
    }




    /**
     * @implementation
     */
    public function insertResource(array $resource, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $resource);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $resource);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return $res['id'];
                }
                return [
                    'id' => $res["id"],

                ];
            }
            throw $e;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getResourceById(int $id, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where id=:id", [
            "id" => $id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with id=$id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function getResourceByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where resource_identifier=:resource_identifier", [
            "resource_identifier" => $resource_identifier,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with resource_identifier=$resource_identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getResource($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);


        $ret = $this->pdoWrapper->fetch($q, $markers);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                $e = new \RuntimeException("Row not found, inspect the exception for more details.");
                $e->where = $where;
                $e->q = $q;
                $e->markers = $markers;
                throw $e;
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }



    /**
     * @implementation
     */
    public function getResources($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getResourceIdByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where resource_identifier=:resource_identifier", [
            "resource_identifier" => $resource_identifier,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with resource_identifier=$resource_identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }









    /**
     * @implementation
     */
    public function getAllIds(): array
    { 
         return $this->pdoWrapper->fetchAll("select id from `$this->table`", [], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function updateResourceById(int $id, array $resource)
    { 
        $this->pdoWrapper->update($this->table, $resource, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updateResourceByResourceIdentifier(string $resource_identifier, array $resource)
    { 
        $this->pdoWrapper->update($this->table, $resource, [
            "resource_identifier" => $resource_identifier,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteResourceById(int $id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteResourceByResourceIdentifier(string $resource_identifier)
    { 
        $this->pdoWrapper->delete($this->table, [
            "resource_identifier" => $resource_identifier,

        ]);
    }






}
