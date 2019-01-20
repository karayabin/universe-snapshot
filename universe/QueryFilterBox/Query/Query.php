<?php


namespace QueryFilterBox\Query;


/**
 * Class Query
 * @package QueryFilterBox\Query
 *
 *
 * Note:
 * this query can save its own state with saveState/restoreState methods.
 * This can help in a modular environment where some modules might affect the query
 * in a way you don't have full control on.
 *
 *
 */
class Query implements QueryInterface
{

    private $selects;
    private $joins;
    private $from;
    private $wheres;
    private $groupBy;
    private $orderBy;
    private $markers;
    private $limit;
    private $countString;
    // see doc/signals.md
    private $signals;

    //
    private $br;

    private $_state;


    public function __construct()
    {
        $this->markers = [];
        $this->signals = [];
        $this->selects = [];
        $this->from = null;
        $this->joins = [];
        $this->wheres = [];
        $this->groupBy = null;
        $this->orderBy = [];
        $this->limit = [];
        $this->br = PHP_EOL;
        $this->countString = "*";
        $this->_state = null;
    }

    public static function create()
    {
        return new static();
    }


    public function getQuery()
    {
        $s = $this->getBaseQuery();
        $s .= PHP_EOL;
        if (null !== $this->groupBy) {
            $s .= PHP_EOL . "group by " . $this->groupBy;
        }

        if ($this->orderBy) {
            $s .= PHP_EOL . "order by ";
            $s .= implode($this->br . ", ", $this->orderBy);
        }

        if ($this->limit) {
            list($offset, $rowCount) = $this->limit;
            $s .= PHP_EOL . "limit $offset, $rowCount";
        }
        return $s;
    }

    public function getCountQuery()
    {
        $s = $this->getBaseQuery(true);
        return $s;
    }

    /**
     * @return array
     */
    public function getMarkers()
    {
        return $this->markers;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param $string , the string after select
     * @return $this
     */
    public function addSelect($string)
    {
        $this->selects[] = $string;
        return $this;
    }

    /**
     * @param $string , the string after the from
     * Example:
     *          table1 t1
     *
     *
     * @return $this
     */
    public function setFrom($string)
    {
        $this->from = $string;
        return $this;
    }

    /**
     * @param $string , a string containing a join.
     * Example:
     *          inner join table a on a.id=b.product_id
     *
     * @return $this
     */
    public function addJoin($string)
    {
        $this->joins[] = $string;
        return $this;
    }


    /**
     * @param $string , the string AFTER the "order by" keyword
     * @return $this
     */
    public function addOrderBy($string)
    {
        $this->orderBy[] = $string;
        return $this;
    }


    /**
     * @param $string , the string AFTER the where
     * @param null $ifPrefix , if it has previous statements before, the keyword
     *              used to combine the string with the previous statement.
     *              It can be one of "or" or "and".
     *              Default is "and".
     * @return $this
     */
    public function addWhere($string, $ifPrefix = null)
    {
        $this->wheres[] = [$string, $ifPrefix];
        return $this;
    }

    /**
     * @param $string , the string AFTER the group by keyword.
     * @return $this
     */
    public function setGroupBy($string)
    {
        $this->groupBy = $string;
        return $this;
    }


    public function addMarker($key, $value)
    {
        $this->markers[$key] = $value;
        return $this;
    }

    public function setLimit($offset, $rowCount)
    {
        $this->limit = [$offset, $rowCount];
        return $this;
    }

    public function setCountString($countString)
    {
        $this->countString = $countString;
        return $this;
    }


    public function setSignal($name)
    {
        $this->signals[] = $name;
        return $this;
    }

    public function hasSignal($name)
    {
        return in_array($name, $this->signals);
    }


    public function saveState()
    {
        $this->_state = [
            'markers' => $this->markers,
            'signals' => $this->signals,
            'selects' => $this->selects,
            'from' => $this->from,
            'joins' => $this->joins,
            'wheres' => $this->wheres,
            'groupBy' => $this->groupBy,
            'orderBy' => $this->orderBy,
            'limit' => $this->limit,
            'br' => $this->br,
            'countString' => $this->countString,
        ];
        return $this;
    }

    public function restoreState()
    {
        if (null !== $this->_state) {
            $this->markers = $this->_state['markers'];
            $this->signals = $this->_state['signals'];
            $this->selects = $this->_state['selects'];
            $this->from = $this->_state['from'];
            $this->joins = $this->_state['joins'];
            $this->wheres = $this->_state['wheres'];
            $this->groupBy = $this->_state['groupBy'];
            $this->orderBy = $this->_state['orderBy'];
            $this->limit = $this->_state['limit'];
            $this->br = $this->_state['br'];
            $this->countString = $this->_state['countString'];
        }
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getBaseQuery($isCount = false)
    {
        $br = $this->br;
        $s = "select";


        if (false === $isCount) {
            $s .= $br . implode($br, $this->selects);
        } else {
            $s .= $br . "count(" . $this->countString . ") as count";
        }


        if (null !== $this->from) {
            $s .= $br . "from " . $this->from;
        }
        if ($this->joins) {
            $s .= implode($br, $this->joins);
        }
        if ($this->wheres) {
            $s .= $br . "where" . $br;
            $c = 0;
            foreach ($this->wheres as $where) {
                $s .= $br;
                list($string, $ifPrefix) = $where;
                $string = trim($string);
                if (0 !== $c++) {
                    if (null === $ifPrefix) {
                        $ifPrefix = $br . 'and';
                    }
                    $s .= " " . $ifPrefix . " ";
                }
                $s .= $string;
            }
        }
        return $s;
    }
}



