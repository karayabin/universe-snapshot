<?php


namespace Ling\SqlQuery;


/**
 * The SqlQueryInterface interface.
 */
interface SqlQueryInterface
{


    /**
     *
     * Returns the sql query string.
     * @return string
     */
    public function getSqlQuery(): string;

    /**
     * Returns the count sql query string.
     * @return string
     */
    public function getCountSqlQuery(): string;

    /**
     * Returns an array of marker => value.
     * @return array
     */
    public function getMarkers(): array;

    /**
     * Returns the limit array: [offset, length], or null if not set.
     * @return array|null
     */
    public function getLimit();





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds a field.
     * @param string $field
     * For instance:
     *
     *      - pseudo
     *      - a.pseudo
     *      - a.pseudo, a.email, b.type
     * @return SqlQueryInterface
     */
    public function addField(string $field): SqlQueryInterface;


    /**
     * Sets the table.
     *
     * @param string $table
     * You can add your aliases too if you want, for instance
     *      - ek_user
     *      - ek_user u
     * @return SqlQueryInterface
     */
    public function setTable(string $table): SqlQueryInterface;


    /**
     * Adds a join.
     *
     * @param string $join
     * For instance:
     *
     *      - inner join table2 t on t.id=p.product_id
     *      - inner join table2 t on t.id=p.product_id
     *        inner join table3 t2 on t2.id=h.item_id
     *      - ...
     *
     * @return SqlQueryInterface
     */
    public function addJoin(string $join): SqlQueryInterface;

    /**
     * Adds a where item.
     * @param string $where
     * Never include the where keyword, but always
     *      start with and or or (the concrete class must prefix your clause with
     *      where 1).
     *
     *
     *      For instance:
     *
     *      - and pseudo='michel'
     *      - and (pseudo='michel' or e.country_id=6)
     *
     * @return SqlQueryInterface
     *
     */
    public function addWhere(string $where): SqlQueryInterface;


    /**
     * Adds an having item.
     *
     * @param string $having
     * The having clause, without the having keyword,
     *      for instance:
     *      - sale_price between 10 and 250
     *
     *
     * @param string $groupName
     * You can define a having group or not.
     * If you define a group, then all having statements inside of it will be combined using rules defined by
     * the group type, which defaults to "orAnd" (see setHavingGroupType method for more info).
     * To set the group type use the setHavingGroupType method.
     *
     * If you don't define a group, then all having statements without a group will be combine as a virtual
     * group.
     * This virtual groups is always the first to be written,
     * and then it is followed by user defined groups to form the final having clause.
     *
     *
     *
     * @return SqlQueryInterface
     */
    public function addHaving(string $having, string $groupName = null): SqlQueryInterface;

    /**
     * Sets the having group type for a given having group.
     *
     * The available types are:
     *
     * - orAnd:
     *      it will be combined with the previous having group (if any) using the "or" keyword.
     *      Then all inner statements are combined using the "and" keyword.
     * - andOr:
     *      it will be combined with the previous having group (if any) using the "and" keyword.
     *      Then all inner statements are combined using the "or" keyword.
     *
     *
     *
     * @param string $groupName
     * @param string $groupType
     * @return SqlQueryInterface
     */
    public function setHavingGroupType(string $groupName, string $groupType): SqlQueryInterface;

    /**
     * Adds a group by item.
     *
     * @param string $groupBy
     * The name of a field.
     * @return SqlQueryInterface
     */
    public function addGroupBy(string $groupBy): SqlQueryInterface;


    /**
     * Sets the group by array.
     *
     * @param array $groupBys
     * Name of fields the query should be grouped by with.
     * @return SqlQueryInterface
     */
    public function setGroupBy(array $groupBys): SqlQueryInterface;


    /**
     * Adds an order by item.
     *
     * @param string $orderBy
     * It's the name of a column.
     *
     * @param string $direction
     * It is either asc or desc.
     * @return SqlQueryInterface
     *
     */
    public function addOrderBy(string $orderBy, string $direction): SqlQueryInterface;


    /**
     * mysql style limit clause params
     *
     * @param $offset
     * @param $length
     * @return SqlQueryInterface
     */
    public function setLimit(int $offset, int $length): SqlQueryInterface;

    /**
     * Adds a pdo style marker.
     *
     * @param string $key
     * @param string $value
     *
     * @return SqlQueryInterface
     */
    public function addMarker(string $key, string $value): SqlQueryInterface;


    /**
     * Adds markers.
     *
     * @param array $markers
     * @return SqlQueryInterface
     */
    public function addMarkers(array $markers): SqlQueryInterface;


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the string version of this instance.
     *
     * @return string
     */
    public function __toString(): string;


}