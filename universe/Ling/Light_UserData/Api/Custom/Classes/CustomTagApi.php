<?php


namespace Ling\Light_UserData\Api\Custom\Classes;

use Ling\Light_UserData\Api\Generated\Classes\TagApi;
use Ling\Light_UserData\Api\Custom\Interfaces\CustomTagApiInterface;



/**
 * The CustomTagApi class.
 */
class CustomTagApi extends TagApi implements CustomTagApiInterface
{


    /**
     * Builds the CustomTagApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

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
