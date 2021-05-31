<?php


namespace Ling\Light_UserData\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;
use Ling\Light_UserDatabase\Light_PlanetInstaller\LightUserDatabaseBasePlanetInstaller;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The LightUserDataPlanetInstaller class.
 */
class LightUserDataPlanetInstaller extends LightUserDatabaseBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{

    /**
     * This property holds the _output for this instance.
     * @var OutputInterface
     */
    private OutputInterface $_output;


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output): void
    {
        $planetDotName = "Ling.Light_UserData";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output): void
    {
        $planetDotName = "Ling.Light_UserData";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: unregistering open events...");
        LightEventsHelper::unregisterOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


    /**
     * @overrides
     */
    public function init3(string $appDir, OutputInterface $output): void
    {

        $this->_output = $output;

        parent::init3($appDir, $output);


        /**
         * However for the part below, we can put all the statements in a transaction.
         */
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $this->message("adding tables content." . PHP_EOL);


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

            $this->message("adding <b>Ling.Light_UserData.MSC/default</b> option in <b>lud_plugin_option</b>  if it doesn't exist." . PHP_EOL);
            $optionId = $factory->getPluginOptionApi()->insertPluginOption([
                "category" => 'Ling.Light_UserData.MSC',
                "name" => 'default',
                "value" => '20M',
                "description" => "The maximum storage capacity for the \"default\" user. Example: 20M, 50M, etc.",
            ]);


//            $this->message("adding <b>default group/Ling.Light_UserData.MSC</b> in <b>lud_user_group_has_plugin_option</b>  if it doesn't exist." . PHP_EOL);
//            $factory->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
//                'user_group_id' => $factory->getUserGroupApi()->getUserGroupIdByName('default'),
//                'plugin_option_id' => $optionId,
//            ]);


            /**
             * @var $userDb LightUserDatabaseService
             */
            $lud = $this->container->get("user_database");

            /**
             * Solving hook problem...
             * https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#warning-with-hooks
             */
//            if (true === $lud->pluginOptionTablesAreReady()) {
            $api = $lud->getFactory();
            $ids = $api->getUserGroupApi()->getAllIds();
            $w = Where::inst()->key("category")->equals("Ling.Light_UserData.MSC")->and()->key("name")->equals("default");
            $row = $api->getPluginOptionApi()->getPluginOption($w, [], null, true);
            $pluginOptionId = $row['id'];


            if ($ids) {

                foreach ($ids as $id) {
                $this->message("binding <b>Ling.Light_UserData.MSC/default</b> to group with id=$id from <b>lud_user_group</b> in <b>lud_user_group_has_plugin_option</b>." . PHP_EOL);
                    $api->getUserGroupHasPluginOptionApi()->insertUserGroupHasPluginOption([
                        'user_group_id' => $id,
                        'plugin_option_id' => $pluginOptionId,
                    ]);
                }
            }
//            }

        }, $exception);

        if (false === $res) {
            throw $exception;
        }

    }




    /**
     * @overrides
     */
    public function undoInit3(string $appDir, OutputInterface $output): void
    {

        $this->_output = $output;

        parent::undoInit3($appDir, $output);


        /**
         * However for the part below, we can put all the statements in a transaction.
         */
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $this->message("removing tables content." . PHP_EOL);


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

            $this->message("removing <b>Ling.Light_UserData.MSC/default</b> from <b>lud_plugin_option</b>  if it exists." . PHP_EOL);
            $factory->getPluginOptionApi()->deletePluginOptionsByPluginName('Ling.Light_UserData');



        }, $exception);

        if (false === $res) {
            throw $exception;
        }

    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the output, assuming it's set.
     * @param string $message
     */
    private function message(string $message)
    {
        $this->_output->write("Ling.Light_UserData: " . $message);
    }

}