<?php


namespace Ling\Light_UserData\Api\Custom\Interfaces;

use Ling\Light_UserData\Api\Generated\Interfaces\ResourceApiInterface;


/**
 * The CustomResourceApiInterface interface.
 */
interface CustomResourceApiInterface extends ResourceApiInterface
{


    /**
     * Returns whether a resource with the given identifier exists in the database.
     *
     * @param string $resourceIdentifier
     * @return bool
     */
    public function hasResourceByResourceIdentifier(string $resourceIdentifier): bool;

    /**
     * Returns an array containing the row from the luda_resource table, augmented with the following extra properties:
     *
     * - user_identifier: string, the user identifier (from the lud_user table)
     * - files: array, of fileItems representing the file variations, each of which being an array:
     *     - id: string, the id of the attached file
     *     - path: string, the relative path of the file (relative to the user directory)
     *     - nickname: string, the nickname of the file
     *     - is_source: bool, whether this file is the source file. See the @page(source file concept in the Light_UserData conception notes) for more details.
     * - tags: array of tags (only returned if the tags option is set to true)
     *
     * If the row is not found, this method returns false.
     *
     *
     * Available options are:
     *
     * - tags: bool=false, whether to append the tags property to the returned array
     *
     *
     * @param string $resourceIdentifier
     * @param array $options
     * @return array|false
     *
     */
    public function getBaseResourceInfoByResourceIdentifier(string $resourceIdentifier, array $options = []);


    /**
     * Returns an array of information for the resource which identifier is given, or false if not found.
     * The returned array contains the following keys:
     *
     * - path: the relative path to the source file
     * - user_identifier: the identifier of the user owning this resource
     *
     *
     *
     * @param string $resourceIdentifier
     * @return array|false
     */
    public function getSourceFilePathInfoByResourceIdentifier(string $resourceIdentifier);





//
//    /**
//     * Returns the related sources of the file which identifier is given.
//     *
//     *
//     * @param string $resource_identifier
//     * @return array
//     */
//    public function getRelatedByResourceIdentifier(string $resource_identifier): array;
//
//
//
//    /**
//     * Returns the array of the ids of the @page(related files) of the resource which identifier was given.
//     *
//     * @param string $resource_identifier
//     * @return array
//     */
//    public function getRelatedIdsByResourceIdentifier(string $resource_identifier): array;
//
//
//    /**
//     * Returns the rows for the source (identified by the given resource identifier) along with its related files.
//     *
//     *
//     * @param string $resource_identifier
//     * @return array
//     */
//    public function getSourceAndRelatedByResourceIdentifier(string $resource_identifier): array;


}
