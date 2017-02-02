<?php


namespace AdminTable\Listable;

class ArrayListable extends WithSearchColumns
{

    private $arr;

    public function __construct()
    {
        parent::__construct();
        $this->arr = [];
    }


    public static function create()
    {
        return new self();
    }

    public function setArray(array $arr)
    {
        $this->arr = $arr;
        return $this;
    }

    /**
     * @param $search
     * @return int the number of items
     */
    public function search($search)
    {
        if ('' === $search) {
            return count($this->arr);
        }
        $ret = [];
        $searchColumns = [];
        if (null === $this->searchCols) {
            if (array_key_exists(0, $this->arr)) {
                $searchColumns = array_keys($this->arr[0]);
            }
        } else {
            $searchColumns = $this->searchCols;
        }
        if (count($searchColumns) > 0) {
            foreach ($this->arr as $item) {
                foreach ($searchColumns as $col) {
                    if (false !== stripos($item[$col], $search)) {
                        $ret[] = $item;
                        break;
                    }
                }
            }
        } else {
            $ret = $this->arr;
        }
        $this->arr = $ret;
        return count($this->arr);
    }

    public function sort($column, $dir)
    {
        if ('' !== $column) {
            if ('asc' === $dir) {
                usort($this->arr, function ($item1, $item2) use ($column) {
                    return $item1[$column] > $item2[$column];
                });
            } else {
                usort($this->arr, function ($item1, $item2) use ($column) {
                    return $item1[$column] < $item2[$column];
                });
            }
        }
    }

    public function slice($page, $nbItemsPerPage)
    {
        if (0 !== $nbItemsPerPage) {
            $offset = ($page - 1) * $nbItemsPerPage;
            $this->arr = array_slice($this->arr, $offset, $nbItemsPerPage);
        }
    }

    /**
     * @return array of rows
     */
    public function getRows()
    {
        return $this->arr;
    }
}