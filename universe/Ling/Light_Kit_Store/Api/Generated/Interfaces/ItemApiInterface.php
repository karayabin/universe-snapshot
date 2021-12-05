<?php


namespace Ling\Light_Kit_Store\Api\Generated\Interfaces;


/**
 * The ItemApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface ItemApiInterface
{


    /**
     * Inserts the given item in the database.
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
     * @param array $item
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertItem(array $item, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given item rows in the database.
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
     * @param array $items
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertItems(array $items, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the item row identified by the given id.
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
    public function getItemById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the item row identified by the given provider and identifier.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $provider
	 * @param string $identifier
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getItemByProviderAndIdentifier(string $provider, string $identifier, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the item row identified by the given reference.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $reference
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getItemByReference(string $reference, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the item row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getItem($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getItems($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the item rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getItemsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getItemsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the item rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getItemsKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lks_item table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $provider
	 * @param string $identifier
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getItemIdByProviderAndIdentifier(string $provider, string $identifier, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the id of the lks_item table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $reference
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getItemIdByReference(string $reference, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the rows of the lks_item matching the given authorId.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param string $authorId
     * @param array $components
     * @return array
     */
    public function getItemsByAuthorId(string $authorId, array $components = []): array;








    /**
     * Returns an array of all item ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the item row identified by the given id.
     *
     * @param int $id
     * @param array $item
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateItemById(int $id, array $item, array $extraWhere = [], array $markers = []);


    /**
     * Updates the item row identified by the given provider and identifier.
     *
     * @param string $provider
	 * @param string $identifier
     * @param array $item
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateItemByProviderAndIdentifier(string $provider, string $identifier, array $item, array $extraWhere = [], array $markers = []);


    /**
     * Updates the item row identified by the given reference.
     *
     * @param string $reference
     * @param array $item
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateItemByReference(string $reference, array $item, array $extraWhere = [], array $markers = []);




    /**
     * Updates the item row.
     *
     * @param array $item
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateItem(array $item, $where = null, array $markers = []);



    /**
     * Deletes the item rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the item identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteItemById(int $id);

    /**
     * Deletes the item identified by the given provider and identifier.
     *
     * @param string $provider
	 * @param string $identifier
     * @return void
     * @throws \Exception
     */
    public function deleteItemByProviderAndIdentifier(string $provider, string $identifier);

    /**
     * Deletes the item identified by the given reference.
     *
     * @param string $reference
     * @return void
     * @throws \Exception
     */
    public function deleteItemByReference(string $reference);



    /**
     * Deletes the item rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteItemByIds(array $ids);

    /**
     * Deletes the item rows identified by the given providers.
     *
     * @param array $providers
     * @return void
     * @throws \Exception
     */
    public function deleteItemByProvidersAndIdentifiers(array $providers);

    /**
     * Deletes the item rows identified by the given references.
     *
     * @param array $references
     * @return void
     * @throws \Exception
     */
    public function deleteItemByReferences(array $references);





    /**
     * Deletes the item rows having the given author id.
     * @param int $authorId
     */
    public function deleteItemByAuthorId(int $authorId);

}
