<?php


namespace SqlQuery;


use SqlQuery\Exception\SqlQueryException;

class SqlQuery implements SqlQueryInterface
{


    /**
     * @var array of strings, for instance:
     *
     *      - pseudo
     *      - a.pseudo
     *      - a.pseudo, a.email, b.type
     */
    private $fields;

    /**
     * @var string, you can add your aliases too if you want, for instance
     *      - ek_user
     *      - ek_user u
     */
    private $table;

    /**
     * @var array of strings, for instance:
     *
     *      - inner join table2 t on t.id=p.product_id
     *
     *      -   inner join table2 t on t.id=p.product_id
     *          inner join table3 t2 on t2.id=h.item_id
     *
     *
     */
    private $joins;
    /**
     * @var array of strings, never include the where keyword, but always
     *      start with and or or (this list prefix your where with
     *      where 1 like phpMyAdmin does).
     *
     *
     *      For instance:
     *
     *      - and pseudo='michel'
     *      - and (pseudo='michel' or e.country_id=6)
     *
     */
    private $where;
    private $groupBy;
    private $having;

    /**
     * @var array of groupName => [having statement, ...]
     */
    private $havingGroups;


    private $havingGroupTypes;

    /**
     * @var array of [$field, $dir] items
     *
     * Where:
     *  - $field is the name of a column
     *  - $dir is either asc or desc
     *
     */
    private $orderBy;

    /**
     * @var array: [offset, length]
     */
    private $limit;
    /**
     * @var array of marker => value
     */
    private $markers;

    /**
     * a simple internal cache for the query,
     * note that once getSqlQuery is requested,
     * it will be frozen...
     */
    private $_query;

    public function __construct()
    {
        $this->fields = [];
        // we start with null to check if the user set the table later
        $this->table = null;
        $this->joins = [];
        $this->where = [];
        $this->groupBy = [];
        $this->having = [];
        $this->havingGroups = [];
        $this->havingGroupTypes = [];
        $this->orderBy = [];
        $this->limit = null;
        $this->markers = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getSqlQuery()
    {


        $br = PHP_EOL;
        $s = $this->getBaseRequest(false);

        if ($this->orderBy) {
            $s .= $br;
            $s .= "order by ";
            $c = 0;
            foreach ($this->orderBy as $orderBy) {
                if (0 !== $c++) {
                    $s .= ', ';
                }
                list($field, $dir) = $orderBy;
                $s .= $field . " " . $dir;
            }
        }

        if ($this->limit) {
            $s .= $br;
            $s .= "limit " . $this->limit[0] . ", " . $this->limit[1];
        }
        $this->_query = $s;

        return $s;
    }

    public function getCountSqlQuery()
    {
        return $this->getBaseRequest(true);
    }


    public function getMarkers()
    {
        return $this->markers;
    }

    public function getLimit()
    {
        return $this->limit;
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    public function addField(string $field)
    {
        $this->fields[] = $field;
        return $this;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function addJoin(string $join)
    {
        $this->joins[] = $join;
        return $this;
    }

    public function addWhere(string $where)
    {
        $this->where[] = $where;
        return $this;
    }

    public function addOrderBy(string $orderBy, string $direction)
    {
        $this->orderBy[] = [$orderBy, $direction];
        return $this;
    }

    public function setLimit(int $offset, int $length)
    {
        $this->limit = [$offset, $length];
        return $this;
    }

    public function addMarker(string $key, string $value)
    {
        $this->markers[$key] = $value;
        return $this;
    }

    public function addMarkers(array $markers)
    {
        foreach ($markers as $marker => $value) {
            $this->markers[$marker] = $value;
        }
        return $this;
    }

    public function addHaving(string $having, string $groupName = null)
    {
        if (null === $groupName) {
            $this->having[] = $having;
        } else {
            $this->havingGroups[$groupName][] = $having;
        }
        return $this;
    }

    public function setHavingGroupType(string $groupName, string $groupType)
    {
        $this->havingGroupTypes[$groupName] = $groupType;
        return $this;
    }


    public function addGroupBy(string $groupBy)
    {
        $this->groupBy[] = $groupBy;
        return $this;
    }

    public function setGroupBy(array $groupBy)
    {
        $this->groupBy = $groupBy;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function __toString()
    {
        return $this->getSqlQuery();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        throw new SqlQueryException($msg);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getBaseRequest($isCount = true)
    {
        if (empty($this->fields)) {
            $this->error("The fields cannot be empty");
        }
        if (null === $this->table) {
            $this->error("The table cannot be empty");
        }

        $br = PHP_EOL;
        $s = "";
        if (true === $isCount) {
            $s .= "select count(*) as count from (" . $br;
        }


        $s .= "select " . $br;
        $s .= implode(",$br", $this->fields);
        $s .= $br;
        $s .= "from " . $this->table;
        if ($this->joins) {
            $s .= $br;
            $s .= implode($br, $this->joins);
        }
        if ($this->where) {
            $s .= $br;
            $s .= "where 1";
            $s .= $br;
            $s .= implode($br, $this->where);
        }


        if ($this->groupBy) {
            $s .= $br;
            $s .= "group by ";
            $s .= implode(', ', $this->groupBy);
        }


        if ($this->having || $this->havingGroups) {
            $s .= $br;
            $s .= "having";


            if ($this->having) {
                $s .= " (";
                $s .= $br;
                $s .= implode($br, $this->having);
                $s .= ")";
            } else {
                $s .= " ";
            }

            if ($this->havingGroups) {


                $groupCpt = 0;
                $groupType = null;
                foreach ($this->havingGroups as $groupName => $statements) {

                    if (0 !== $groupCpt) {
                        switch ($groupType) {
                            case "andOr":
                                $s .= $br;
                                $s .= " and ";
                                break;
                            default:
                                break;
                        }
                    }


                    $groupType = $this->havingGroupTypes[$groupName] ?? "andOr";

                    switch ($groupType) {
                        case "andOr":
                            if ($this->having) {
                                $s .= " and ";
                            }
                            $s .= "(";
                            break;
                        default:
                            throw new SqlQueryException("Unknown having group type: $groupType");
                            break;
                    }
                    $s .= implode($br . "\tor ", $statements);
                    $s .= ")";
                    $groupCpt++;
                }
            }
        }


        if (true === $isCount) {
            $s .= $br . ") as ttt";
        }
        return $s;
    }

}