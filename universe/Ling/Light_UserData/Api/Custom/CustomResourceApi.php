<?php


namespace Ling\Light_UserData\Api\Custom;


use Ling\Light_UserData\Api\Classes\ResourceApi;

/**
 * The CustomResourceApi class.
 */
class CustomResourceApi extends ResourceApi
{

    /**
     * @implementation
     */
    public function getResourceInfoByResourceIdentifier(string $resource_identifier, $default = null, bool $throwNotFoundEx = false)
    {

        $ret = $this->pdoWrapper->fetch("
        select r.*, u.identifier as user_identifier  from `$this->table` r
        inner join lud_user u on u.id=r.lud_user_id 
         
         where resource_identifier=:resource_identifier", [
            "resource_identifier" => $resource_identifier,

        ]);

        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with resource_identifier=$resource_identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


}