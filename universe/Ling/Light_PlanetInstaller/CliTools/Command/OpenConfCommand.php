<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiConfHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;


/**
 * The OpenConfCommand class.
 *
 */
class OpenConfCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $path = LpiConfHelper::getConfPath();
        ConsoleTool::exec('open "' . str_replace('"', '\"', $path) . '"');

    }


    /**
     * @overrides
     */
    public function getDescription(): string
    {

        $concept = LpiFormatHelper::getConceptFmt();
        $cmd = LpiFormatHelper::getCommandFmt();

        return "Opens the <$concept>global configuration file</$concept> using macos <$cmd>open</$cmd> command.";
    }

    /**
     * @overrides
     */
    public function getName(): string
    {
        return "conf";
    }


}