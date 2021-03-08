<?php


namespace Ling\Light_Kit_Editor\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_Kit_Editor\Api\Custom\Classes\CustomLightKitEditorBaseApi;
use Ling\Light_Kit_Editor\Api\Generated\Interfaces\ZoneHasWidgetApiInterface;



/**
 * The ZoneHasWidgetApi class.
 */
class ZoneHasWidgetApi extends CustomLightKitEditorBaseApi implements ZoneHasWidgetApiInterface
{


    /**
     * Builds the ZoneHasWidgetApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lke_zone_has_widget";
    }






    /**
     * @implementation
     */
    public function insertZoneHasWidget(array $zoneHasWidget, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $zoneHasWidget);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'zone_id' => $zoneHasWidget["zone_id"],
				'widget_id' => $zoneHasWidget["widget_id"],

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

                $query = "select zone_id, widget_id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $zoneHasWidget);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'zone_id' => $res["zone_id"],
				'widget_id' => $res["widget_id"],

                ];
            }
            throw $e;
        }

        return false;
    }

    /**
     * @implementation
     */
    public function insertZoneHasWidgets(array $zoneHasWidgets, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($zoneHasWidgets as $zoneHasWidget) {
            $res = $this->insertZoneHasWidget($zoneHasWidget, $ignoreDuplicate, $returnRic);
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
    public function getZoneHasWidgetByZoneIdAndWidgetId(int $zone_id, int $widget_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where zone_id=:zone_id and widget_id=:widget_id", [
            "zone_id" => $zone_id,
				"widget_id" => $widget_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with zone_id=$zone_id, widget_id=$widget_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getZoneHasWidget($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getZoneHasWidgets($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getZoneHasWidgetsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getZoneHasWidgetsColumns($columns, $where, array $markers = [])
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
    public function getZoneHasWidgetsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }










    /**
     * @implementation
     */
    public function updateZoneHasWidgetByZoneIdAndWidgetId(int $zone_id, int $widget_id, array $zoneHasWidget, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $zoneHasWidget, array_merge([
            "zone_id" => $zone_id,
			"widget_id" => $widget_id,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     */
    public function updateZoneHasWidget(array $zoneHasWidget, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $zoneHasWidget, $where, $markers);
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
    public function deleteZoneHasWidgetByZoneIdAndWidgetId(int $zone_id, int $widget_id)
    {
        $this->pdoWrapper->delete($this->table, [
            "zone_id" => $zone_id,
			"widget_id" => $widget_id,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteZoneHasWidgetByZoneIds(array $zone_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("zone_id")->in($zone_ids));
    }

    /**
     * @implementation
     */
    public function deleteZoneHasWidgetByWidgetIds(array $widget_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("widget_id")->in($widget_ids));
    }




    /**
     * @implementation
     */
    public function deleteZoneHasWidgetByZoneId(int $zoneId)
    {
        $this->pdoWrapper->delete($this->table, [
            "zone_id" => $zoneId,
        ]);
    }
    /**
     * @implementation
     */
    public function deleteZoneHasWidgetByWidgetId(int $widgetId)
    {
        $this->pdoWrapper->delete($this->table, [
            "widget_id" => $widgetId,
        ]);
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
