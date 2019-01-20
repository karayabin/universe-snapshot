<?php

namespace BullSheet\Iterator;

/*
 * LingTalfi 2016-02-14
 */
use BullSheet\Exception\BullSheetException;
use BullSheet\Tool\ProbabilityTool;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;

class ReferencedTableStraightIterator implements \Iterator
{


    private $position;
    private $firstColNames;
    private $array;
    private $nbRows;

    /**
     * table: a table from which you select rows, not the one in which you insert data
     */
    public function __construct($table, $percent)
    {
        $this->position = 0;
        $this->firstColNames = [];
        $this->nbRows = $this->getNbRows($table);
        $this->array = $this->getRows($table, $percent);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function injectRow(array $row)
    {

    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getRows($table, $percent)
    {
        $ret = [];
        $percent = round($percent, 3);
        if (100 === (int)$percent) {
            $ret = QuickPdo::fetchAll("select * from $table");
            if (false === $ret) {
                throw new BullSheetException("Could not fetch data from table $table");
            }
        }
        else {
            /**
             * If the user want more than XX percent, we select all XX% of the rows, starting from either
             * the beginning or the end.
             * That's cheating, it's not really random, but it's faster, and it might be okay with the user.
             * If you read this, well, you can bypass it manually if that's exactly what you want.
             */
            if ((int)$percent >= 80) {
                $firstCol = $this->getFirstColumnName($table);
                $sens = (0 === mt_rand(0, 1)) ? 'desc' : 'asc';
                $selWidth = $this->resolvePercent($percent, $this->nbRows);
                $ret = QuickPdo::fetchAll("select * from $table order by $firstCol $sens limit 0, $selWidth");
                if (false === $ret) {
                    throw new BullSheetException("Could not fetch data from table $table");
                }
            }
            else {
                $selWidth = $this->resolvePercent($percent, $this->nbRows);
                $q = "select * from $table order by rand() limit $selWidth";
                $ret = QuickPdo::fetchAll($q);
            }
        }
        return $ret;
    }

    private function getFirstColumnName($table)
    {
        if (!array_key_exists($table, $this->firstColNames)) {
            if (false !== ($columns = QuickPdoInfoTool::getColumnNames($table))) {
                $this->firstColNames[$table] = current($columns);
            }
            else {
                throw new BullSheetException("Cannot get the column names for table $table");
            }
        }
        return $this->firstColNames[$table];
    }

    private function getNbRows($table)
    {
        if (false === ($nbRows = QuickPdo::count($table))) {
            throw new BullSheetException("Cannot count the number of rows for table $table");
        }
        return $nbRows;
    }

    private function resolvePercent($percent,  $nbRows)
    {
        return (int)$nbRows * $percent / 100;
    }
}
