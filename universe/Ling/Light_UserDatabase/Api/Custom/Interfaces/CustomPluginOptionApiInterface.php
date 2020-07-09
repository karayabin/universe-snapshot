<?php


namespace Ling\Light_UserDatabase\Api\Custom\Interfaces;

use Ling\Light_UserDatabase\Api\Generated\Interfaces\PluginOptionApiInterface;


/**
 * The CustomPluginOptionApiInterface interface.
 */
interface CustomPluginOptionApiInterface extends PluginOptionApiInterface
{
    /**
     * Deletes all the plugin options which belongs to the given pluginName.
     *
     * Note: remember that the category column's notation is: pluginName.categoryName.
     * See the @page(Light_UserDatabase conception notes) for more details.
     *
     * @param string $pluginName
     * @return void
     */
    public function deletePluginOptionsByPluginName(string $pluginName);


    /**
     * Returns the plugin option row identified by the given category and the user id.
     *
     * @param string $category
     * @param int $userId
     * @return array
     * @throws \Exception
     */
    public function getOptionByCategoryAndUserId(string $category, int $userId): array;
}
