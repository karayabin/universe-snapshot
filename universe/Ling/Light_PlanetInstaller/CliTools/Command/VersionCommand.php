<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper;
use Ling\UniverseTools\PlanetTool;
use Ling\UniverseTools\Util\StandardReadmeUtil;


/**
 * The VersionCommand class.
 *
 */
class VersionCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $this->checkInsideAppDir($output);
        $planetDotName = $input->getParameter(2);


        if (null !== $planetDotName) {

            $appDir = $this->application->getApplicationDirectory();
            $planetDir = PlanetTool::getPlanetDirByPlanetDotName($planetDotName, $appDir);
            if (true === is_dir($planetDir)) {
                $u = new LpiDependenciesHelper();

                $items = $u->getLpiDepsFileDependenciesByPlanetDir($planetDir);
                if (false !== $items) {
                    $versions = array_keys($items);
                    $source = "the lpi-deps.byml file";

                } else {
                    $versions = StandardReadmeUtil::getReadmeVersionsByPlanetDir($planetDir);
                    $source = "the README.md file, as no lpi-deps.byml was found";
                }


                $output->write("Versions found (from $source):" . PHP_EOL);
                foreach ($versions as $version) {
                    $output->write("- $version" . PHP_EOL);
                }


            } else {
                $output->write("<error>Planet dir not found: $planetDir. Aborting.</error>." . PHP_EOL);
            }
        } else {
            $output->write("<error>Parameter planetDotName not specified. Aborting.</error>." . PHP_EOL);
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
        return " lists the available versions for the given planet.
 The information is first fetched from the <$co>local universe</$co>(<$url>https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe</$url>) if available, and then from the web if not.";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "planetDotName" => [
                " the <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) to get the versions for.",
                true,
            ],
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
            "version" => "lpi version",
        ];
    }

}