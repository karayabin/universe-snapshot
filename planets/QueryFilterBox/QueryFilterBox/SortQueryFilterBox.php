<?php


namespace QueryFilterBox\QueryFilterBox;


use QueryFilterBox\Query\Query;


/**
 * This filter box works by using two params, by default:
 *
 * - sort=$sortName
 * - asc=$oneOrZero
 *
 * $oneOrZero:
 *      - 0: is descendant
 *      - 1: is ascendant
 *
 *      Default is asc.
 *
 *
 *
 * Class SortQueryFilterBox
 * @package QueryFilterBox\QueryFilterBox
 */
class SortQueryFilterBox extends QueryFilterBox
{

    /**
     * @var array of identifier => sortFragment
     *
     *  - identifier: a string, usually passed via the uri
     *  - sortFragment: a string injected in the sql query in the "order by" clause
     *
     */
    private $sorts;
    /**
     * @var array containing:
     *      0: default sort (real sort string)
     *      1: default sort dir (asc or desc)
     */
    private $defaults;
    private $keySort;
    private $keySortDir;


    public function __construct()
    {
        parent::__construct();
        $this->defaults = [];
        $this->sorts = [];
        $this->keySort = "sort";
        $this->keySortDir = "asc";
    }


    public static function create()
    {
        return new static();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return array
     */
    public function getSorts()
    {
        return $this->sorts;
    }

    public function setSorts($sorts)
    {
        $this->sorts = $sorts;
        return $this;
    }


    public function setKeySort($keySort)
    {
        $this->keySort = $keySort;
        return $this;
    }

    public function setKeySortDir($keySortDir)
    {
        $this->keySortDir = $keySortDir;
        return $this;
    }

    public function setDefaults($sort, $sortDir = 'asc')
    {
        $this->defaults = [$sort, $sortDir];
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function doDecorateQuery(Query $query, array $pool, array &$usedPool)
    {
        if (array_key_exists($this->keySort, $pool)) {
            $usedPool[] = $this->keySort;
            $sort = $pool[$this->keySort];
            if (array_key_exists($sort, $this->sorts)) {
                $realSort = $this->sorts[$sort];

                if (is_array($realSort)) {
                    list($realSort, $sortDir) = $realSort;
                } else {
                    $sortDir = 'asc';
                    if (array_key_exists($this->keySortDir, $pool)) {
                        $usedPool[] = $this->keySortDir;
                        $_sortDir = $pool[$this->keySortDir];
                        $sortDir = ("0" === $_sortDir) ? 'desc' : 'asc';
                    }
                }
                $query->addOrderBy($realSort . " " . $sortDir);
            }
        } else {
            // use defaults
            if ($this->defaults) {
                list($sort, $sortDir) = $this->defaults;
                $query->addOrderBy($sort . " " . $sortDir);
            }
        }
    }
}