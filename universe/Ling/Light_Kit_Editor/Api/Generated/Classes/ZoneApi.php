<?php


namespace Ling\Light_Kit_Editor\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomLightKitEditorBaseApi;
use Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneApiInterface;



/**
 * The ZoneApi class.
 */
class ZoneApi extends CustomLightKitEditorBaseApi implements ZoneApiInterface
{


    /**
     * Builds the ZoneApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lke_zone";
    }






    /**
     * @implementation
     */
    public function insertZone(array $zone, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $zone);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,

            ];
            return $ric;

        } catch (\PDOException $e) {
            $errorInfo = $e->errorInfo;
        } catch (SimplePdoWrapperQueryException $e) {
            $errorInfo = $e->getPrevious()->errorInfo;
        }


        if (null !== $errorInfo) {
            if ('23000' === $errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $zone);
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
    public function insertZones(array $zones, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($zones as $zone) {
            $res = $this->insertZone($zone, $ignoreDuplicate, $returnRic);
            if (false === $res) {
                return false;
            }
            $ret[] = $res;
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function fetchAll(array $components = []): array
    {
        $markers = [];
        $q = '';
        $options = $this->fetchRoutine($q, $markers, $components);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }
        return $this->pdoWrapper->fetchAll($q, $markers, $fetchStyle);
    }

    /**
     * @implementation
     */
    public function fetch(array $components = [])
    {
        $markers = [];
        $q = '';
        $options = $this->fetchRoutine($q, $markers, $components);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }
        return $this->pdoWrapper->fetch($q, $markers, $fetchStyle);
    }

    /**
     * @implementation
     */
    public function getZoneById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getZoneByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where identifier=:identifier", [
            "identifier" => $identifier,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with identifier=$identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getZone($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getZones($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getZonesColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getZonesColumns($columns, $where, array $markers = [])
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
    public function getZonesKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     */
    public function getZoneIdByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where identifier=:identifier", [
            "identifier" => $identifier,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with identifier=$identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }





    /**
     * @implementation
     */
    public function getZonesByPageId(string $pageId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lke_page_has_zone h on h.zone_id=a.id
        where h.page_id=:page_id


        ", [
            ":page_id" => $pageId,
        ]);
    }

    /**
     * @implementation
     */
    public function getZonesByPageIdentifier(string $pageIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lke_page_has_zone h on h.zone_id=a.id
        where h.page_id=:page_id


        ", [
            ":page_identifier" => $pageIdentifier,
        ]);
    }

    /**
     * @implementation
     */
    public function getZonesByWidgetId(string $widgetId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lke_zone_has_widget h on h.zone_id=a.id
        where h.widget_id=:widget_id


        ", [
            ":widget_id" => $widgetId,
        ]);
    }



    /**
     * @implementation
     */
    public function getZoneIdsByPageId(string $pageId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lke_page_has_zone h on h.zone_id=a.id
        inner join lke_page b on b.id=h.page_id
        where b.id=:page_id
        ", [
            ":page_id" => $pageId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getZoneIdsByPageIdentifier(string $pageIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lke_page_has_zone h on h.zone_id=a.id
        inner join lke_page b on b.id=h.page_id
        where b.identifier=:page_identifier
        ", [
            ":page_identifier" => $pageIdentifier,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getZoneIdentifiersByPageId(string $pageId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.identifier from `$this->table` a
        inner join lke_page_has_zone h on h.zone_id=a.id
        inner join lke_page b on b.id=h.page_id
        where b.id=:page_id
        ", [
            ":page_id" => $pageId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getZoneIdentifiersByPageIdentifier(string $pageIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.identifier from `$this->table` a
        inner join lke_page_has_zone h on h.zone_id=a.id
        inner join lke_page b on b.id=h.page_id
        where b.identifier=:page_identifier
        ", [
            ":page_identifier" => $pageIdentifier,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getZoneIdsByWidgetId(string $widgetId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lke_zone_has_widget h on h.zone_id=a.id
        inner join lke_widget b on b.id=h.widget_id
        where b.id=:widget_id
        ", [
            ":widget_id" => $widgetId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getZoneIdentifiersByWidgetId(string $widgetId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.identifier from `$this->table` a
        inner join lke_zone_has_widget h on h.zone_id=a.id
        inner join lke_widget b on b.id=h.widget_id
        where b.id=:widget_id
        ", [
            ":widget_id" => $widgetId,
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
    public function updateZoneById(int $id, array $zone, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $zone, array_merge([
            "id" => $id,

        ], $extraWhere), $markers);
    }

    /**
     * @implementation
     */
    public function updateZoneByIdentifier(string $identifier, array $zone, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $zone, array_merge([
            "identifier" => $identifier,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     */
    public function updateZone(array $zone, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $zone, $where, $markers);
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
    public function deleteZoneById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteZoneByIdentifier(string $identifier)
    {
        $this->pdoWrapper->delete($this->table, [
            "identifier" => $identifier,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteZoneByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     */
    public function deleteZoneByIdentifiers(array $identifiers)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("identifier")->in($identifiers));
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Appends the given components to the given query, and returns an array of options.
     *
     * The options are:
     *
     * - singleColumn: bool, whether the singleColumn mode was triggered with the Columns component
     *
     *
     * @param string $q
     * @param array $markers
     * @param array $components
     * @return array
     * @throws \Exception
     */
    private function fetchRoutine(string &$q, array &$markers, array $components): array
    {
        $sWhere = '';
        $sCols = '';
        $sOrderBy = '';
        $sLimit = '';
        $singleColumn = false;

        foreach ($components as $component) {
            if ($component instanceof Columns) {
                $component->apply($sCols);
                $mode = $component->getMode();
                if ('singleColumn' === $mode) {
                    $singleColumn = true;
                }
            } elseif ($component instanceof Where) {
                SimplePdoWrapper::addWhereSubStmt($sWhere, $markers, $component);
            } elseif ($component instanceof OrderBy) {
                $sOrderBy .= PHP_EOL . ' ORDER BY ';
                $component->apply($sOrderBy);
            } elseif ($component instanceof Limit) {
                $sOrderBy .= PHP_EOL . ' LIMIT ';
                $component->apply($sOrderBy);
            }
        }


        if ('' === $sCols) {
            $sCols = '*';
        }


        $q = "select $sCols from `$this->table`";
        if ($sWhere) {
            $q .= $sWhere;
        }
        if ($sOrderBy) {
            $q .= $sOrderBy;
        }
        if ($sLimit) {
            $q .= $sLimit;
        }


        return [
            'singleColumn' => $singleColumn,
        ];
    }


}
