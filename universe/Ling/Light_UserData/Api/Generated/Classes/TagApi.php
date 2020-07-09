<?php


namespace Ling\Light_UserData\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\Light_UserData\Api\Custom\Classes\CustomLightUserDataBaseApi;
use Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface;



/**
 * The TagApi class.
 */
class TagApi extends CustomLightUserDataBaseApi implements TagApiInterface
{


    /**
     * Builds the TagApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "luda_tag";
    }




    /**
     * @implementation
     */
    public function insertTag(array $tag, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $tag);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $tag);
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
    public function getTagById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getTagByName(string $name, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where name=:name", [
            "name" => $name,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getTag($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getTags($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getTagsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getTagsColumns($columns, $where, array $markers = [])
    {
        $sCols = $columns;
        if (is_array($sCols)) {
            $sCols = '`' . implode("`,`", $columns) . '`';
        }
        $q = "select $sCols  from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getTagsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     */
    public function getTagIdByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where name=:name", [
            "name" => $name,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }





    /**
     * @implementation
     */
    public function getTagsByResourceId(string $resourceId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join luda_resource_has_tag h on h.tag_id=a.id
        where h.resource_id=:resource_id


        ", [
            ":resource_id" => $resourceId,
        ]);
    }

    /**
     * @implementation
     */
    public function getTagsByResourceResourceIdentifier(string $resourceResourceIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join luda_resource_has_tag h on h.tag_id=a.id
        where h.resource_id=:resource_id


        ", [
            ":resource_resource_identifier" => $resourceResourceIdentifier,
        ]);
    }



    /**
     * @implementation
     */
    public function getTagIdsByResourceId(string $resourceId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join luda_resource_has_tag h on h.tag_id=a.id
        inner join luda_resource b on b.id=h.resource_id
        where b.id=:resource_id
        ", [
            ":resource_id" => $resourceId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getTagIdsByResourceResourceIdentifier(string $resourceResourceIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join luda_resource_has_tag h on h.tag_id=a.id
        inner join luda_resource b on b.id=h.resource_id
        where b.resource_identifier=:resource_resource_identifier
        ", [
            ":resource_resource_identifier" => $resourceResourceIdentifier,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getTagNamesByResourceId(string $resourceId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join luda_resource_has_tag h on h.tag_id=a.id
        inner join luda_resource b on b.id=h.resource_id
        where b.id=:resource_id
        ", [
            ":resource_id" => $resourceId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getTagNamesByResourceResourceIdentifier(string $resourceResourceIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join luda_resource_has_tag h on h.tag_id=a.id
        inner join luda_resource b on b.id=h.resource_id
        where b.resource_identifier=:resource_resource_identifier
        ", [
            ":resource_resource_identifier" => $resourceResourceIdentifier,
        ], \PDO::FETCH_COLUMN);
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
    public function updateTagById(int $id, array $tag)
    { 
        $this->pdoWrapper->update($this->table, $tag, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updateTagByName(string $name, array $tag)
    { 
        $this->pdoWrapper->update($this->table, $tag, [
            "name" => $name,

        ]);
    }



    /**
     * @implementation
     */
    public function delete($where = null, array $markers = [])
    {
        return $this->pdoWrapper->delete($this->table, $where, $markers);

    }

    /**
     * @implementation
     */
    public function deleteTagById(int $id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteTagByName(string $name)
    { 
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteTagByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     */
    public function deleteTagByNames(array $names)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("name")->in($names));
    }






}
