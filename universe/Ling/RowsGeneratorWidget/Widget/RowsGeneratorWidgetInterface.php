<?php


namespace Ling\RowsGeneratorWidget\Widget;


interface RowsGeneratorWidgetInterface
{


    /**
     * @param array $params
     *          The parameters to shape the rows.
     *          All parameters are optional.
     *
     *          todo: possible keys, finish
     *          - page: int, the current page to display
     *          - nipp: int, the number of items per page
     *          - searchItems: array of searchItem, to filter the rows
     *          - orderItems: array of orderItems, to order the rows
     *
     *
     *
     *
     *          Note: depends on the implementation.
     *          As for now only an ajax implementation is planned,
     *          so params are not required, the default of page 1 will be used.
     *
     *          However if we later create a static version, using $_POST as input,
     *          then we need an adaptor to convert post to params automatically for us.
     *
     *
     *
     * @return array
     */
    public function getRows(array $params = []);

    /**
     * @return int, the number of pages to display
     *              Only available after getRows has been called.
     */
    public function getNbPages();

    /**
     * @return int, the total number of items
     *              Only available after getRows has been called.
     */
    public function getNbItems();

    /**
     * @return int, the number of items per page
     *              Only available after getRows has been called.
     */
    public function getNipp();


    /**
     * @return int, the current page number
     *              Only available after getRows has been called.
     */
    public function getPage();

    /**
     * @return array, the sort values (see RowsGeneratorInterface for more info)
     *              Only available after getRows has been called.
     */
    public function getSortValues();

    /**
     * @return array, the search items (see RowsGeneratorInterface for more info)
     *              Only available after getRows has been called.
     */
    public function getSearchItems();
}


