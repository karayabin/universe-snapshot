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
 * (you can read the ItemsGenerator object source code to be sure)
 *
 *
 * The tasks that you should do:
 *
 * - prepare the model
 *      - you can use any method in order to do so, although the prepare method is
 *          the "official" one
 * - prepare the transformation of the query depending on the params you receive in the uri
 *      - the decorateQuery method should be used
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
     * Use this method to transform the sql request depending on the pool.
     * Also, feed the usedPool with the params your QueryFilterBox instance reacts to.
     *
     * @param QueryInterface $query
     * @param array $pool , the available variables to this system,
     *                          the widget/plugin should use this method to settle the pool for the rest of the process.
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