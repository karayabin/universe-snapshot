<?php


namespace Ling\Light_UserData\Api;


/**
 * The ResourceApiInterface interface.
 */
interface ResourceApiInterface
{

    /**
     * Inserts the given resource in the database.
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
     * @param array $resource
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertResource(array $resource, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the resource row identified by the given id.
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
    public function getResourceById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the resource row identified by the given real_path.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $real_path
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getResourceByRealPath(string $real_path, $default = null, bool $throwNotFoundEx = false);




    /**
     * Updates the resource row identified by the given id.
     *
     * @param int $id
     * @param array $resource
     * @return void
     * @throws \Exception
     */
    public function updateResourceById(int $id, array $resource);


    /**
     * Updates the resource row identified by the given real_path.
     *
     * @param string $real_path
     * @param array $resource
     * @return void
     * @throws \Exception
     */
    public function updateResourceByRealPath(string $real_path, array $resource);



    /**
     * Deletes the resource identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteResourceById(int $id);

    /**
     * Deletes the resource identified by the given real_path.
     *
     * @param string $real_path
     * @return void
     * @throws \Exception
     */
    public function deleteResourceByRealPath(string $real_path);



}
