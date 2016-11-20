<?php

namespace BullSheet\Iterator;

/*
 * LingTalfi 2016-02-14
 */
use BullSheet\Exception\BullSheetException;
use BullSheet\Tool\ProbabilityTool;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;

class ReferencedTableWeightedIterator implements \Iterator
{


    private $current;
    private $max;
    private $weights;
    private $foreignKey;
    private $foreignKeyValues;
    private $foreignTable;

    /**
     * table: the table in which you insert data
     * foreignTable: the table from which you select rows using weights.
     */
    public function __construct(string $table, float $percent, string $foreignTable, array $weights)
    {
        $this->current = 0;
        $this->max = $this->resolvePercent($percent, $this->getNbRows($foreignTable));
        $this->weights = $weights;
        $this->foreignKey = $this->getForeignKey($table, $foreignTable);
        $this->foreignTable = $foreignTable;
        $this->foreignKeyValues = [];
    }

    public function rewind()
    {
        $this->current = 0;
        $this->foreignKeyValues = [];
    }

    public function current()
    {
        $weights = ProbabilityTool::resolveWeights($this->weights);
        $w = '';
        if ($weights) {
            $w = "where";
            $c = 0;
            foreach ($weights as $key => $value) {
                if (0 !== $c) {
                    $w .= " and";
                }
                $w .= " $key='" . str_replace("'", "\\'", $value) . "'";
                $c++;
            }

            if ($this->foreignKeyValues) {
                $w .= " and " . $this->foreignKey . " not in ('" . implode("','", $this->foreignKeyValues) . "')";
            }
        }
        $q = 'select * from ' . $this->foreignTable . ' ' . $w . ' order by rand() limit 1';
//        a($q);
        $row = QuickPdo::fetch($q);
        return $row;
    }

    public function key()
    {
        return $this->current;
    }

    public function next()
    {
        ++$this->current;
    }

    public function valid()
    {
        return ($this->current < $this->max);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function injectRow(array $row)
    {
        $v = $row[$this->foreignKey];
        if (null !== $v && !in_array($v, $this->foreignKeyValues)) {
            if (!is_numeric($v)) {
                $v = str_replace("'", "\\'", $v);
            }
            $this->foreignKeyValues[] = $v;
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    private function getNbRows(string $table): int
    {
        if (false === ($nbRows = QuickPdo::count($table))) {
            throw new BullSheetException("Cannot count the number of rows for table $table");
        }
        return $nbRows;
    }

    private function resolvePercent(float $percent, int $nbRows): int
    {
        return (int)$nbRows * $percent / 100;
    }

    private function getForeignKey(string $table, string $foreignTable): string
    {
        $foreignKey = null;
        $info = QuickPdoInfoTool::getForeignKeysInfo($table);
        foreach ($info as $key => $data) {
            if ($foreignTable === $data[1]) {
                $foreignKey = $data[2];
                break;
            }
        }
        if (null === $foreignKey) {
            throw new BullSheetException("Cannot find foreign key information for tables $table and $foreignTable");
        }
        return $foreignKey;
    }
}
