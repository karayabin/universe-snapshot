<?php


namespace Ling\Light_UserData\Api\Custom;


use Ling\Light_UserData\Api\Classes\TagApi;

/**
 * The CustomTagApi class.
 */
class CustomTagApi extends TagApi
{


    /**
     * @implementation
     */
    public function removeUnusedTags(): void
    {

        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $this->pdoWrapper->transaction(function () {

            $q = "delete FROM `$this->table` t left join luda_resource_has_tag h on h.tag_id = t.id where h.tag_id is NULL";
            $this->pdoWrapper->executeStatement($q);

        }, $exception);
        if (false === $res) {
            throw $exception;
        }

    }
}