<?php


namespace Ling\Light_UserData\Api;


/**
 * The ResourceHasTagApiInterface interface.
 */
interface ResourceHasTagApiInterface
{

    /**
     * Returns the resourceHasTag row identified by the given luda_resource_id and luda_tag_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $luda_resource_id
	 * @param int $luda_tag_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getResourceHasTagByLudaResourceIdAndLudaTagId(int $luda_resource_id, int $luda_tag_id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Updates the resourceHasTag row identified by the given luda_resource_id and luda_tag_id.
     *
     * @param int $luda_resource_id
	 * @param int $luda_tag_id
     * @param array $resourceHasTag
     * @return void
     * @throws \Exception
     */
    public function updateResourceHasTagByLudaResourceIdAndLudaTagId(int $luda_resource_id, int $luda_tag_id, array $resourceHasTag);

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
     * Deletes the resourceHasTag identified by the given luda_resource_id and luda_tag_id.
     *
     * @param int $luda_resource_id
	 * @param int $luda_tag_id
     * @return void
     * @throws \Exception
     */
    public function deleteResourceHasTagByLudaResourceIdAndLudaTagId(int $luda_resource_id, int $luda_tag_id);
}
