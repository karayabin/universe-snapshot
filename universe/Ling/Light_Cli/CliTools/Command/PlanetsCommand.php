<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The PlanetsCommand class.
 *
 *
 *
 */
class PlanetsCommand extends LightCliDocCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $uniDir = $this->application->getCurrentDirectory() . "/universe";
        if (true === is_dir($uniDir)) {


            $lightOnly = $input->hasFlag("l");

            $n = 0;
            $planetDirs = PlanetTool::getPlanetDirs($uniDir);
            foreach ($planetDirs as $planetDir) {
                list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);

                if (true === $lightOnly && false === str_starts_with($planet, "Light_")) {
                    continue;
                }


                $n++;

                $version = MetaInfoTool::getVersion($planetDir);
                $output->write("$galaxy.$planet: $version" . PHP_EOL);
            }


            $output->write("$n elements displayed." . PHP_EOL);
        } else {
            $this->errorMsg("Universe dir not found in: $uniDir." . PHP_EOL);

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
        return " lists all planets found in the current application, along with their current version numbers";
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "l" => " display only light planets ",
        ];
    }

}