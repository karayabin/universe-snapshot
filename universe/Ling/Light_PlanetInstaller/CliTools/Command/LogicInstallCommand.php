<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\Service\LightPlanetInstallerService;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;


/**
 * The LogicInstallCommand class.
 *
 */
class LogicInstallCommand extends LightPlanetInstallerProprietaryCommand
{


    /**
     * @overrides
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {
        $planetDotName = $input->getParameter(2);
        $debug = $input->hasFlag("d");
        $force = $input->hasFlag("f");
        $postMap = $input->hasFlag("m");


        if (true === $postMap) {
            /**
             * @var $pis LightPlanetInstallerService
             */
            $pis = $this->container->get("planet_installer");
            $this->postMapByPlanetDotName($planetDotName, $pis, $output);
        }


        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get("plugin_installer");

        if (true === $debug) {
            $output->write("Logic installing planet $planetDotName." . PHP_EOL);
        }

        /**
         * We only set the output in debug modes, because the output messes up the clean percent increment otherwise.
         */
        if (true === $debug) {
            $pi->setOutputLevels([
                'debug',
            ]);
            $pi->setOutput($output);
        }
        if (true === $pi->isInstallable($planetDotName)) {
            try {


                if (true === $debug) {
                    $output->write("Installer found, logic installing planet." . PHP_EOL);
                }
                $pi->install($planetDotName, [
                    'force' => $force,
                ]);
            } catch (\Exception $e) {

                $err = $e->getMessage();
                $errors[] = $err;
                $this->logError("An error occurred while trying to install $planetDotName: $err." . PHP_EOL);
                if (true === $debug) {
                    $output->write("Exception detail: " . (string)$e . PHP_EOL);
                }
                return 1; // indicate an error of the program
            }
        } else {
            if (true === $debug) {
                $output->write("No installer found, skipping." . PHP_EOL);
            }
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
        $co = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();
        $ret = <<<EEE
<$co>logic installs</$co>(<$url>https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary</$url>) the given planet. This command is used internally by the <b>install</b> command.
    This command assumes that the planet you want to <b>logic install</b> is already imported.
EEE;

        return $ret;
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();
        $pmt = LpiFormatHelper::getCommandLineParameterFmt();


        $desc = <<<EEE
<$pmt>planetDotName</$pmt>: the <$concept>planetDotName</$concept> (<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to logic install
EEE;


        return [
            "planetDefinition" => [
                $desc,
                false
            ],
        ];
    }


    /**
     * @overrides
     */
    public function getFlags(): array
    {
        return [
            "d" => "Whether to use <b>debug</b> mode",
            "f" => "if set, forces the logic reinstalling of the planet, even if it's already logic installed",
            "m" => "if set, will execute the <b>post assets/map</b> step (of the <b>install</b> command) before doing the <b>logic install</b>",
        ];
    }


}