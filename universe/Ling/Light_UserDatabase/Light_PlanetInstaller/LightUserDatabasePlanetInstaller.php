<?php


namespace Ling\Light_UserDatabase\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;

/**
 * The LightUserDatabasePlanetInstaller class.
 */
class LightUserDatabasePlanetInstaller extends LightUserDatabaseBasePlanetInstaller
{

    /**
     * This property holds the _output for this instance.
     * @var OutputInterface
     */
    private OutputInterface $_output;


    /**
     * @implementation
     */
    public function init3(string $appDir, OutputInterface $output): void
    {
        $this->_output = $output;

        parent::init3($appDir, $output);


        $this->message("adding tables content for Ling.Light_UserDatabase." . PHP_EOL);

        /**
         * @var $exception \Exception
         */
        $exception = null;
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');

        $res = $db->transaction(function () {
            /**
             * @var $ud LightUserDatabaseService
             */
            $ud = $this->container->get('user_database');
            $factory = $ud->getFactory();


            //--------------------------------------------
            // CREATING THE DEFAULT USER GROUP
            //--------------------------------------------
            // default user group
            $this->message("insert <b>default</b> group in <b>lud_user_group</b> if it doesn't exist." . PHP_EOL);
            $defaultUserGroupId = $factory->getUserGroupApi()->insertUserGroup([
                "name" => "default",
            ]);


            //--------------------------------------------
            // CREATING ROOT USER
            //--------------------------------------------
            // root permission group
            $this->message("insert <b>root</b> in <b>lud_permission_group</b> if it doesn't exist." . PHP_EOL);
            $permGroupId = $factory->getPermissionGroupApi()->insertPermissionGroup([
                'name' => 'root',
            ]);


            // root user
            $info = $ud->getUserInfoByIdentifier("root");
            if (false === $info) {
                $this->message("insert <b>root user</b> in <b>lud_user</b>." . PHP_EOL);
                $userId = $ud->addUser([
                    'user_group_id' => $defaultUserGroupId,
                    'identifier' => 'root',
                    'pseudo' => 'root',
                    'email' => 'root@app.com',
                    'password' => 'root',
                    'avatar_url' => '',
                    'extra' => [],
                ]);

                // bind root user to root permission group
                $this->message("insert <b>root user/root permission group</b> in <b>lud_user_has_permission_group</b>." . PHP_EOL);
                $factory->getUserHasPermissionGroupApi()->insertUserHasPermissionGroup([
                    'user_id' => $userId,
                    'permission_group_id' => $permGroupId,
                ]);
            } else {
                $this->message("<b>root user</b> already found in <b>lud_user</b>, skipping." . PHP_EOL);
            }


            // the * permission
            $this->message("insert <b>*</b> in <b>lud_permission</b> if it doesn't exist." . PHP_EOL);
            $permId = $factory->getPermissionApi()->insertPermission([
                'name' => '*',
            ]);

            $this->message("insert <b>root/*</b> in <b>lud_permission_group_has_permission</b> if it doesn't exist." . PHP_EOL);
            // bind * permission to root permission group
            $factory->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermission([
                "permission_group_id" => $permGroupId,
                "permission_id" => $permId,
            ]);


        }, $exception);


        if (false === $res) {
            throw $exception;
        }

    }


    /**
     * @implementation
     */
    public function undoInit3(string $appDir, OutputInterface $output): void
    {
        $this->_output = $output;

        parent::undoInit3($appDir, $output);
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
        $this->_output->write("Ling.Light_UserDatabase: " . $message);
    }

}