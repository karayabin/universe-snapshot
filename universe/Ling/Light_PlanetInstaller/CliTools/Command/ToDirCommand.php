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

        if (true === $this->checkInsideAppDir($input, $output)) {


            $verbose = true;

            $appDir = getcwd();
            $uniDir = $appDir . "/universe";
            $planetDirs = PlanetTool::getPlanetDirs($uniDir);
            $localUniverse = LocalUniverseTool::getLocalUniversePath();
            if (true === is_dir($localUniverse)) {

                $nbPlanets = count($planetDirs);
                $x = 0;

                foreach ($planetDirs as $planetDir) {
                    $x++;
                    $s = "$x/$nbPlanets";


                    $planetDotName = PlanetTool::getPlanetDotNameByPlanetDir($planetDir);


                    if (true === is_link($planetDir)) {


                        $localPlanetDir = LocalUniverseTool::getPlanetDir($planetDotName);
                        if (null !== $localPlanetDir) {

                            if (true === $verbose) {
                                $output->write("$s: Copying <b:red>$planetDotName</b:red> from local universe to application." . PHP_EOL);
                            }


                            FileSystemTool::remove($planetDir);
                            FileSystemTool::copyDir($localPlanetDir, $planetDir);


                        } else {
                            $output->write("<warning>$s: Planet <b>$planetDotName</b> not found in the local universe, skipping.</warning>" . PHP_EOL);
                        }
                    } else {
                        $output->write("$s: <b>$planetDotName</b> is already a dir, skipping." . PHP_EOL);
                    }
                }


            } else {
                $output->write("<warning>No local universe found, aborting.</warning>" . PHP_EOL);
            }

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
        return "todir";
    }

    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return "
 Converts the planets of the app to directories. See more details in the <$co>todir and tolink section</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#todir-and-tolink</$url>).
 ";
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