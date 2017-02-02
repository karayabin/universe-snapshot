<?php


namespace AdminTable\Listable;

/**
 * There is actually an order in which the methods are called.
 *
 * - search (returns the number of items of the list)
 * - sort
 * - slice (use the number of items returned by the search method)
 * - getRows
 *
 *
 * Each method is called only once.
 *
 *
 *
 */
interface ListableInterface
{

    /**
     * @param $search, string
     *              If empty string, means no search
     * @return int the number of items
     */
    public function search($search);

    /**
     * - if column is empty string, means no sorting
     * - dir: asc|desc
     *
     */
    public function sort($column, $dir);


    /**
     * - page: 1 to pageMax
     * - nbItemsPerPage: 0 means display all
     *
     */
    public function slice($page, $nbItemsPerPage);

    /**
     * @return array of rows
     */
    public function getRows();
}