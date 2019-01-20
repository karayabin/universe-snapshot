<?php

namespace QuickPdo\Util;

use QuickPdo\QuickPdo;

class QuickPdoListInfoUtil
{
    private $querySkeleton;
    private $queryCols;
    /**
     * @param array $realColumnMap
     *      array of symbolicColName => realColName | arr:realColNames
     */
    private $realColumnMap;
    private $markers;
    /**
     * If null, means all columns allowed
     */
    private $allowedSorts;
    private $allowedFilters;
    private $having;
    private $groupBy;
    /**
     * @var array of colName => operator
     */
    private $operators;

    public function __construct()
    {
        $this->querySkeleton = "";
        $this->queryCols = [];
        $this->realColumnMap = [];
        $this->markers = [];
        $this->having = [];
        $this->groupBy = [];
        $this->operators = [];
        //
        $this->allowedFilters = null;
        $this->allowedSorts = null;
    }

    public static function create()
    {
        return new static();
    }

    public function setQuerySkeleton($querySkeleton)
    {
        $this->querySkeleton = $querySkeleton;
        return $this;
    }

    public function setQueryCols(array $queryCols)
    {
        $this->queryCols = $queryCols;
        return $this;
    }

    public function setAllowedSorts(array $allowedSorts)
    {
        $this->allowedSorts = $allowedSorts;
        return $this;
    }

    public function setAllowedFilters(array $allowedFilters)
    {
        $this->allowedFilters = $allowedFilters;
        return $this;
    }


    public function setRealColumnMap(array $realColumnMap)
    {
        $this->realColumnMap = $realColumnMap;
        return $this;
    }


    public function setMarkers(array $markers)
    {
        $this->markers = $markers;
        return $this;
    }

    public function setGroupBy(array $groupBy)
    {
        $this->groupBy = $groupBy;
        return $this;
    }

    public function setHaving(array $having)
    {
        $this->having = $having;
        return $this;
    }

