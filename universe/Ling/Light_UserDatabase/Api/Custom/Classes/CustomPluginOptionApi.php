<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\PluginOptionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPluginOptionApiInterface;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The CustomPluginOptionApi class.
 */
class CustomPluginOptionApi extends PluginOptionApi implements CustomPluginOptionApiInterface
{


    /**
     * Builds the CustomPluginOptionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @implementation
     */
    public function deletePluginOptionsByPluginName(string $planetDotName)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("category")->startsWith($planetDotName . "."));
    }

    /**
     * @implementation
     */
    public function getOptionByCategoryAndUserId(string $category, int $userId): array
    {
        $q = "
        select o.* from lud_plugin_option o
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=o.id
        inner join lud_user_group g on g.id=h.user_group_id
        inner join lud_user u on u.user_group_id=g.id
        where u.id = $userId 
        ";
        $res = $this->pdoWrapper->fetch($q);
        if (false === $res) {
            throw new LightUserDatabaseException("Plugin option not found with category \"$category\" and user id \"$userId\".");
        }
        return $res;
    }

}
