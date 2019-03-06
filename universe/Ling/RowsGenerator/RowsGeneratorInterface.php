<?php


namespace Ling\RowsGenerator;


/**
 * The goal of this class is to return the rows shaped by the user,
 * and also the total number of items, and the real current page number (as the user might go over boundaries).
 *
 *
 * The user can manipulate (usually via a gui) the returned rows using the following means:
 *
 * - selecting the current page, default is 1
 * - selecting the number of items per page, default is 20
 * - selecting the sorting of the rows, default is no sorting
 * - filtering the rows by search criterion, default is no search
 *
 *
 *
 *
 */
interface RowsGeneratorInterface
{


    public function setPage($page);

    /**
     * If nbItems per page is "all", it means return all items.
     */
    public function setNbItemsPerPage($nipp);

    /**
     * sortValues: array of columnId => sortDir
     * sortDir: asc|desc
     */
    public function setSortValues(array $sortValues);

    /**
     *
     * searchItems: array of columnId => searchItem.
     * If all searchItems match only then the value of the column matches.
     * (if one searchItem fails, there is no match).
     * Note: if you need a more powerful system, you can maybe hook into the searchFilter
     * and implement your logic?
     *
     *
     *
     *
     * searchItem: searchExpression ( | searchFilter )? | searchConstraint
     *
     * searchExpression: string, if the searchExpression is contained in the value of the column, there is a match
     * searchFilter: a callable which returns whether or not there is a match.
     *                  The callable takes the value of the column as its argument.
     *                  This is an optional feature, you don't have to implement it, but you can if you want.
     *                  The user should check the documentation of the concrete class to see if this feature is exposed.
     * searchConstraint: an array of two or three terms, describing how the value of the column should be matched against.
     *
     *                      The first entry is the operator,
     *                      subsequent entries are the operands.
     *                      Operators generally require one operand, except for the between operator which
     *                      requires two.
     *
     *                      Available operators are:
     *                      - <         (match if value < operand)
     *                      - <=
     *                      - >
     *                      - >=
     *                      - between    (this is the only operator which requires the two operands)
     *                      - =          (strict match)
     *                      - !=
     *                      - like
     *                      - %like     (matches only if the value of the column starts with the operand provided with this operator)
     *                      - like%     (matches only if the value of the column ends with the operand provided with this operator)
     *
     *
     *
     *
     *
     */
    public function setSearchItems(array $searchItems);

    public function getRows();

    /**
     * The getRows method must be called first.
     */
    public function getNbTotalItems();


    /**
     * The getRows method must be called first.
     */
    public function getPage();


    /**
     * The getRows method must be called first.
     */
    public function getSortValues();

    /**
     * The getRows method must be called first.
     */
    public function getSearchItems();


    public function getNbItemsPerPage();
}