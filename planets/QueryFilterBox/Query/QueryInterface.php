<?php


namespace QueryFilterBox\Query;


interface QueryInterface
{

    /**
     * @return string, the query to execute to fetch all rows
     */
    public function getQuery();

    /**
     * @return string, the query to execute to count the rows
     */
    public function getCountQuery();

    /**
     * @return array of pdo markers associated with both queries (query or count query)
     */
    public function getMarkers();
}



