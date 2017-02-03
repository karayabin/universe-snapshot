<?php

namespace BullSheet\Iterator;

/*
 * LingTalfi 2016-02-14
 */

class ReferencedTableIterator implements \IteratorAggregate
{

    private $the_iterator;

    /**
     * table: the table in which you insert data
     * foreignTable: the table from which you select rows using weights.
     */
    public function __construct($table, $percent, $foreignTable = null, array $weights = null)
    {
        if (null === $weights) {
            $this->the_iterator = new ReferencedTableStraightIterator($foreignTable, $percent);
        }
        else {
            $this->the_iterator = new ReferencedTableWeightedIterator($table, $percent, $foreignTable, $weights);
        }
    }

    public function getIterator()
    {
        return $this->the_iterator;
    }


    public function injectRow(array $row)
    {
        $this->the_iterator->injectRow($row);
    }

}
