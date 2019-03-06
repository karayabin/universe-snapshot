<?php

namespace Ling\ListParams;


interface ListParamsInterface
{


    //--------------------------------------------
    // REGULAR GETTERS
    //--------------------------------------------
    /**
     * @return array of <field> => <isAsc>
     *              - field: string, the name of the item to sort
     *              - isAsc: bool, whether or not the sort should be ordered in an ascendant manner (true)
     *                              or a descendant manner (false)
     *
     */
    public function getSortItems();


    /**
     *
     * The model uses this method when it wants to allow easy searching (easy for the user and easy to deploy).
     *
     *
     * @return string
     *              If empty string, is equivalent to NOT filter the results.
     *              Any other string indicates the expression to search for.
     *
     */
    public function getSearchExpression();


    /**
     *
     * The model uses this methods when it offers advanced searching capabilities (search on multiple terms
     * simultaneously).
     *
     *
     *
     *
     * @return mixed
     *          Depending on the complexity
     *          of the search, can be many things.
     *
     *          That's because a search can be as simple as a search on an expression,
     *          and as complex as a search with conditional groups and different operators:
     *
     *                  where (id <= 6 or name like '%ric') and ( active in (1, 2) )
     *
     *          As of today (2017-08-08), I just need simple expressions, but this definition
     *          could be extended in the future.
     *
     *
     * Possible returns (extendable):
     * ------------------------
     *
     * - array of <field> => <searchItem>. All items are combined with the AND keyword (not the OR).
     *                                     This means the search is successful only if all <searchItem>
     *                                     are found; if one <searchItem> fails, the whole search fails.
     *                                     This is also known as the "and equal" mode.
     *
     *
     *          - field: string, the name of the key to search
     *          - searchItem: string|int, the expression to search for.
     *                          If it's a string, it's successful if the searchItem is contained  in the target (like %%).
     *                          If it's an int, it's successful if the searchItem equals the target.
     *
     *          For instance:   [ name => pierre ]
     *          Or:             [ name => mathilde, age => 46 ]
     *
     *
     *
     */
    public function getSearchItems();


    /**
     * @return int, the current page
     */
    public function getPage();


    /**
     * @return int|null,
     * you should set a default value,
     * unless you plan to use the QueryDecorator, in which case you can
     * set the default value with the QueryDecorator (which is with the model of MVC)
     */
    public function getNumberOfItemsPerPage();

    /**
     * Sets the number of items per page.
     * This is generally set automatically from the QueryDecorator.
     * (not by the developer manually)
     */
    public function setNumberOfItemsPerPage($n);




    //--------------------------------------------
    // NAME GETTERS
    //--------------------------------------------
    public function getNameSort();

    public function getNameSortDir();

    public function getNamePage();

    public function getNameNipp();

    public function getNameSearchExpression();

    public function getNameSearchItems();

    public function getDefaultSortDir();


    //--------------------------------------------
    // POOL
    //--------------------------------------------
    public function getPool();

    /**
     * @return string, get|post
     */
    public function getPoolType();


    //--------------------------------------------
    // NUMBER OF ITEMS (COMES FROM THE MODEL)
    //--------------------------------------------
    public function setTotalNumberOfItems($n);


    public function getTotalNumberOfItems();


    //--------------------------------------------
    // PERSISTENCY
    //--------------------------------------------
    /**
     * @return bool
     */
    public function hasPersistentPage();

    /**
     * @return bool
     */
    public function hasPersistentSort();

    /**
     * @return bool
     */
    public function hasPersistentSearch();


    //--------------------------------------------
    // ALLOWED SORT/SEARCH FIELDS
    //--------------------------------------------
    public function setAllowedSortFields(array $fields);

    public function getAllowedSortFields();

    public function setAllowedSearchFields(array $fields);

    public function getAllowedSearchFields();


    //--------------------------------------------
    //
    //--------------------------------------------
    public function getHash();

}
