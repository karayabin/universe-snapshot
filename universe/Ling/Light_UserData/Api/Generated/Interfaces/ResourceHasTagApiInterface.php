<?php


namespace Ling\Light_UserData\Api\Generated\Interfaces;


/**
 * The ResourceHasTagApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface ResourceHasTagApiInterface
{

    /**
     * Inserts the given resourceHasTag in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $resourceHasTag
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertResourceHasTag(array $resourceHasTag, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the resourceHasTag row identified by the given resource_id and tag_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $resource_id
	 * @param int $tag_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getResourceHasTag($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getResourceHasTags($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the resourceHasTag rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getResourceHasTagsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getResourceHasTagsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getResourceHasTagsKey2Value(string $key, string $value, $where, array $markers = []);











    /**
     * Updates the resourceHasTag row identified by the given resource_id and tag_id.
     *
     * @param int $resource_id
	 * @param int $tag_id
     * @param array $resourceHasTag
     * @return void
     * @throws \Exception
     */
    public function updateResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id, array $resourceHasTag);



    /**
     * Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the resourceHasTag identified by the given resource_id and tag_id.
     *
     * @param int $resource_id
	 * @param int $tag_id
     * @return void
     * @throws \Exception
     */
    public function deleteResourceHasTagByResourceIdAndTagId(int $resource_id, int $tag_id);

    /**
     * Deletes the resourceHasTag identified by the given resource_id.
     *
     * @param int $resource_id
     * @return void
     * @throws \Exception
     */
    public function deleteResourceHasTagByResourceId(int $resource_id);

    /**
     * Deletes the resourceHasTag identified by the given tag_id.
     *
     * @param int $tag_id
     * @return void
     * @throws \Exception
     */
    public function deleteResourceHasTagByTagId(int $tag_id);



    /**
     * Deletes the resourceHasTag rows identified by the given resource_resource_ids.
     *
     * @param array $resource_ids
     * @return void
     * @throws \Exception
     */
    public function deleteResourceHasTagByResourceIds(array $resource_ids);

    /**
     * Deletes the resourceHasTag rows identified by the given tag_tag_ids.
     *
     * @param array $tag_ids
     * @return void
     * @throws \Exception
     */
    public function deleteResourceHasTagByTagIds(array $tag_ids);



}
