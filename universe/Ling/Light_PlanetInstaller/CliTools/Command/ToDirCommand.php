<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The ToDirCommand class.
 *
 */
class ToDirCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $verbose = $input->hasFlag("v");

        $appDir = $this->application->getApplicationDirectory();
        $uniDir = $appDir . "/universe";
        $planetDirs = PlanetTool::getPlanetDirs($uniDir);
        $localUniverse = LocalUniverseTool::getLocalUniversePath();
        if (true === is_dir($localUniverse)) {


            foreach ($planetDirs as $planetDir) {
                if (true === is_link($planetDir)) {


                    $planetDotName = PlanetTool::getPlanetDotNameByPlanetDir($planetDir);
                    $localPlanetDir = LocalUniverseTool::getPlanetDir($planetDotName);
                    if (null !== $localPlanetDir) {

                        if (true === $verbose) {
                            $output->write("Copying $planetDotName from local universe to application." . PHP_EOL);
                        }


                        FileSystemTool::remove($planetDir);
                        FileSystemTool::copyDir($localPlanetDir, $planetDir);


                    } else {
                        $output->write("<warning>Planet <b>$planetDotName</b> not found in the local universe, skipping.</warning>" . PHP_EOL);
                    }
                }
            }


        } else {
            $output->write("<warning>No local universe found, skipping.</warning>" . PHP_EOL);
        }


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
        return " converts all the symlinks of the current app to real dirs.
 It does so by copying the real dirs from the <$co>local universe</$co>(<$url>https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe</$url>),
 and pasting them into the app.
 This command does the opposite of the <b>tolink</b> command. ";
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "v" => " verbose, whether to use verbose mode",
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
            "todir" => "lpi todir",
        ];
    }

}