<?php


namespace Ling\SqlQuery;


use Ling\SqlQuery\Exception\SqlQueryException;

/**
 * The SqlQuery class.
 */
class SqlQuery implements SqlQueryInterface
{


    /**
     * This property holds the fields for this instance.
     * It's an array of strings, for instance:
     *
     *      - pseudo
     *      - a.pseudo
     *      - a.pseudo, a.email, b.type
     *
     * @var array
     */
    private $fields;

    /**
     *
     * This property holds the table for this instance.
     * You can add your aliases too if you want, for instance
     *      - ek_user
     *      - ek_user u
     *
     * @var string
     */
    private $table;

    /**
     * This property holds the joins for this instance.
     * It's an array of strings, for instance:
     *
     *      - inner join table2 t on t.id=p.product_id
     *
     *      -   inner join table2 t on t.id=p.product_id
     *          inner join table3 t2 on t2.id=h.item_id
     * @var array
     *
     *
     */
    private $joins;

    /**
     * This property holds the where for this instance.
     * It's an array of strings.
     * @var array
     *
     */
    private $where;

    /**
     * This property holds the array of groupBy items.
     * @var array
     */
    private $groupBy;


    /**
     * This property holds the array of having items for this instance.
     * @var array
     */
    private $having;

    /**
     * This property holds the havingGroups for this instance.
     * @var array
     * Array of groupName => [having statement, ...]
     */
    private $havingGroups;


    /**
     * This property holds the array of having group types for this instance.
     * It's an array of having group type => having group name.
     * @var array
     */
    private $havingGroupTypes;

    /**
     * This property holds the orderBy for this instance.
     * It's an array of [$field, $dir] items
     *
     * Where:
     *  - $field is the name of a column
     *  - $dir is either asc or desc
     *
     * @var array
     */
    private $orderBy;

    /**
     * This property holds the limit for this instance.
     * It's the array: [offset, length]
     *
     * @var array
     */
    private $limit;

    /**
     * This property holds the markers for this instance.
     * It's an array of marker => value
     * @var array
     */
    private $markers;


    /**
     * The default value to add next to the where keyword.
     *
     * Some systems, like phpMyAdmin at some point in time, used a default value of 1 (0 is also possible),
     * then allowing you to have consistent where blocks all starting with AND.
     *
     * For instance:
     *
     * - where 1
     *      - and pseudo='michel'
     *      - and (pseudo='michel' or e.country_id=6)
     *      - ...
     *
     *
     * When I first created SqlQuery, I used a similar system in my apps, and therefore the default value is 1.
     *
     * Change it to 0, or empty string if you want.
     *
     *
     *
     *
     * @var string = 1
     */
    private $defaultWhereValue;


    /**
     * a simple internal cache for the query,
     * note that once getSqlQuery is requested,
     * it will be frozen...
     * @var string
     */
    private $_query;

    /**
     * Builds the SqlQuery instance.
     */
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
        $this->defaultWhereValue = "1";
        $this->markers = [];
    }

    /**
     * Returns an instance of this class.
     * @return SqlQueryInterface
     */
    public static function create(): SqlQueryInterface
    {
        return new static();
    }


    /**
     * @implementation
     */
    public function getSqlQuery(): string
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

    /**
     * @implementation
     */
    public function getCountSqlQuery(): string
    {
        return $this->getBaseRequest(true);
    }

    /**
     * @implementation
     */
    public function getMarkers(): array
    {
        return $this->markers;
    }

    /**
     * @implementation
     */
    public function getLimit()
    {
        return $this->limit;
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function addField(string $field): SqlQueryInterface
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * @implementation
     */
    public function setTable(string $table): SqlQueryInterface
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @implementation
     */
    public function addJoin(string $join): SqlQueryInterface
    {
        $this->joins[] = $join;
        return $this;
    }

    /**
     * @implementation
     */
    public function addWhere(string $where): SqlQueryInterface
    {
        $this->where[] = $where;
        return $this;
    }

    /**
     * @implementation
     */
    public function addOrderBy(string $orderBy, string $direction): SqlQueryInterface
    {
        $this->orderBy[] = [$orderBy, $direction];
        return $this;
    }

    /**
     * @implementation
     */
    public function setLimit(int $offset, int $length): SqlQueryInterface
    {
        $this->limit = [$offset, $length];
        return $this;
    }

    /**
     * @implementation
     */
    public function addMarker(string $key, string $value): SqlQueryInterface
    {
        $this->markers[$key] = $value;
        return $this;
    }

    /**
     * @implementation
     */
    public function addMarkers(array $markers): SqlQueryInterface
    {
        foreach ($markers as $marker => $value) {
            $this->markers[$marker] = $value;
        }
        return $this;
    }

    /**
     * @implementation
     */
    public function addHaving(string $having, string $groupName = null): SqlQueryInterface
    {
        if (null === $groupName) {
            $this->having[] = $having;
        } else {
            $this->havingGroups[$groupName][] = $having;
        }
        return $this;
    }


    /**
     * @implementation
     */
    public function setHavingGroupType(string $groupName, string $groupType): SqlQueryInterface
    {
        $this->havingGroupTypes[$groupName] = $groupType;
        return $this;
    }


    /**
     * @implementation
     */
    public function addGroupBy(string $groupBy): SqlQueryInterface
    {
        $this->groupBy[] = $groupBy;
        return $this;
    }

    /**
     * @implementation
     */
    public function setGroupBy(array $groupBys): SqlQueryInterface
    {
        $this->groupBy = $groupBys;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function __toString(): string
    {
        return $this->getSqlQuery();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the defaultWhereValue.
     *
     * @param string $defaultWhereValue
     */
    public function setDefaultWhereValue(string $defaultWhereValue)
    {
        $this->defaultWhereValue = $defaultWhereValue;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws SqlQueryException
     */
    protected function error(string $msg)
    {
        throw new SqlQueryException($msg);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the base request.
     *
     * @param bool $isCount
     * @return string
     * @throws \Exception
     */
    private function getBaseRequest($isCount = true): string
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
            $s .= "where " . $this->defaultWhereValue;
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