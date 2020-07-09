<?php


namespace Ling\Light_UserData\Api\Custom\Interfaces;

use Ling\Light_UserData\Api\Generated\Interfaces\ResourceApiInterface;


/**
 * The CustomResourceApiInterface interface.
 */
interface CustomResourceApiInterface extends ResourceApiInterface
{
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

    /**
     * Returns the related sources of the file which identifier is given.
     *
     *
     * @param string $resource_identifier
     * @return array
     */
    public function getRelatedByResourceIdentifier(string $resource_identifier): array;



    /**
     * Returns the array of the ids of the @page(related files) of the resource which identifier was given.
     *
     * @param string $resource_identifier
     * @return array
     */
    public function getRelatedIdsByResourceIdentifier(string $resource_identifier): array;


    /**
     * Returns the rows for the source (identified by the given resource identifier) along with its related files.
     *
     *
     * @param string $resource_identifier
     * @return array
     */
    public function getSourceAndRelatedByResourceIdentifier(string $resource_identifier): array;


}
