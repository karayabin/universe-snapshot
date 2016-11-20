<?php

namespace QuickPdoMysqlDump;

/*
 * LingTalfi 2016-01-26
 */
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickPdoMysqlDump\BackupOptions\BackupOptionsInterface;
use QuickPdoMysqlDump\BackupOptions\BackupOptions;

/**
 * OPTIONS used by this instance
 * -------------------------------
 *
 * - UNIQUE_CHECKS: see mysql UNIQUE_CHECKS
 * - FOREIGN_KEY_CHECKS: see mysql FOREIGN_KEY_CHECKS
 * - SQL_MODE: see mysql SQL_MODE
 *
 *
 *
 * Personal notes:
 *      General approach: every section does its own padding bottom...
 *
 */
class QuickPdoMysqlDumpUtil
{

    private $databases2Tables;
    /**
     * @var BackupOptionsInterface
     */
    private $options;
    private $undoVars;

    public function __construct()
    {
        $this->databases2Tables = [];
        $this->undoVars = [];
    }


    public static function create()
    {
        return new static();
    }


    /**
     * @param array $databases2Tables
     *                  array of str:database to array|*:tables
     *
     *                  If tables is *, it means all the tables
     *                  It is (deliberately) not possible to include all db at once (keep it simple).
     * @return $this
     */
    public function setTarget(array $databases2Tables)
    {
        $this->databases2Tables = $databases2Tables;
        return $this;
    }

    public function setOptions(BackupOptionsInterface $options)
    {
        $this->options = $options;
        return $this;
    }


    public function render()
    {
        if (null === $this->options) {
            $this->options = BackupOptions::create();
        }
        ob_start();
        $this->printHeader();
        $this->printVariables();
        foreach ($this->databases2Tables as $db => $tables) {
            $this->printDbAndTables($db, $tables);
        }
        $this->printVariablesUndo();
        return ob_get_clean();
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function printHeader()
    {
        $this->comment('QuickPdo MysqlDump Util');
        $this->comment('version 1.0.0');
        $this->comment('');
        $this->comment(date('c'));
        $this->padding();

    }




    //------------------------------------------------------------------------------/
    // Those might be protected some day... 
    //------------------------------------------------------------------------------/
    private function printVariables()
    {
        $padding = false;
        if (null !== ($v = $this->options->getOr('UNIQUE_CHECKS'))) {
            $this->line('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=' . $v . ';');
            $this->undoVars[] = 'UNIQUE_CHECKS';
            $padding = true;
        }
        if (null !== ($v = $this->options->getOr('FOREIGN_KEY_CHECKS'))) {
            $this->line('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=' . $v . ';');
            $this->undoVars[] = 'FOREIGN_KEY_CHECKS';
            $padding = true;
        }
        if (null !== ($v = $this->options->getOr('SQL_MODE'))) {
            $this->line('SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=' . $v . ';');
            $this->undoVars[] = 'SQL_MODE';
            $padding = true;
        }
        if (true === $padding) {
            $this->padding();
        }
    }

    private function printVariablesUndo()
    {
        foreach ($this->undoVars as $v) {
            $this->line('SET ' . $v . '=@OLD_' . $v . ';');
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function printDbAndTables($db, $tables)
    {
        $this->printDbHeader($db);
        if ('*' === $tables) {
            $tables = QuickPdoInfoTool::getTables($db);
        }
        if (is_array($tables)) {
            foreach ($tables as $table) {
                $this->printTableHeader($table);
                $this->printTableInsert($table, $db);
            }
        }
    }

    private function printDbHeader($db)
    {
        $this->comment('Schema: ' . $db);
        $this->padding();
    }

    private function printTableHeader($table)
    {
        $this->comment('Table: ' . $table);
        $this->padding();
    }

    private function printTableInsert($table, $db)
    {
        
        $rows = QuickPdo::fetchAll("select * from ");
        
        $fields = [];
        $realFields = QuickPdoInfoTool::getColumnNames($table, $db);
        echo "INSERT INTO `$table` (`" . implode('`, `', $fields) . "`) VALUES" . $this->eol();
        
    }

    private function comment($m)
    {
        echo '# ' . $m . $this->eol();
    }

    private function line($m = '')
    {
        echo $m . $this->eol();
    }

    private function padding()
    {
        $this->line();
        $this->line();
    }


    private function eol()
    {
        return PHP_EOL;
    }
}
