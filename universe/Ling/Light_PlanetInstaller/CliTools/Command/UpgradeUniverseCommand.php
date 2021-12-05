<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Util\UpgradeUtil;
use Ling\UniverseTools\PlanetTool;


/**
 * The UpgradeUniverseCommand class.
 *
 */
class UpgradeUniverseCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the DebugSessionDirCommand instance.
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
        $uniDir = $input->getParameter(2);


        if (false === is_dir($uniDir)) {
            $output->write("<error>Directory not found: <b>$uniDir</b>. Aborting.</error>" . PHP_EOL);
            $retCode = 4;
            goto end;
        }


        $appDir = dirname($uniDir);


        $planetDotNames = PlanetTool::getPlanetDotNames($uniDir);


        $upgradeUtil = new UpgradeUtil();
        $upgradeUtil->setOutput($output);
        $upgradeUtil->setContainer($this->container);
        $upgradeUtil->upgrade($appDir, $planetDotNames, [
            'install' => false,
            'useDebug' => false,
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
 <$co>Upgrades</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#upgrade-algorithm</$url>) all the planets of a given <b>universe directory</b>.
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
            "uniDir" => [
                " the path to the universe directory to upgrade.",
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
            "upgrade_universe" => "lpi upgrade_universe",
        ];
    }


}