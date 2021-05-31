<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiImporterHelper;
use Ling\Light_PlanetInstaller\Helper\LpiWebHelper;
use Ling\Uni2\Helper\DependencyMasterHelper;


/**
 * The ImportLingUniverseCommand class.
 *
 */
class ImportLingUniverseCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the ImportLingUniverseCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {
        $retCode = 0;
        $dstUniverseDir = $input->getParameter(2);
        $skipExisting = $input->hasFlag("skip-existing");

        if (null !== $dstUniverseDir) {


            $importer = LpiImporterHelper::getImporterByGalaxy("Ling");

            $arr = DependencyMasterHelper::getDependencyMasterArrayFromWeb();
            if (false !== $arr) {
                $planets = $arr["galaxies"]['Ling'];

                $count = count($planets);
                $int = 0;
                foreach ($planets as $planet => $info) {
                    $int++;
                    $dstPlanetDir = $dstUniverseDir . "/$planet";
                    $planetIdentifier = "Ling/$planet";
                    $planetDotName = "Ling.$planet";


                    if (true === is_dir($dstPlanetDir)) {
                        if (true === $skipExisting) {
                            $output->write("- $int/$count: Planet <b>$planetDotName</b> already there, skipping (<blue>$dstPlanetDir</blue>)." . PHP_EOL);
                            continue;
                        }
                        FileSystemTool::remove($dstPlanetDir);
                    }
                    $lastVersion = LpiWebHelper::getPlanetCurrentVersion($planetDotName);
                    $warnings = [];
                    $importer->importItem($planetIdentifier, $lastVersion, $dstPlanetDir, $warnings);
                    $output->write("- $int/$count: Import <b>$planetDotName:$lastVersion</b> from web to: <red>$dstPlanetDir</red>" . PHP_EOL);

                    foreach ($warnings as $message) {
                        $output->write("<warning>warning from the web importer:" . $message . "</warning>" . PHP_EOL);
                    }
                }


                $output->write("<success>The planets have been imported. Have fun!</success>" . PHP_EOL);

            } else {
                $output->write("<error>Cannot fetch the <b>uni dependency master file</b>. Do you have an internet connection?</error>" . PHP_EOL);
            }

        } else {
            $output->write("<error>Missing <b>destination dir</b> argument.</error>" . PHP_EOL);
            $retCode = 1;
        }
        return $retCode;
    }


    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return "
 Imports all the planets from the ling galaxy to your machine.
 ";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "dstUniverseDir" => [
                " the path to the universe directory to import the planets into.",
                true,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "skip-existing" => " if set, will only import the planet if it doesn't already exist. Otherwise (by default), existing planets are replaced entirely.",
        ];
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "import_ling_universe" => "lpi import_ling_universe",
        ];
    }


}