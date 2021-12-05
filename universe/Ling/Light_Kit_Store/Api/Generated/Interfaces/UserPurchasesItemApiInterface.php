<?php


namespace Ling\Light_Kit_Store\Api\Generated\Interfaces;


/**
 * The UserPurchasesItemApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserPurchasesItemApiInterface
{


    /**
     * Inserts the given user purchases item in the database.
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
     * @param array $userPurchasesItem
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserPurchasesItem(array $userPurchasesItem, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given user purchases item rows in the database.
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
     * @param array $userPurchasesItems
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserPurchasesItems(array $userPurchasesItems, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the user purchases item row identified by the given id.
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
    public function getUserPurchasesItemById(int $id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the userPurchasesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getUserPurchasesItem($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserPurchasesItems($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the userPurchasesItem rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserPurchasesItemsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getUserPurchasesItemsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the userPurchasesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserPurchasesItemsKey2Value(string $key, string $value, $where, array $markers = []);




    /**
     * Returns the rows of the lks_user_purchases_item matching the given userId.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param string $userId
     * @param array $components
     * @return array
     */
    public function getUserPurchasesItemsByUserId(string $userId, array $components = []): array;


    /**
     * Returns the rows of the lks_user_purchases_item matching the given itemId.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param string $itemId
     * @param array $components
     * @return array
     */
    public function getUserPurchasesItemsByItemId(string $itemId, array $components = []): array;








    /**
     * Returns an array of all userPurchasesItem ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the user purchases item row identified by the given id.
     *
     * @param int $id
     * @param array $userPurchasesItem
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUserPurchasesItemById(int $id, array $userPurchasesItem, array $extraWhere = [], array $markers = []);




    /**
     * Updates the user purchases item row.
     *
     * @param array $userPurchasesItem
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUserPurchasesItem(array $userPurchasesItem, $where = null, array $markers = []);



    /**
     * Deletes the userPurchasesItem rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the user purchases item identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteUserPurchasesItemById(int $id);



    /**
     * Deletes the user purchases item rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteUserPurchasesItemByIds(array $ids);





    /**
     * Deletes the user purchases item rows having the given user id.
     * @param int $userId
     */
    public function deleteUserPurchasesItemByUserId(int $userId);

    /**
     * Deletes the user purchases item rows having the given item id.
     * @param int $itemId
     */
    public function deleteUserPurchasesItemByItemId(int $itemId);

}
