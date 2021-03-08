<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Service\LightPlanetInstallerService;
use Ling\UniverseTools\PlanetTool;


/**
 * The PostMapCommand class.
 *
 */
class PostMapCommand extends LightPlanetInstallerProprietaryCommand
{


    /**
     * @overrides
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {
        $appDir = $this->application->getApplicationDirectory();
        $uniDir = $appDir . "/universe";
        $planetDotName = $input->getParameter(2);


        $pis = $this->container->get("planet_installer");


        if (null === $planetDotName) {
            $planetDotNames = PlanetTool::getPlanetDotNames($uniDir);
            foreach ($planetDotNames as $planetDotName) {
                $this->postMapByPlanetDotName($planetDotName, $pis, $output);
            }
        } else {
            $this->postMapByPlanetDotName($planetDotName, $pis, $output);
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
        return " Executes the <b>post assets/map</b> step of the <b>install</b> command for all the planets in the app,
 or a specific planet if specified.
 This command is usually just for me, I used it while building the tools, to update an existing app.";
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
                " the <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to execute the post map phase for.",
                false,
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
            "post_map" => "lpi post_map",
        ];
    }

}