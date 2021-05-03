<?php


namespace Ling\PaginationHelper;


/**
 * The PaginationHelperTool class.
 */
class PaginationHelperTool
{


    /**
     * Returns the subset of the given rows that correspond to the page defined by its offset and pageLength.
     *
     *
     * @param array $rows
     * @param int $offset
     * @param int $pageLength
     * @return array
     */
    public static function slice(array $rows, int $offset, int $pageLength): array
    {
        return array_slice($rows, $offset, $pageLength);
    }
}