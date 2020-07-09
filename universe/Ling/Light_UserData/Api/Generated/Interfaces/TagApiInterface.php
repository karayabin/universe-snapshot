<?php


namespace Ling\Light_UserData\Api\Generated\Interfaces;


/**
 * The TagApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface TagApiInterface
{

    /**
     * Inserts the given tag in the database.
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
     * @param array $tag
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertTag(array $tag, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the tag row identified by the given id.
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
    public function getTagById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the tag row identified by the given name.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $name
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getTagByName(string $name, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the tag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getTag($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getTags($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the tag rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getTagsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getTagsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getTagsKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the luda_tag table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $name
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getTagIdByName(string $name, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the rows of the luda_tag table bound to the given resource id.
     * @param string $resourceId
     * @return array
     */
    public function getTagsByResourceId(string $resourceId): array;

    /**
     * Returns the rows of the luda_tag table bound to the given resource resource_identifier.
     * @param string $resourceResourceIdentifier
     * @return array
     */
    public function getTagsByResourceResourceIdentifier(string $resourceResourceIdentifier): array;



    /**
     * Returns an array of luda_tag.id bound to the given resource id.
     * @param string $resourceId
     * @return array
     */
    public function getTagIdsByResourceId(string $resourceId): array;


    /**
     * Returns an array of luda_tag.id bound to the given resource resource_identifier.
     * @param string $resourceResourceIdentifier
     * @return array
     */
    public function getTagIdsByResourceResourceIdentifier(string $resourceResourceIdentifier): array;


    /**
     * Returns an array of luda_tag.name bound to the given resource id.
     * @param string $resourceId
     * @return array
     */
    public function getTagNamesByResourceId(string $resourceId): array;


    /**
     * Returns an array of luda_tag.name bound to the given resource resource_identifier.
     * @param string $resourceResourceIdentifier
     * @return array
     */
    public function getTagNamesByResourceResourceIdentifier(string $resourceResourceIdentifier): array;




    /**
     * Returns an array of all tag ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the tag row identified by the given id.
     *
     * @param int $id
     * @param array $tag
     * @return void
     * @throws \Exception
     */
    public function updateTagById(int $id, array $tag);


    /**
     * Updates the tag row identified by the given name.
     *
     * @param string $name
     * @param array $tag
     * @return void
     * @throws \Exception
     */
    public function updateTagByName(string $name, array $tag);



    /**
     * Deletes the tag rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the tag identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteTagById(int $id);

    /**
     * Deletes the tag identified by the given name.
     *
     * @param string $name
     * @return void
     * @throws \Exception
     */
    public function deleteTagByName(string $name);



    /**
     * Deletes the tag rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteTagByIds(array $ids);

    /**
     * Deletes the tag rows identified by the given names.
     *
     * @param array $names
     * @return void
     * @throws \Exception
     */
    public function deleteTagByNames(array $names);



}
