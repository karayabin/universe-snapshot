<?php


namespace Ling\Light_UserData\Light_PluginInstaller;


use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_UserDatabase\Light_PluginInstaller\LightUserDatabaseBasePluginInstaller;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The LightUserDataPluginInstaller class.
 */
class LightUserDataPluginInstaller extends LightUserDatabaseBasePluginInstaller
{

    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function install()
    {
        parent::install();


        /**
         * However for the part below, we can put all the statements in a transaction.
         */
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $this->debugMsg("user_data: adding tables content." . PHP_EOL);


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get('database');
        $res = $db->transaction(function () {

            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $factory = $userDb->getFactory();
            $optionId = $factory->getPluginOptionApi()->insertPluginOption([
                "category" => 'Ling.Light_UserData.MSC',
                "name" => 'default',
                "value" => '20M',
                "description" => "The maximum storage capacity for the \"default\" user. Example: 20M, 50M, etc.",
            ]);


            $factory->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                'user_group_id' => $factory->getUserGroupApi()->getUserGroupIdByName('default'),
                'plugin_option_id' => $optionId,
            ]);


            /**
             * @var $userDb LightUserDatabaseService
             */
            $lud = $this->container->get("user_database");

            /**
             * Solving hook problem...
             * https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#warning-with-hooks
             */
            if (true === $lud->pluginOptionTablesAreReady()) {

                $api = $lud->getFactory();
                $ids = $api->getUserGroupApi()->getAllIds();
                $w = Where::inst()->key("category")->equals("Ling.Light_UserData.MSC")->and()->key("name")->equals("default");
                $row = $api->getPluginOptionApi()->getPluginOption($w, [], null, true);
                $pluginOptionId = $row['id'];


                foreach ($ids as $id) {
                    $api->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                        'user_group_id' => $id,
                        'plugin_option_id' => $pluginOptionId,
                    ]);
                }
            }

        }, $exception);

        if (false === $res) {
            throw $exception;
        }

    }


    /**
     * @overrides
     */
    public function uninstall()
    {


        parent::uninstall();

        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');
        $util = $db->getMysqlInfoUtil();
        if (true === $util->hasTable("lud_plugin_option")) {


            $this->debugMsg("user_data: removing plugin option starting with Light_UserData." . PHP_EOL);
            /**
             * @var $exception \Exception
             */
            $exception = null;
            $res = $db->transaction(function () {


                /**
                 * @var $userDb LightUserDatabaseService
                 */
                $userDb = $this->container->get("user_database");


                $factory = $userDb->getFactory();
                //--------------------------------------------
                // REMOVING THE OPTIONS
                //--------------------------------------------
                $factory->getPluginOptionApi()->deletePluginOptionsByPluginName('Light_UserData');


            }, $exception);

            if (false === $res) {
                throw $exception;
            }
        }

    }


    /**
     * @overrides
     */
    public function getDependencies(): array
    {
        return [
            "Ling.Light_UserDatabase",
        ];
    }



    //--------------------------------------------
    // TableScopeAwareInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getTableScope(): array
    {
        return [
            "luda_tag",
            "luda_resource",
            "luda_resource_has_tag",
            "luda_resource_file",
        ];
    }


}