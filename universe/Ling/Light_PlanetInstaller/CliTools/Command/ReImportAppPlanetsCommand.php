<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\UniverseTools\PlanetTool;


/**
 * The ReImportAppPlanetsCommand class.
 *
 */
class ReImportAppPlanetsCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $uniDir = $this->application->getUniversePath();
        if (true === is_dir($uniDir)) {

            $output->write("Parsing planets from <blue>$uniDir</blue>." . PHP_EOL);
            $planetDirs = PlanetTool::getPlanetDirs($uniDir);
            foreach ($planetDirs as $planetDir) {

                list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                $planetDot = "$galaxy.$planet";
                $appDir = dirname($uniDir);

                $output->write("Re-importing $planetDot (<blue>$planetDir</blue>)." . PHP_EOL);
                PlanetTool::importPlanetByExternalDir($planetDot, $planetDir, $appDir);
            }

        } else {
            $output->write("No universe dir found (<blue>$uniDir</blue>). Nothing to do." . PHP_EOL);
        }
    }



    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getName(): string
    {
        return "reimport";
    }


    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $color = LpiFormatHelper::getConceptFmt();
        return "Launch the <$color>import command</$color> on every planet found in the app.";
    }


}