<?php


namespace Ling\Light_Database\Light_PlanetInstaller;


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\Helper\ZFileHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;


/**
 * The LightDatabasePlanetInstaller class.
 */
class LightDatabasePlanetInstaller extends LightBasePlanetInstaller
{


    /**
     * @overrides
     */
    public function onMapCopyAfter(string $appDir, OutputInterface $output): void
    {

        $propKey = '$database\.methods\.init\.settings';
        if (false === ZFileHelper::hasProp($this->container, $propKey)) {

            $output->write("You are installing Light_Database planet. Please provide your database credentials." . PHP_EOL);
            $database = QuestionHelper::ask($output, "1/3: What's the name of your database? ");
            $user = QuestionHelper::ask($output, "2/3: What's the name of the database user? ");
            $pass = QuestionHelper::ask($output, "3/3: What's the password of the database user? ");


            ZFileHelper::setProp($this->container, $propKey, [
                'pdo_database' => $database,
                'pdo_user' => $user,
                'pdo_pass' => $pass,
                'pdo_options' => [
                    'persistent' => true,
                    'errmode' => "exception",
                    'initCommand' => "SET NAMES 'UTF8'",
                ],
            ]);


            $zPath = ZFileHelper::getZPath($this->container);
            $output->write("<success>The Light_Database custom conf has been updated (in $zPath)</success>" . PHP_EOL);
        }

    }


}