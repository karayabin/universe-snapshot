<?php


namespace SqlQuery;


interface SqlQueryInterface
{


    /**
     * @return string, the sql query
     */
    public function getSqlQuery();

    /**
     * @return string, the count sql request
     */
    public function getCountSqlQuery();

    /**
     * @return array of marker => value (see QuickPdo for more info)
     */
    public function getMarkers();

    /**
     * @return array|null,
     *          if array: [offset, length]
     */
    public function getLimit();





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @param $field , for instance:
     *
     *      - pseudo
     *      - a.pseudo
     *      - a.pseudo, a.email, b.type
     */
    public function addField(string $field);


    /**
     * @param $table , you can add your aliases too if you want, for instance
     *      - ek_user
     *      - ek_user u
     */
    public function setTable(string $table);


    /**
     * @param $join , for instance:
     *
     *      - inner join table2 t on t.id=p.product_id
     *      - inner join table2 t on t.id=p.product_id
     *        inner join table3 t2 on t2.id=h.item_id
     *      - ...
     *
     */
    public function addJoin(string $join);

    /**
     * @param $where , never include the where keyword, but always
     *      start with and or or (the concrete class must prefix your clause with
     *      where 1).
     *
     *
     *      For instance:
     *
     *      - and pseudo='michel'
     *      - and (pseudo='michel' or e.country_id=6)
     *
     */
    public function addWhere(string $where);


    /**
     * @param string $having , the having clause, without the having keyword,
     *      for instance:
     *      - sale_price between 10 and 250
     *
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
     * @return mixed
     */
    public function addHaving(string $having, string $groupName = null);

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
     * @return mixed
     */
    public function setHavingGroupType(string $groupName, string $groupType);

    /**
     * @param string $groupBy , the name of a field.
     * @return mixed
     */
    public function addGroupBy(string $groupBy);


    /**
     * @param array $groupBys, name of fields the query should be grouped by with.
     * @return mixed
     */
    public function setGroupBy(array $groupBys);


    /**
     * @param $orderBy , is the name of a column
     * @param $direction , is either asc or desc
     *
     */
    public function addOrderBy(string $orderBy, string $direction);


    /**
     * mysql style limit clause params
     *
     * @param $offset
     * @param $length
     */
    public function setLimit(int $offset, int $length);

    /**
     * Adds a QuickPdo style marker.
     *
     * @param string $key
     * @param string $value
     *
     * @see https://github.com/lingtalfi/Quickpdo
     *
     */
    public function addMarker(string $key, string $value);

    public function addMarkers(array $markers);


    //--------------------------------------------
    //
    //--------------------------------------------
    public function __toString();


}