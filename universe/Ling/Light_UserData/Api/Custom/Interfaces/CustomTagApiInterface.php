<?php


namespace Ling\Light_UserData\Api\Custom\Interfaces;


use Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface;

/**
 * The CustomTagApiInterface interface.
 */
interface CustomTagApiInterface extends TagApiInterface
{
    /**
     * This cleaning routing removes all tags from the luda_tag table not bound to any resource.
     *
     *
     * @return void
     */
    public function removeUnusedTags(): void;
}
