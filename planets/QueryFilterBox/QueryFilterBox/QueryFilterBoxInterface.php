<?php


namespace QueryFilterBox\QueryFilterBox;


use QueryFilterBox\Query\QueryInterface;

/**
 * Memo note:
 * QueryFilterBox object's methods are called in the following order:
 *
 * - decorateQuery
 * - setItems (experimental, might be removed)
 * - setUsedPool
 * - prepare
 *
 *
 *
 *
 *
 *
 * Interface QueryFilterBoxInterface
 * @package QueryFilterBox\QueryFilterBox
 */
interface QueryFilterBoxInterface
{

    /**
     * This method should be used to initialize the object.
     *
     * @param QueryInterface $query
     * @param array $pool , the available variables to this system
     * @param array $usedPool , the QueryFilterBox should
     *                  subscribe the variables that is uses
     *                  in the usedPool, such as the usedPool
     *                  has the following structure:
     *                      usedPool: array of used variable names.
     * @return void
     *
     */
    public function decorateQuery(QueryInterface $query, array $pool, array &$usedPool);


    //--------------------------------------------
    // ONCE THE QUERY IS PROCESSED...
    // those info might help the queryFilterBox widgets to
    // display relevant info
    //--------------------------------------------
    public function setItems(array $items);

    public function setUsedPool(array $usedPool);


    /**
     * This method gives the opportunity to the QueryFilterBox to achieve whatever
     * purpose the QueryFilterBox was designed for.
     *
     * @return void
     */
    public function prepare();

}