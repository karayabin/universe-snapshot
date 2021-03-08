<?php


namespace Ling\Light_Kit_Editor\Api\Generated\Interfaces;


/**
 * The ZoneApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface ZoneApiInterface
{


    /**
     * Inserts the given zone in the database.
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
     * @param array $zone
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertZone(array $zone, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given zone rows in the database.
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
     * @param array $zones
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertZones(array $zones, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the zone row identified by the given id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getZoneById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the zone row identified by the given identifier.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $identifier
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getZoneByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the zone row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getZone($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZones($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the zone rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZonesColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getZonesColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the zone rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getZonesKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lke_zone table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $identifier
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getZoneIdByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the rows of the lke_zone table bound to the given page id.
     * @param string $pageId
     * @return array
     */
    public function getZonesByPageId(string $pageId): array;

    /**
     * Returns the rows of the lke_zone table bound to the given page identifier.
     * @param string $pageIdentifier
     * @return array
     */
    public function getZonesByPageIdentifier(string $pageIdentifier): array;

    /**
     * Returns the rows of the lke_zone table bound to the given widget id.
     * @param string $widgetId
     * @return array
     */
    public function getZonesByWidgetId(string $widgetId): array;



    /**
     * Returns an array of lke_zone.id bound to the given page id.
     * @param string $pageId
     * @return array
     */
    public function getZoneIdsByPageId(string $pageId): array;


    /**
     * Returns an array of lke_zone.id bound to the given page identifier.
     * @param string $pageIdentifier
     * @return array
     */
    public function getZoneIdsByPageIdentifier(string $pageIdentifier): array;


    /**
     * Returns an array of lke_zone.identifier bound to the given page id.
     * @param string $pageId
     * @return array
     */
    public function getZoneIdentifiersByPageId(string $pageId): array;


    /**
     * Returns an array of lke_zone.identifier bound to the given page identifier.
     * @param string $pageIdentifier
     * @return array
     */
    public function getZoneIdentifiersByPageIdentifier(string $pageIdentifier): array;


    /**
     * Returns an array of lke_zone.id bound to the given widget id.
     * @param string $widgetId
     * @return array
     */
    public function getZoneIdsByWidgetId(string $widgetId): array;


    /**
     * Returns an array of lke_zone.identifier bound to the given widget id.
     * @param string $widgetId
     * @return array
     */
    public function getZoneIdentifiersByWidgetId(string $widgetId): array;




    /**
     * Returns an array of all zone ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the zone row identified by the given id.
     *
     * @param int $id
     * @param array $zone
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateZoneById(int $id, array $zone, array $extraWhere = [], array $markers = []);


    /**
     * Updates the zone row identified by the given identifier.
     *
     * @param string $identifier
     * @param array $zone
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateZoneByIdentifier(string $identifier, array $zone, array $extraWhere = [], array $markers = []);




    /**
     * Updates the zone row.
     *
     * @param array $zone
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateZone(array $zone, $where = null, array $markers = []);



    /**
     * Deletes the zone rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the zone identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteZoneById(int $id);

    /**
     * Deletes the zone identified by the given identifier.
     *
     * @param string $identifier
     * @return void
     * @throws \Exception
     */
    public function deleteZoneByIdentifier(string $identifier);



    /**
     * Deletes the zone rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteZoneByIds(array $ids);

    /**
     * Deletes the zone rows identified by the given identifiers.
     *
     * @param array $identifiers
     * @return void
     * @throws \Exception
     */
    public function deleteZoneByIdentifiers(array $identifiers);





}
