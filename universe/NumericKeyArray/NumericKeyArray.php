<?php


namespace NumericKeyArray;


class NumericKeyArray implements NumericKeyArrayInterface
{


    protected $arr;
    protected $identifierKeyIndex;


    public function __construct()
    {
        $this->arr = [];
        $this->identifierKeyIndex = 0;
    }


    public static function create()
    {
        return new static();
    }

    public function setIdentifierKeyIndex(int $identifierKeyIndex)
    {
        $this->identifierKeyIndex = $identifierKeyIndex;
        return $this;
    }

    public function setArray(array $arr)
    {
        $this->arr = $arr;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function getArray(): array
    {
        return $this->arr;
    }

    public function getItem(string $id)
    {
        if (false !== ($index = $this->getEntryIndex($id))) {
            return $this->arr[$index];
        }
        return false;
    }


    public function remove(string $id)
    {
        if (false !== ($index = $this->getEntryIndex($id))) {
            unset($this->arr[$index]);
            return true;
        }
        return false;
    }

    public function insertAfter(array $item, string $id)
    {
        if (false !== ($index = $this->getEntryIndex($id))) {
            array_splice($this->arr, $index + 1, 0, [$item]);
            return true;
        }
        return false;
    }

    public function insertBefore(array $item, string $id)
    {
        if (false !== ($index = $this->getEntryIndex($id))) {
            array_splice($this->arr, $index, 0, [$item]);
            return true;
        }
        return false;
    }

    public function append(array $item)
    {
        $this->arr[] = $item;
        return $this;
    }

    public function prepend(array $item)
    {
        array_unshift($this->arr, $item);
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getEntryIndex(string $id)
    {
        foreach ($this->arr as $k => $row) {
            if ($id === $row[$this->identifierKeyIndex]) {
                return $k;
            }
        }
        return false;
    }
}