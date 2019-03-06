<?php


namespace Ling\QueryFilterBox\Util\Paginator;


use Ling\QueryFilterBox\Query\Query;

interface PaginatorInterface
{

    /**
     * @param Query $query , the query to decorate
     * @param $nbTotalItems , int: the number of raw items
     * @param array $pool , the array containing the parameters controlling the pagination.
     *          Those parameters are by default:
     *              - page: int=1, the current page number
     *              - nipp: int=20, the number of item per page
     *
     *          Note: the page number is internally re-adjusted to fit the page boundaries
     *                  (i.e. min=1 and max=the computed number of pages)
     *
     *
     *
     * @return void
     */
    public function decorateQuery(Query $query, $nbTotalItems, array $pool, array &$usedPool = []);
}