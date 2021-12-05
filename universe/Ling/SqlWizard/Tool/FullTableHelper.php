<?php


namespace Ling\SqlWizard\Tool;

use Ling\SimplePdoWrapper\Exception\InvalidTableNameException;

/**
 * The FullTableHelper class.
 */
class FullTableHelper
{


    /**
     * Returns an array containing the db and the table extracted from the given full table.
     *
     * See the @page(full table) definition for more details.
     *
     *
     * Note: if not specified in the given fulltable, the database is set to null.
     *
     *
     *
     *
     * @param string $fullTable
     * @return array
     * @throws InvalidTableNameException
     */
    public static function explodeTable(string $fullTable): array
    {

        $invalid = false;

        $count = substr_count($fullTable, '`');
        if (4 === $count) { // `my_db`.`my_table`
            $p = explode('`.`', $fullTable);
            if (2 === count($p)) {
                $db = trim($p[0], '`');
                $table = trim($p[1], '`');
            } else {
                $invalid = true;
            }
        }
        // one of:
        // - `my_db`.my_table
        // - my_db.`my_table`
        // - `my_table`
        elseif (2 === $count) {
            if (
                '`' === substr($fullTable, 0, 1) &&
                '`' === substr($fullTable, -1)
            ) {
                $db = null;
                $table = trim($fullTable, '`');
            } elseif (false !== strpos($fullTable, '`.')) {
                $p = explode('`.', $fullTable);
                if (2 === count($p)) {
                    $db = trim($p[0], '`');
                    $table = $p[1];
                } else {
                    $invalid = true;
                }
            } elseif (false !== strpos($fullTable, '.`')) {
                $p = explode('.`', $fullTable);
                if (2 === count($p)) {
                    $db = $p[0];
                    $table = trim($p[1], '`');
                } else {
                    $invalid = true;
                }
            } else {
                $invalid = true;
            }
        }
        // one of:
        // - my_db.my_table
        // - my_table
        elseif (0 === $count) {
            $p = explode('.', $fullTable);
            $n = count($p);
            if (2 === $n) {
                $db = $p[0];
                $table = $p[1];
            } elseif (1 === $n) {
                $db = null;
                $table = $p[0];
            } else {
                $invalid = true;
            }
        } else {
            $invalid = true;
        }

        if (true === $invalid) {
            throw new InvalidTableNameException("Invalid table name $fullTable. See documentation for more info.");
        }


        return [
            $db,
            $table,
        ];
    }
}