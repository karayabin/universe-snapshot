<?php


namespace Ling\Light_UserData\Api\Custom\Interfaces;

use Ling\Light_UserData\Api\Generated\Interfaces\ResourceFileApiInterface;


/**
 * The CustomResourceFileApiInterface interface.
 */
interface CustomResourceFileApiInterface extends ResourceFileApiInterface
{


    /**
     *
     * Returns the array of resource file rows matching the given components.
     * * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     *
     * @param string $userId
     * @param array $components
     * @return array
     */
    public function fetchAllByUserId(string $userId, array $components = []): array;

}
