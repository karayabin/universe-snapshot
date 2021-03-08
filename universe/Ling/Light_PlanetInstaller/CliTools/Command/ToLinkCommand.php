<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The ToLinkCommand class.
 *
 */
class ToLinkCommand extends LightPlanetInstallerBaseCommand
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
                if (false === is_link($planetDir)) {

                    $planetDotName = PlanetTool::getPlanetDotNameByPlanetDir($planetDir);
                    $localPlanetDir = LocalUniverseTool::getPlanetDir($planetDotName);
                    if (null !== $localPlanetDir) {
                        FileSystemTool::remove($planetDir);
                        symlink($localPlanetDir, $planetDir);
                        if (true === $verbose) {
                            $output->write("Creating link for <b>$planetDotName</b>." . PHP_EOL);
                        }

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
        return " converts all the planets of the current app to symlinks to the <$co>local universe</$co>(<$url>https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe</$url>).
 Beware, this command actually removes the existing planets before creating the symlinks.
 Note: if there is not corresponding planet in the <b>local universe</b>, the conversion is not done (and the planet not removed). 
 This command does the opposite of the <b>todir</b> command.";
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
            "tolink" => "lpi tolink",
        ];
    }


}