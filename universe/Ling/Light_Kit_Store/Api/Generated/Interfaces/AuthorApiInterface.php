<?php


namespace Ling\Light_Kit_Store\Api\Generated\Interfaces;


/**
 * The AuthorApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface AuthorApiInterface
{


    /**
     * Inserts the given author in the database.
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
     * @param array $author
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertAuthor(array $author, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given author rows in the database.
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
     * @param array $authors
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertAuthors(array $authors, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the author row identified by the given id.
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
    public function getAuthorById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the author row identified by the given author_name.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $author_name
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getAuthorByAuthorName(string $author_name, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the author row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getAuthor($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getAuthors($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the author rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getAuthorsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getAuthorsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the author rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getAuthorsKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lks_author table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $author_name
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getAuthorIdByAuthorName(string $author_name, $default = null, bool $throwNotFoundEx = false);









    /**
     * Returns an array of all author ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the author row identified by the given id.
     *
     * @param int $id
     * @param array $author
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateAuthorById(int $id, array $author, array $extraWhere = [], array $markers = []);


    /**
     * Updates the author row identified by the given author_name.
     *
     * @param string $author_name
     * @param array $author
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateAuthorByAuthorName(string $author_name, array $author, array $extraWhere = [], array $markers = []);




    /**
     * Updates the author row.
     *
     * @param array $author
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateAuthor(array $author, $where = null, array $markers = []);



    /**
     * Deletes the author rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the author identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteAuthorById(int $id);

    /**
     * Deletes the author identified by the given author_name.
     *
     * @param string $author_name
     * @return void
     * @throws \Exception
     */
    public function deleteAuthorByAuthorName(string $author_name);



    /**
     * Deletes the author rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteAuthorByIds(array $ids);

    /**
     * Deletes the author rows identified by the given author_names.
     *
     * @param array $author_names
     * @return void
     * @throws \Exception
     */
    public function deleteAuthorByAuthorNames(array $author_names);





}
