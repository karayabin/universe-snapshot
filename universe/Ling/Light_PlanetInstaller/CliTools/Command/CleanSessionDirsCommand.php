<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;


/**
 * The CleanSessionDirsCommand class.
 *
 */
class CleanSessionDirsCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the CleanSessionDirsCommand instance.
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
        $path = LpiHelper::getSessionDirsPath();
        $output->write("Removing <b>session dirs</b> inside of <b>$path</b>." . PHP_EOL);
        FileSystemTool::remove($path);
        FileSystemTool::mkdir($path);
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
 Empties the directory containing all the temporary <$co>session dirs</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#session-dir</$url>).
 This command should be used from time to time, especially if the host is a server for your clients.
 If it's a home computer that you turn off every day, you probably don't need to worry about it, as the <b>session dirs</b> are temporary dirs already.";
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "clean" => "lpi clean_session_dirs",
        ];
    }


}