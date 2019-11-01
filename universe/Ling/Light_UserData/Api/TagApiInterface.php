<?php


namespace Ling\Light_UserData\Api;


/**
 * The TagApiInterface interface.
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



}
