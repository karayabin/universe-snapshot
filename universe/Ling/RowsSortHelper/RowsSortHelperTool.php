<?php


namespace Ling\RowsSortHelper;

/**
 * The RowsSortHelperTool class.
 */
class RowsSortHelperTool
{


    /**
     * Sorts the given array, based on the given sorts.
     *
     * The sorts argument is an array of field => direction,
     *
     * with:
     *
     * - field: string, the name of the property to sort the rows with
     * - direction: string (asc|desc), the direction of the sort
     *
     *
     * @param array $rows
     * @param array $sorts
     * @return array
     */
    public static function sort(array &$rows, array $sorts)
    {

        $args = [];

        foreach ($sorts as $field => $direction) {
            $col = array_column($rows, $field);
            $args[] = $col;

            if ('asc' === $direction) {
                $args[] = SORT_ASC;
            } else {
                $args[] = SORT_DESC;
            }
        }
        $args[] = &$rows;
        call_user_func_array("array_multisort", $args);
    }
}