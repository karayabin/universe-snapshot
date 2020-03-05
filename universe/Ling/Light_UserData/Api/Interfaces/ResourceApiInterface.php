<?php


namespace Ling\Light_UserData\Api\Interfaces;


/**
 * The ResourceApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
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
     * Returns the resource row identified by the given resource_identifier.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $resource_identifier
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getResourceByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getResource($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getResources($where, array $markers = []);


    /**
     * Returns the id of the luda_resource table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $resource_identifier
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getResourceIdByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false);







    /**
     * Returns an array of all resource ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



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
     * Updates the resource row identified by the given resource_identifier.
     *
     * @param string $resource_identifier
     * @param array $resource
     * @return void
     * @throws \Exception
     */
    public function updateResourceByResourceIdentifier(string $resource_identifier, array $resource);



    /**
     * Deletes the resource identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteResourceById(int $id);

    /**
     * Deletes the resource identified by the given resource_identifier.
     *
     * @param string $resource_identifier
     * @return void
     * @throws \Exception
     */
    public function deleteResourceByResourceIdentifier(string $resource_identifier);


    //--------------------------------------------
    // CUSTOM
    //--------------------------------------------
    /**
     * Returns the resource info identified by the given resource_identifier.
     *
     * The resource info is the resource row, with the additional extra-fields:
     * - user_identifier: the user identifier
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $resource_identifier
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getResourceInfoByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false);

}
