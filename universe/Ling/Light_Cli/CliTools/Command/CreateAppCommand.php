<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\UniverseTools\MachineUniverseTool;


/**
 * The CreateAppCommand
 *
 */
class CreateAppCommand extends LightCliDocCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        /**
         * 1. Create the light-app-boilerplate in the machine cache if not exists
         * 2. Copy the boilerplate to the desired location
         *
         *
         */


        $cache = $input->hasFlag("c");


        $fmtFile = LightCliFormatHelper::getFileFmt();

        $appName = $input->getParameter(2);
        if (null === $appName) {
            $this->error("The <b>appName</b> parameter is mandatory, try again." . PHP_EOL);
        } else {


            $machineUniPath = MachineUniverseTool::getMachineUniversePath();
            $boilerDir = $machineUniPath . "/Ling/Light_Cli/light-app-boilerplate";
            if (false === $cache || false === is_dir($boilerDir)) {
                $boilerZipUrl = "https://github.com/lingtalfi/Light_AppBoilerplate/raw/master/assets/light-app-boilerplate.zip";
                $boilerZip = $boilerDir . ".zip";

                $this->msg("Downloading boilerplate from the web...");

                $res = file_put_contents($boilerZip, fopen($boilerZipUrl, 'r'));
                if (false !== $res) {
                    $this->successMsg("ok" . PHP_EOL);


                    $this->msg("Unzipping boilerplate to <$fmtFile>$boilerDir</$fmtFile>...");
                    if (true === ZipTool::unzip($boilerZip, $boilerDir)) {
                        $this->successMsg("ok" . PHP_EOL);
                    } else {
                        $this->msg(PHP_EOL);
                        $this->errorMsg("Unzipping failed. Aborting." . PHP_EOL);
                        return;
                    }
                } else {
                    $this->msg(PHP_EOL);
                    $this->errorMsg("Download failed. Aborting." . PHP_EOL);
                    return;
                }
            }


            clearstatcache(true, $boilerDir);
            if (true === is_dir($boilerDir)) {

                $dst = $this->application->getCurrentDirectory() . "/$appName";

                if (true === file_exists($dst)) {
                    $this->errorMsg("The destination directory already exists: <$fmtFile>$dst</$fmtFile>. Please remove it manually and try again. This is a safety measure." . PHP_EOL);
                    return;

                }

                $this->msg("Copying boilerplate to dst (<$fmtFile>$dst</$fmtFile>)...");
                if (true === FileSystemTool::copyDir($boilerDir, $dst)) {
                    $this->successMsg("ok." . PHP_EOL);
                } else {
                    $this->msg(PHP_EOL);
                    $this->errorMsg("Copy failed. Aborting." . PHP_EOL);
                }


            } else {
                $this->error("The boilerplate dir doesn't exist: $boilerDir." . PHP_EOL);
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
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return " builds a light application with the given name in the current directory.";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "appName" => [
                " the name of the application to create",
                true,
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
            "c" => " cache, by default, this command downloads the boilerplate from the web every time to make sure you have the latest version.
 If the c flag is raised, it will use the cached version instead. If the cached version does not exist yet, 
 it will be fetched from the internet.",
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
            "mkapp" => "light_cli create_app",
        ];
    }


}