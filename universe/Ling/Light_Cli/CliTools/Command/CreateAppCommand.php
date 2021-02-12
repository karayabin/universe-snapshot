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
class CreateAppCommand extends LightCliBaseCommand
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


        $fmtFile = LightCliFormatHelper::getFileFmt();

        $appName = $input->getParameter(2);
        if (null === $appName) {
            $this->error("The <b>appName</b> parameter is mandatory, try again." . PHP_EOL);
        } else {


            $machineUniPath = MachineUniverseTool::getMachineUniversePath();
            $boilerDir = $machineUniPath . "/Ling/Light_Cli/light-app-boilerplate";
            if (false === is_dir($boilerDir)) {
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


}