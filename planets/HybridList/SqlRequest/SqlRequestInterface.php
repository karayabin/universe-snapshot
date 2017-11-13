<?php


namespace HybridList\SqlRequest;


interface SqlRequestInterface
{


    /**
     * @return string, the sql request
     */
    public function getSqlRequest();

    /**
     * @return string, the count sql request,
     * which returns an array:
     *      count: int, the number of items yielded by the (not count) sql request
     */
    public function getCountSqlRequest();

    /**
     * @return array of marker => value (see QuickPdo for more info)
     */
    public function getMarkers();


    public function addField($field);

    public function setTable($table);

    public function addJoin($join);

    public function addWhere($where);

    public function addOrderBy($orderBy, $direction);

    public function setLimit($offset, $length);

    public function addMarker($key, $value);


    /**
     * @return array|null,
     *          if array: [offset, length]
     */
    public function getLimit();


}