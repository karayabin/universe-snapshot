<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Input\WritableCommandLineInput;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFileHelper;


/**
 * The UpgradeCommand class.
 *
 */
class UpgradeCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * Builds the UpgradeCommand instance.
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
        $this->checkInsideAppDir($output);


        $planetDotName = $input->getParameter(2);


        /**
         * First rewrite lpi deps, then upgrade from lpi deps.
         */


        try {


            if (null !== $planetDotName) {
                $sPlanet = "for planet <b>$planetDotName</b>.";
            } else {
                $sPlanet = "for all planets.";
            }
            $output->write("Upgrading application's lpi.byml file $sPlanet..." . PHP_EOL);
            $appDir = $this->application->getApplicationDirectory();
            LpiFileHelper::upgradeLpiPlanets($appDir, $planetDotName);


            $output->write("Executing <b>import</b> command." . PHP_EOL);
            $proxyInput = new WritableCommandLineInput();
            $proxyInput->setParameters([
                "import",
            ]);
            $this->application->run($proxyInput, $output);


        } catch (\Exception) {
            $output->write("<error>upgrading failed. Aborting.</error>" . PHP_EOL);
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
        return " imports the latest version of the given planet, or all planets by default (if no parameter is passed).
 This command basically upgrades the <$co>lpi file</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-lpibyml-file</$url>) first, 
 then call the <$co>import command</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#usage-the-commands</$url>) without parameter.";
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
                " a specific <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) to upgrade",
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
            "upgrade" => "lpi upgrade",
        ];
    }


}