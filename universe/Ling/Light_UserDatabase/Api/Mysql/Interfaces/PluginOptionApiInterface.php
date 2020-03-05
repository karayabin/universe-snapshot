<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Interfaces;


/**
 * The PluginOptionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PluginOptionApiInterface
{

    /**
     * Inserts the given pluginOption in the database.
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
     * @param array $pluginOption
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPluginOption(array $pluginOption, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the pluginOption row identified by the given id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getPluginOptionById(int $id, $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param $where
     * @param array $markers
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    public function getPluginOption($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPluginOptions($where, array $markers = []);


    /**
     * Returns an array of all pluginOption ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;


    /**
     * Updates the pluginOption row identified by the given id.
     *
     * @param int $id
     * @param array $pluginOption
     * @return void
     * @throws \Exception
     */
    public function updatePluginOptionById(int $id, array $pluginOption);


    /**
     * Deletes the pluginOption identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deletePluginOptionById(int $id);



    //--------------------------------------------
    // CUSTOM
    //--------------------------------------------
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
