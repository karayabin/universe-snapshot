<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\UniverseTools\PlanetTool;


/**
 * The RemoveCommand class.
 *
 */
class RemoveCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $doNotUpdate = $input->hasFlag("n");

        $planetDotName = $input->getParameter(2);

        if (null === $planetDotName) {
            $output->write("<error>The planetDotName parameter wasn't specified. Try again.</error>" . PHP_EOL);
            return;
        }


        $appDir = $this->application->getApplicationDirectory();


        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get("plugin_installer");
        if (true === $pi->isInstallable($planetDotName)) {
            $output->write("Logic uninstalling planet $planetDotName...");
            $pi->uninstall($planetDotName);
            $output->write("<success>ok</success>" . PHP_EOL);
        }


        $output->write("Removing planet <b>$planetDotName</b> and related <b>assets/map</b> from $appDir...");
        PlanetTool::removePlanet($planetDotName, $appDir, [
            'assets' => true,
        ]);
        $output->write("<success>ok</success>" . PHP_EOL);

        if (false === $doNotUpdate) {
            $output->write("Updating lpi file...");
            $this->application->removePlanetFromLpiFile($planetDotName);
            $output->write("<success>ok</success>" . PHP_EOL);
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

        $url = LpiFormatHelper::getUrlFmt();
        $concept = LpiFormatHelper::getConceptFmt();

        $s = <<<EEE
This command does the following:
    - <$concept>logic uninstalls</$concept>(<$url>https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#the-logic-uninstall-procedure</$url>) the planet if it's <$concept>uninstallable</$concept> 
    - removes the <$concept>assets/map</$concept>(<$url>https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap</$url>) if any
    - removes the planet directory
    - updates the <$concept>lpi</$concept> file accordingly
EEE;
        return $s;
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();

        return [
            "planetDot" => [
                "The <$concept>planetDotName</$concept> (<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to remove.",
                true,
            ],
        ];
    }


    /**
     * @overrides
     */
    public function getFlags(): array
    {
        return [
            "n" => "if set, will not update the lpi file",
        ];
    }


    /**
     * @overrides
     */
    public function getAliases(): array
    {
        return [
            "remove" => 'lpi remove',
        ];
    }


}