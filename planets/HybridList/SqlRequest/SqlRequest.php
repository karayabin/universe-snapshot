<?php


namespace HybridList\SqlRequest;


use HybridList\Exception\HybridListException;

class SqlRequest implements SqlRequestInterface
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
     * @var string
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
     *      - pseudo='michel'
     *      - pseudo='michel' and country_id=6
     *
     */
    private $where;

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

    public function __construct()
    {
        $this->fields = [];
        // we start with null to check if the user set the table later
        $this->table = null;
        $this->joins = [];
        $this->where = [];
        $this->orderBy = [];
        $this->limit = null;
        $this->markers = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getSqlRequest()
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
        return $s;
    }

    public function getCountSqlRequest()
    {
        return $this->getBaseRequest(true);
    }

    public function getMarkers()
    {
        return $this->markers;
    }

    public function addField($field)
    {
        $this->fields[] = $field;
        return $this;
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function addJoin($join)
    {
        $this->joins[] = $join;
        return $this;
    }

    public function addWhere($where)
    {
        $this->where[] = $where;
        return $this;
    }

    public function addOrderBy($orderBy, $direction)
    {
        $this->orderBy[] = [$orderBy, $direction];
        return $this;
    }

    public function setLimit($offset, $length)
    {
        $this->limit = [$offset, $length];
        return $this;
    }

    public function addMarker($key, $value)
    {
        $this->markers[$key] = $value;
        return $this;
    }

    public function getLimit(){
        return $this->limit;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getBaseRequest($isCount = true)
    {
        if (empty($this->fields)) {
            throw new HybridListException("The fields cannot be empty");
        }
        if (null === $this->table) {
            throw new HybridListException("The table cannot be empty");
        }

        $br = PHP_EOL;
        $s = "";
        if (true === $isCount) {
            $s .= "select count(*) as count";
        } else {
            $s .= "select " . $br;
            $s .= implode(",$br", $this->fields);
        }
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
        return $s;
    }

}