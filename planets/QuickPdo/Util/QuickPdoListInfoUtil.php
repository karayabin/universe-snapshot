<?php

namespace QuickPdo\Util;

use QuickPdo\QuickPdo;

class QuickPdoListInfoUtil
{
    private $querySkeleton;
    private $queryCols;
    private $realColumnMap;
    /**
     * If null, means all columns allowed
     */
    private $allowedSorts;
    private $allowedFilters;

    public function __construct()
    {
        $this->querySkeleton = "";
        $this->queryCols = [];
        $this->realColumnMap = [];
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

    /**
     * @param array $realColumnMap
     *      array of symbolicColName => realColName | arr:realColNames
     * @return $this
     */
    public function setRealColumnMap(array $realColumnMap)
    {
        $this->realColumnMap = $realColumnMap;
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
        // FILTERING
        //--------------------------------------------
        $realFilters = [];
        $symbolicFilters = [];
        if ($filters) {
            foreach ($filters as $col => $value) {
                if (null === $allowedFilter || in_array($col, $allowedFilter, true)) {
                    if ('' !== $value) {
                        $symbolicFilters[$col] = $value;
                        $col = $this->getRealColumnName($col);
                        $realFilters[] = [$col, $value];
                    }
                }
            }
        }
        if ($realFilters) {
            if (false === stripos($q, 'where ')) {
                $q .= " where ";
            } else {
                $q .= ' and ';
            }
            $c = 0;
            foreach ($realFilters as $info) {
                list($col, $value) = $info;
                if (!is_array($col)) {
                    $col = [$col];
                }
                if (0 !== $c) {
                    $q .= " and ";
                }
                $marker = "mark$c";
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
                        $q .= "`$realColName` like :$marker";
                    } else {
                        $q .= $z[0] . ".`" . $z[1] . "` like :$marker";
                    }
                    $markers[$marker] = '%' . str_replace(['%', '_'], ['\%', '\_'], $value) . '%';
                    $counter++;
                }
                if ($group) {
                    $q .= ')';
                }
                $c++;
            }
        }
        // COUNT QUERY
        //--------------------------------------------
        $qCount = sprintf($q, 'count(*) as count');
        $nbItems = (int)QuickPdo::fetch($qCount, $markers, \PDO::FETCH_COLUMN);

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


        $q = sprintf($q, self::getQueryColsAsString($this->queryCols));

        $rows = QuickPdo::fetchAll($q, $markers);
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
            if (false !== stripos($v, "concat")) {
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
}