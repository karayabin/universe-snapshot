<?php

namespace BullSheet\Util;

/*
 * LingTalfi 2016-02-11
 */
use BullSheet\Exception\BullSheetException;
use BullSheet\Tool\ProbabilityTool;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoDbOperationTool;
use QuickPdo\QuickPdoInfoTool;

class RelationalUtil
{


    private $rebased;
    private $autoIncs;
    private $nbItems;

    public function __construct()
    {
        $this->rebased = [];
        $this->autoIncs = [];
        /**
         * I save the nbItems per table.
         * This work as long as you do not change the nb of items of a table during a session.
         * If you were, then you should consider disable this caching array.
         */
        $this->nbItems = [];
    }

    public static function create()
    {
        return new static();
    }


    public function getTableKey($table, array $weights = null, $keyName = 'id', $allowAutoIncrementReset = true)
    {


        $s = '';
        if (null === $weights) {
            $autoInc = $this->getAutoIncrementedField($table);
            if (false !== $autoInc) {
                if (
                    true === $allowAutoIncrementReset &&
                    false !== $autoInc
                ) {
                    /**
                     * Handling the case where we have an autoIncremented field,
                     * and we know that it's continuous, and starting with 1.
                     * (the fastest case)
                     */
                    $this->rebaseAutoIncrement($table);
                    $nbItems = $this->getNbItems($table);
                    $num = mt_rand(1, $nbItems);
                    if ($keyName === $autoInc) {
                        $s = $num;
                    }
                    else {
                        $s = $this->request("select $keyName from $table where $autoInc=$num")[$keyName];
                    }
                }
            }
            if ('' === $s) {
                /**
                 * Handling case where we don't have a continuous auto incremented field
                 */
                $s = $this->request("select $keyName from $table order by rand() limit 1")[$keyName];
            }
        }
        else {


            $rweights = ProbabilityTool::resolveWeights($weights);

            if ($rweights) {
                $w = "where";
                $c = 0;
                foreach ($rweights as $key => $value) {
                    if (0 !== $c) {
                        $w .= " and";
                    }
                    $w .= " $key='" . str_replace("'", "\\'", $value) . "'";
                    $c++;
                }
            }
            
            

            $q = <<<DDD
select $keyName from 
$table 
$w
order by rand() limit 1
DDD;
            $s = $this->request($q)[$keyName];
        }
        return $s;
    }


    private function rebaseAutoIncrement($table)
    {
        if (!in_array($table, $this->rebased, true)) {
            QuickPdoDbOperationTool::rebaseAutoIncrement($table);
            $this->rebased[] = $table;
        }
    }

    private function getAutoIncrementedField($table)
    {
        if (!array_key_exists($table, $this->autoIncs)) {
            $this->autoIncs[$table] = QuickPdoInfoTool::getAutoIncrementedField($table);
        }
        return $this->autoIncs[$table];
    }

    private function getNbItems($table)
    {
        if (!array_key_exists($table, $this->nbItems)) {
            if (false !== ($info = QuickPdo::fetch("select count(*) as count from $table"))) {
                $this->nbItems[$table] = (int)$info['count'];
            }
            else {
                throw new BullSheetException("Could not execute count on table $table");
            }
        }
        return $this->nbItems[$table];
    }

    private function request($q)
    {
        if (false !== ($info = QuickPdo::fetch($q))) {
            return $info;
        }
        else {
            throw new BullSheetException("Could not get data using query: $q");
        }
    }
    
}
