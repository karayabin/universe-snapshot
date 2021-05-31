<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Util\UpgradeUtil;
use Ling\UniverseTools\PlanetTool;


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
        $retCode = 0;
        if (true === $this->checkInsideAppDir($input, $output)) {


            $planetDotName = $input->getParameter(2);
            $planetListFile = $input->getOption("list");

            $doInstall = $input->hasFlag("install");
            $useDebug = $input->hasFlag("d"); // proxy to the import util
            $appDir = getcwd();


            //--------------------------------------------
            // DEFINING THE PLANETS TO UPGRADE
            //--------------------------------------------
            $planetDotNames = []; // planets to upgrade
            if (
                null === $planetDotName &&
                null === $planetListFile
            ) {
                // all planets from the app
                $planetDotNames = PlanetTool::getPlanetDotNamesByWorkingDir(getcwd());

            } else {
                if (null !== $planetListFile) {
                    if (true === is_file($planetListFile)) {
                        $planetDotNames = BabyYamlUtil::readFile($planetListFile);
                    } else {
                        $output->write("<error>File not found: <b>$planetListFile</b></error>. Aborting." . PHP_EOL);
                        $retCode = 3;
                        goto end;
                    }
                }
                if (null !== $planetDotName) {
                    $planetDotNames[] = $planetDotName;
                    $planetDotNames = array_unique($planetDotNames);
                }
            }


            //--------------------------------------------
            // UPGRADING THE PLANETS
            //--------------------------------------------
            $upgradeUtil = new UpgradeUtil();
            $upgradeUtil->setOutput($output);
            $upgradeUtil->setContainer($this->container);
            $upgradeUtil->upgrade($appDir, $planetDotNames, [
                'install' => $doInstall,
                'useDebug' => $useDebug,
            ]);


            $errorMessages = $upgradeUtil->getErrorMessages();
            if (count($errorMessages) > 0) {
                $output->write("<warning>Some errors occured during the upgrading process:</warning>" . PHP_EOL);
                foreach ($errorMessages as $errorMessage) {
                    $output->write("<error>$errorMessage</error>" . PHP_EOL);
                }
            } else {
                $output->write("<green:bold>The upgrading process was executed successfully.</green:bold>" . PHP_EOL);
            }

        }
        end:
        return $retCode;
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
        return "
 <$co>Upgrades</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#upgrade-algorithm</$url>) a planet.
 This command will upgrade any planet found in the <b>planets array</b>.
 By default, if the <b>planets array</b> is empty, this command will upgrade all the planets of your app.
 ";
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
                " if set, adds the planet to the <b>planets array</b>.",
                false,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getOptions(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "list" => [
                'desc' => " string. The path to a babyYaml file listing planet names to add to the <b>planets array</b>.",
                'values' => [
                ],
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "install" => " if set, the upgrade process will include the <$co>install algorithm</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#install-algorithm</$url>).",
            "d" => " if set, the output will be a bit more verbose. ",
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