    public function setOperators(array $operators)
    {
        $this->operators = $operators;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function execute(array $params = [])
    {
        $params = array_replace([ // data coming from the user
            "sort" => [],
            "filters" => [],
            "page" => 1,
            "nipp" => 20,
        ], $params);
        $markers = [];
        //--------------------------------------------
        // CONF
        //--------------------------------------------
        $q = $this->querySkeleton;
        $allowedSort = $this->allowedSorts;
        $allowedFilter = $this->allowedFilters;
        $sort = $params['sort'];
//        az($sort);
        $filters = $params['filters'];
        $page = $params['page'];
        $nipp = (int)$params['nipp'];

        //--------------------------------------------
        // REQUEST
        //--------------------------------------------
        if ($page < 1) {
            $page = 1;
        }
        // FILTERING (WHERE AND HAVING)
        //--------------------------------------------
        $realFilters = [];
        $havingFilters = [];
        $symbolicFilters = [];
        if ($filters) {
            foreach ($filters as $col => $value) {
                if ('' !== $value) {
                    if (in_array($col, $this->having, true)) {
                        $symbolicFilters[$col] = $value;
                        $filterItem = $this->getFilterItem($col, $value, $filters);
                        if (false !== $filterItem) {
                            $havingFilters[] = $filterItem;
                        }
                    } elseif (null === $allowedFilter || in_array($col, $allowedFilter, true)) {
                        $symbolicFilters[$col] = $value;
                        $filterItem = $this->getFilterItem($col, $value, $filters);
                        if (false !== $filterItem) {
                            $realFilters[] = $filterItem;
                        }
                    }
                }
            }
        }


        if ($realFilters) {
            $this->addFilteringToQuery($q, $markers, $realFilters, "where");
        }
        //--------------------------------------------
        // GROUP BY (unconditional)
        //--------------------------------------------
        if ($this->groupBy) {
            $sGroupBy = implode(', ', $this->groupBy);
            $q .= " group by $sGroupBy";
        }
        if ($havingFilters) {
            $this->addFilteringToQuery($q, $markers, $havingFilters, "having");
        }


        $queryColsAsString = self::getQueryColsAsString($this->queryCols);



        //--------------------------------------------
        // MARKERS
        //--------------------------------------------
        if ($this->markers) {
            $markers = array_merge($markers, $this->markers);
        }



        // COUNT QUERY
        //--------------------------------------------
        $qCount = self::injectFields($q, $queryColsAsString);
        $nbItems = 0;
//        az($qCount, $markers);
        QuickPdo::fetchAll($qCount, $markers, null, $nbItems);

        // SORT
        //--------------------------------------------
        $realSorts = [];
        $symbolicSorts = [];
        if ($sort) {
            foreach ($sort as $col => $dir) {
                if (null === $allowedSort || in_array($col, $allowedSort, true)) {
                    if ('asc' === $dir || 'desc' === $dir) {
                        $symbolicSorts[$col] = $dir;
                        $col = $this->getRealColumnName($col);
                        if (is_array($col)) {
                            $col = array_shift($col);
                        }
                        $realSorts[$col] = $dir;
                    }
                }
            }
            if ($realSorts) {
                $q .= " order by ";
                $c = 0;
                foreach ($realSorts as $col => $dir) {
                    if (0 !== $c) {
                        $q .= ', ';
                    }
                    $z = explode(".", $col, 2);
                    if (1 === count($z)) {
                        $q .= "`$col` $dir";
                    } else {
                        $q .= $z[0] . ".`" . $z[1] . "` $dir";
                    }
                    $c++;
                }
            }
        }
        // LIMIT
        //--------------------------------------------
        $maxPage = 1;
        if ($nbItems > 0 && $nipp > 0) {
            $maxPage = ceil($nbItems / $nipp);
            if ($maxPage > 0) {
                if ($page < 1) {
                    $page = 1;
                }
                if ($page > $maxPage) {
                    $page = $maxPage;
                }
                $offset = ($page - 1) * $nipp;
                $q .= " limit $offset, $nipp";
            }
        }


        $q = self::injectFields($q, $queryColsAsString);



        $rows = QuickPdo::fetchAll($q, $markers);
//        a($q, $markers);
//        az($rows);
        return [
            'rows' => $rows,
            'page' => $page,
            'sort' => $realSorts,
            'filters' => $realFilters,
            'nbItems' => $nbItems,
            'nbPages' => $maxPage,
            'nipp' => $nipp,
            'symbolicFilters' => $symbolicFilters,
            'symbolicSorts' => $symbolicSorts,
        ];
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getQueryColsAsString(array $queryCols)
    {
        $queryCols = array_map(function ($v) {
            // we don't treat concat
            if (false !== stripos($v, "concat")) {
                return $v;
            }

            // we don't treat statements containing parenthesis as well
            if (false !== stripos($v, "(")) {
                return $v;
            }
            if (false === strpos($v, '`')) {
                $q = preg_split('! as !u', $v, 2);
                if (count($q) > 1) {
                    $p = explode('.', $q[0], 2);
                    if (count($p) > 1) {
                        $s = $p[0] . '.`' . $p[1] . '` as ' . $q[1];
                    } else {
                        $s = '`' . $q[0] . '` as ' . $q[1];
                    }
                } else {
                    $p = explode('.', $q[0], 2);
                    if (count($p) > 1) {
                        $s = $p[0] . '.`' . $p[1] . '`';
                    } else {
                        $s = '`' . $p[0] . '`';
                    }
                }
                return $s;
            } else {
                // the user takes care of escaping manually
                return $v;
            }
        }, $queryCols);
        $s = implode(", ", $queryCols);
        return $s;
    }

    private function getRealColumnName($column)
    {
        if (array_key_exists($column, $this->realColumnMap)) {
            return $this->realColumnMap[$column];
        }
        return $column;
    }

    private function addFilteringToQuery(&$q, array &$markers = [], array $filters = [], $type = "where")
    {

        $markerName = "mark";
        if ('where' !== $type) {
            $markerName = "hark";
        }


        if (false === stripos($q, $type . ' ')) {
            $q .= " $type ";
        } else {
            $q .= ' and ';
        }
        $c = 0;
        foreach ($filters as $info) {
            list($col, $value, $operator) = $info;
            if (null === $operator) {
                $operator = 'like';
            }


            if (!is_array($col)) {
                $col = [$col];
            }
            if (0 !== $c) {
                $q .= " and ";
            }
            $marker = $markerName . "$c";
            $group = (count($col) > 1);
            if ($group) {
                $q .= '(';
            }
            $counter = 0;
            foreach ($col as $realColName) {
                if (true === $group && 0 !== $counter) {
                    $q .= ' or ';
                }
                $z = explode(".", $realColName, 2);
                if (1 === count($z)) {
                    $q .= "`$realColName` $operator :$marker";
                    $markers[$marker] = $this->getMarkerValue($value, $operator);
                } else {
                    $q .= $z[0] . ".`" . $z[1] . "` $operator :$marker";
                    $markers[$marker] = $this->getMarkerValue($value, $operator);
                }
                $counter++;
            }
            if ($group) {
                $q .= ')';
            }
            $c++;
        }
    }


    private function getMarkerValue($value, $operator)
    {
        if ('like' === $operator) {
            return '%' . str_replace(['%', '_'], ['\%', '\_'], $value) . '%';
        }
        return $value;
    }


    private function getFilterItem($col, $value, array $filters)
    {
        $realColName = $this->getRealColumnName($col);
        $operator = null;
        if (array_key_exists($col, $this->operators)) {
            $operator = $this->operators[$col];
        }
        return [$realColName, $value, $operator];
    }


    /**
     *
     * Note: sprintf was failing because once the query was this:
     *
     * $q = "select %s from `kamille`.`eut_user_tracker` h
     * where 1
     * and route='Core_service'
     * and uri like '/service/Ekom/ecp/api?action=search.product&%'
     * ";
     *
     *
     * Notice that the last line ends with % which messes up with sprintf...
     *
     * @param $query
     * @param $fields
     * @return string
     */
    private static function injectFields($query, $fields)
    {
        return str_replace('%s', $fields, $query);
    }
}