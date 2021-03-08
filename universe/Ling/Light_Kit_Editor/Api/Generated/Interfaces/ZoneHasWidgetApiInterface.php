<?php


namespace Ling\Light_Kit_Editor\Api\Generated\Interfaces;


/**
 * The ZoneHasWidgetApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface ZoneHasWidgetApiInterface
{


    /**
     * Inserts the given zone has widget in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your pdo configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $zoneHasWidget
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertZoneHasWidget(array $zoneHasWidget, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given zone has widget rows in the database.
     * By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
     * If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.
     *
     *
     * If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $zoneHasWidgets
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertZoneHasWidgets(array $zoneHasWidgets, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the rows corresponding to given components.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     *
     * @param array $components
     * @return array
     */
    public function fetchAll(array $components = []): array;


    /**
     *
     * Returns the first row corresponding to given components, or false if there is no match.
     *
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param array $components
     * @return array
     */
    public function fetch(array $components = []);

    /**
     * Returns the zone has widget row identified by the given zone_id and widget_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $zone_id
	 * @param int $widget_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getZoneHasWidgetByZoneIdAndWidgetId(int $zone_id, int $widget_id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the zoneHasWidget row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param $where
     * @param array $markers
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    public function getZoneHasWidget($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZoneHasWidgets($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the zoneHasWidget rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZoneHasWidgetsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     * That subset is an array containing the given $columns.
     * The columns parameter can be either an array or a string.
     * If it's an array, the column names will be escaped with back ticks.
     * If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.
     *
     * In both cases, you shall pass the pdo markers when necessary.
     *
     *
     * @param array|string $columns
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZoneHasWidgetsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the zoneHasWidget rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZoneHasWidgetsKey2Value(string $key, string $value, $where, array $markers = []);











    /**
     * Updates the zone has widget row identified by the given zone_id and widget_id.
     *
     * @param int $zone_id
	 * @param int $widget_id
     * @param array $zoneHasWidget
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateZoneHasWidgetByZoneIdAndWidgetId(int $zone_id, int $widget_id, array $zoneHasWidget, array $extraWhere = [], array $markers = []);




    /**
     * Updates the zone has widget row.
     *
     * @param array $zoneHasWidget
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateZoneHasWidget(array $zoneHasWidget, $where = null, array $markers = []);



    /**
     * Deletes the zoneHasWidget rows matching the given where conditions, and returns the number of deleted rows.
     * If where is null, all the rows of the table will be deleted.
     *
     * False might be returned in case of a problem and if you don't catch db exceptions.
     *
     *
     *
     * @param null $where
     * @param array $markers
     * @return false|int
     */
    public function delete($where = null, array $markers = []);

    /**
     * Deletes the zone has widget identified by the given zone_id and widget_id.
     *
     * @param int $zone_id
	 * @param int $widget_id
     * @return void
     * @throws \Exception
     */
    public function deleteZoneHasWidgetByZoneIdAndWidgetId(int $zone_id, int $widget_id);



    /**
     * Deletes the zone has widget rows identified by the given zone_ids.
     *
     * @param array $zone_ids
     * @return void
     * @throws \Exception
     */
    public function deleteZoneHasWidgetByZoneIds(array $zone_ids);

    /**
     * Deletes the zone has widget rows identified by the given widget_ids.
     *
     * @param array $widget_ids
     * @return void
     * @throws \Exception
     */
    public function deleteZoneHasWidgetByWidgetIds(array $widget_ids);





    /**
     * Deletes the zone has widget rows having the given zone id.
     * @param int $zoneId
     */
    public function deleteZoneHasWidgetByZoneId(int $zoneId);

    /**
     * Deletes the zone has widget rows having the given widget id.
     * @param int $widgetId
     */
    public function deleteZoneHasWidgetByWidgetId(int $widgetId);

}
