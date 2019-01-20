<?php


namespace AdminTable\Listable;

use QuickPdo\QuickPdo;

class QuickPdoListable extends WithSearchColumns
{

    private $query;
    private $fields;
    private $markers;

    public function __construct()
    {
        parent::__construct();
        $this->query = '';
        $this->fields = [];
        $this->markers = [];
    }


    public static function create()
    {
        return new self();
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }


    /**
     * @param $search
     * @return int the number of items
     */
    public function search($search)
    {
        $markers = $this->markers;
        $query = $this->query;
        if ('' !== $search) {
            if (null === $this->searchCols) {
                $searchColumns = $this->getSearchColumnsFromFields($this->fields);
            } else {
                $searchColumns = $this->searchCols;
            }


            if (count($searchColumns) > 0) {

                $hasWhere = false;
                if (preg_match('!\swhere\s!i', $query)) {
                    $hasWhere = true;
                }


                $i = 0;
                foreach ($searchColumns as $col) {
                    if (0 === $i) {
                        if (true === $hasWhere) {
                            $query .= " and (";
                        } else {
                            $query .= " where (";
                        }
                    } else {
                        $query .= " or ";
                    }
                    $markerName = "_mk" . $i++;
                    $markers[$markerName] = '%' . str_replace('%', '\%', $search) . '%';
                    $query .= "$col like :" . $markerName;
                }
                $query .= ')';
            }
        }
        $this->query = $query;
        $this->markers = $markers;
        return (int)QuickPdo::fetch(sprintf($query, "count(*) as count"), $markers)['count'];
    }

    public function sort($column, $dir)
    {
        if ('' !== $column) {
            $allowedColumns = $this->getSortColumnsFromFields($this->fields);
            if (null !== $column && in_array($column, $allowedColumns, true)) {
                $this->query .= " order by " . $column;
                if (null !== $dir && in_array($dir, ['asc', 'desc'])) {
                    $this->query .= " " . $dir;
                }
            }
        }
    }

    public function slice($page, $nbItemsPerPage)
    {
        if (0 !== $nbItemsPerPage) {
            $offset = ($page - 1) * $nbItemsPerPage;
            $this->query .= " limit $offset, " . $nbItemsPerPage;
        }
    }

    /**
     * @return array of rows
     */
    public function getRows()
    {
        return QuickPdo::fetchAll(sprintf($this->query, $this->fields), $this->markers);
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getSortColumnsFromFields($fields)
    {
        return array_map(function ($v) {
            $p = explode('.', $v);
            $val = trim(array_pop($p));
            $p = preg_split('/\s+/', $val);
            $val = array_pop($p);
            return trim($val);
        }, explode(',' . PHP_EOL, $fields));
    }

    private function getSearchColumnsFromFields($fields)
    {

        $ret = array_map(function ($v) {
            $v = trim($v);
            $p = preg_split('/\s+/', $v);
            $v = array_shift($p);
            return $v;
        }, explode(',' . PHP_EOL, $fields));
        $ret = array_filter($ret, function ($v) {
            if ('(' === substr($v, 0, 1)) {
                return false;
            }
            return true;
        });
        return $ret;
    }
}