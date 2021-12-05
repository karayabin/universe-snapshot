<?php


namespace Ling\Light_Database\Light_PlanetInstaller;


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\Helper\ZFileHelper;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_Logger\Helper\LightLoggerHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit1HookInterface;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightDatabasePlanetInstaller class.
 */
class LightDatabasePlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit1HookInterface, LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init1(string $appDir, OutputInterface $output, array $options = []): void
    {


        //--------------------------------------------
        // ZZZ FILE
        //--------------------------------------------
        $propKey = '$database\.methods\.init\.settings';
        if (false === ZFileHelper::hasProp($appDir, $propKey)) {

            $output->write(PHP_EOL);

            $output->write("You are installing Light_Database planet. Please provide your database credentials." . PHP_EOL);
            $output->write("Note: you need to create the database before starting this process (otherwise it won't work)." . PHP_EOL);
            $database = QuestionHelper::ask($output, "1/3: What's the name of your database? ");
            $user = QuestionHelper::ask($output, "2/3: What's the name of the database user? ");
            $pass = QuestionHelper::ask($output, "3/3: What's the password of the database user? ");


            ZFileHelper::setProp($appDir, $propKey, [
                'pdo_database' => $database,
                'pdo_user' => $user,
                'pdo_pass' => $pass,
                'pdo_options' => [
                    'persistent' => true,
                    'errmode' => "exception",
                    'initCommand' => "SET NAMES 'UTF8'",
                ],
            ]);


            $zPath = ZFileHelper::getZPath($appDir);
            $output->write("<success>The <b>Ling.Light_Database</b> custom conf has been updated (in $zPath).</success>" . PHP_EOL);
        } else {
            $output->write("<success>zzz file already up to date.</success>" . PHP_EOL);
        }


    }


    /**
     * @implementation
     */
    public function undoInit1(string $appDir, OutputInterface $output, array $options = []): void
    {


        //--------------------------------------------
        // ZZZ FILE
        //--------------------------------------------
        $propKey = '$database\.methods\.init\.settings';
        $zPath = ZFileHelper::getZPath($appDir);
        if (true === ZFileHelper::hasProp($appDir, $propKey)) {
            ZFileHelper::setProp($appDir, $propKey, []);
            $output->write("<success>The <b>Ling.Light_Database</b> custom conf has been removed from <blue>$zPath</blue> successfully.</success>" . PHP_EOL);
        } else {
            $output->write("The <b>Ling.Light_Database</b> custom conf was not found in <blue>$zPath</blue>, nothing to do." . PHP_EOL);
        }

    }


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Database";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: registering open events...");
        LightEventsHelper::registerOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // logger
        //--------------------------------------------
        $output->write("$planetDotName: registering Ling.Light_Logger listeners to open system...");
        LightLoggerHelper::copyListenersFromPluginToMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Database";
        //--------------------------------------------
        // events
        //--------------------------------------------
        $output->write("$planetDotName: unregistering open events...");
        LightEventsHelper::unregisterOpenEventByPlanet($this->container, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);


        //--------------------------------------------
        // logger
        //--------------------------------------------
        $output->write("$planetDotName: unregistering Ling.Light_Logger listeners from open system...");
        LightLoggerHelper::removeListenersFromMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }

}