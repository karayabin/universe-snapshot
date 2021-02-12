<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;


/**
 * The UninstallCommand class.
 *
 */
class UninstallCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $planetDotName = $input->getParameter(2);

        if (null === $planetDotName) {
            $output->write("<error>The planetDotName parameter wasn't specified. Try again.</error>" . PHP_EOL);
            return;
        }



        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get("plugin_installer");

        if (true === $pi->isInstallable($planetDotName)) {
            $output->write("Logic uninstalling planet $planetDotName...");
            $pi->uninstall($planetDotName);
            $output->write("<success>ok</success>" . PHP_EOL);
        } else {
            $output->write("This planet is not installable, skipping." . PHP_EOL);
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
<$concept>logic uninstalls</$concept>(<$url>https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#the-logic-uninstall-procedure</$url>) the plugin (if it's <$concept>uninstallable</$concept>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-difference-between-install-and-import</$url>))
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
                "The <$concept>planetDotName</$concept> (<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to <$concept>logic uninstall</$concept>.",
                true,
            ],
        ];
    }


    /**
     * @overrides
     */
    public function getAliases(): array
    {
        return [
            "uninstall" => 'lpi uninstall',
        ];
    }


}