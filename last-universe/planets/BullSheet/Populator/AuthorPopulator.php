<?php

namespace BullSheet\Populator;

/*
 * LingTalfi 2016-02-12
 * 
 */
use BullSheet\CrossHandler\IteratorCrossHandler;
use BullSheet\Exception\BullSheetException;
use BullSheet\TimelinesHandler\AuthorTimelinesHandler;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoExceptionTool;
use QuickPdo\QuickPdoInfoTool;

class AuthorPopulator implements PopulatorInterface
{

    private $tables;
    /**
     * If true (default), the class is allowed to remove rows from table in order to complete
     * the populator user's wish.
     */
    private $destructive;
    private $firstColNames;
    private $onExceptionCb;
    private $onTableBeforeCb;
    private $crossHandler;
    private $timelinesHandler;

    public function __construct()
    {
        $this->tables = [];
        $this->destructive = true;
        $this->firstColNames = [];
        $this->crossHandler = IteratorCrossHandler::create();
        $this->timelinesHandler = new AuthorTimelinesHandler;
    }


    public static function create()
    {
        return new static();
    }


    /**
     * Populate some database.
     */
    public function populate()
    {
        foreach ($this->tables as $info) {
            list($table, $generator, $insert, $extra) = $info;


            if (':f' === substr($table, -2)) { // force sugar
                $table = substr($table, 0, -2);
                QuickPdo::delete($table);
            }


            if (null !== $this->onTableBeforeCb) {
                call_user_func($this->onTableBeforeCb, $table);
            }


            if (is_string($generator)) {
                if ("once" === $generator) {
                    if (true === QuickPdoInfoTool::isEmptyTable($table)) {
                        try {
                            call_user_func($insert);
                        } catch (\Exception $e) {
                            $this->onException($e);
                        }
                    }
                }
                elseif (0 === strpos($generator, "cross:")) {
                    if (true === QuickPdoInfoTool::isEmptyTable($table)) {
                        $this->crossHandler->handle($table, $insert, $generator, (null === $extra) ? [] : $extra);
                    }
                }
                elseif (0 === strpos($generator, "timelines:")) {
                    if (true === QuickPdoInfoTool::isEmptyTable($table)) {
                        $this->timelinesHandler->handle($table, $insert, $generator, (null === $extra) ? [] : $extra);
                    }
                }
                else {
                    throw new BullSheetException("Invalid generator: $generator");
                }
            }
            elseif (is_int($generator)) {

                if (($count = QuickPdo::count($table)) !== $generator) {
                    if (true === $this->destructive && $count > $generator) {
                        $n = $count - $generator;
                        $field = $this->getFirstColumnName($table);
                        /**
                         * Probably the first field is id, and so probably the call below
                         * will remove the last rows (desc).
                         */
                        QuickPdo::freeStmt("delete from $table order by $field desc limit $n");
                    }
                    else {

                        $credit = 10000;

                        for ($i = $count; $i < $generator; $i++) {
                            try {
                                call_user_func($insert);
                            } catch (\Exception $e) {
                                if (true === QuickPdoExceptionTool::isDuplicateEntry($e) && $credit > 0) {
                                    $i--;
                                    $credit--;
                                }
                                $this->onException($e);

                            }
                        }
                    }
                }
            }
            elseif (is_array($generator)) {
                if (true === QuickPdoInfoTool::isEmptyTable($table)) {
                    foreach ($generator as $k => $v) {
                        try {
                            call_user_func($insert, $k, $v);
                        } catch (\Exception $e) {
                            $this->onException($e);
                        }
                    }
                }
            }

        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    /**
     * - table: the name of the table,
     *              Tip: using the suffix ":f" will delete the table rows before processing.
     *              For instance
     *                  my_table:f
     *
     *
     *
     * - generator: the behaviour of the populating function.
     *                  It can be one of the three following types:
     *
     *                  - int: the number of rows that the generator tries to maintain in the given table.
     *                              To keep that number, the generator will either remove rows or add new
     *                              rows using the insert callback.
     *
     *                              Note: if you want to prevent this class from being able to remove rows,
     *                              you have to turn the destructiveMode with
     *                              the setIsDestructive protected method.
     *
     *                              Note: the generator might not populate the table with the exact number
     *                              every time. Be aware that exception might be thrown (typically because of a duplicate key).
     *                              The strategy used by this class is to give a credit of 10000 retries to the
     *                              method call.
     *                              So, every time an exception is thrown because of a duplicate key,
     *                              this class will retry the iteration and decrement the retries credit.
     *                              If the credit goes down to zero, then the class just skip any iteration that
     *                              fails because of a duplicate key.
     *
     *                              Note: this strategy was designed so that when you say you want
     *                              1500 new entries, you have good chances to have 1500 entries,
     *                              despite of some duplicate keys that might often happen.
     *
     *
     *                  - "once": the generator checks if the table is empty.
     *                              If so, it simply triggers the generator once.
     *
     *                  - array: the generator checks if the table is empty.
     *                              If so, it simply iterates over each entry of the array, and passes
     *                              the value to the insert callback.
     *
     *                              Note: the array notation is basically like the once notation, but
     *                              it does the foreach statement for you, that's all.
     *
     *                  - "cross": this keywords helps you populating a "has" table, which is the middle table in
     *                                  a many to many relationship.
     *
     *                                  The full syntax for the cross argument is the following:
     *
     *                                          cross:leftTable;leftTablePercent;rightTable;rightTablePercent
     *
     *                                  Please read the documentation for more info.
     *
     *                                  Note: you can specify some weights on the left and right table
     *                                  using the fourth argument named extra.
     *
     *                  - "timelines": is designed to populate "events" table .
     *                                  The generator triggers your callback every X seconds (X being a number chosen randomly
     *                                  between minDelay and maxDelay seconds), from point A to point B,
     *                                  and repeats the process for Y% of the given Z table.
     *
     *
     *                                  The full syntax for the cross argument is the following:
     *
     *                                          timelines:timelineUserTable;percentageOfRows;startTime;endTime;minDelay;maxDelay
     *                                          timelines:the_classes;100;-2 days;+2 days;0;5*60
     *
     *                                  Please read the documentation for more info.
     *                                  Note: the min and max delays accept mathematical expressions.
     *
     *
     *
     *
     * - void     insert ()
     * - mixed    extra: when used with the cross generator, this argument is an array with the following structure:
     *
     *                      - ?left: weightedColumns
     *                      - ?right: weightedColumns
     *
     *                      With:
     *                          - weightedColumns: array of column => weights
     *                          - weights: array of value => weight
     *
     */
    public function addTable(string $table, $generator, callable $insert, $extra = null): AuthorPopulator
    {
        $this->tables[] = [$table, $generator, $insert, $extra];
        return $this;
    }

    public function setOnExceptionCb(callable $onExceptionCb): AuthorPopulator
    {
        $this->onExceptionCb = $onExceptionCb;
        return $this;
    }


    public function setOnTableBefore(callable $cb): AuthorPopulator
    {
        $this->onTableBeforeCb = $cb;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function setIsDestructive(bool $isDestructive)
    {
        $this->destructive = $isDestructive;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getFirstColumnName(string $table): string
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

    private function onException(\Exception $e)
    {
        if (null !== $this->onExceptionCb) {
            call_user_func($this->onExceptionCb, $e);
        }
    }

}
