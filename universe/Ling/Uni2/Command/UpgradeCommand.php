<?php


namespace Ling\Uni2\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The UpgradeCommand class.
 *
 * This class implements the upgrade system defined in the @page(uni-tool upgrade system document).
 *
 *
 * Flags
 * ----------
 * -f: forces the command to reinstall the uni-tool.
 *
 *
 */
class UpgradeCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        /**
         * 1. Update the dependency master file if necessary (i.e. if the version number of the uni-tool on the web is greater than the version number on the uni-tool in the local machine)
         * 2. If there was an update, then upgrade all planets from the local server
         */


        $indentLevel = $this->application->getBaseIndent();
        $appDir = $this->application->checkApplicationDir();
        $force = $input->hasFlag('f');


        //--------------------------------------------
        // UPDATING DEPENDENCY MASTER FILE (if necessary)
        //--------------------------------------------
        $version = $this->application->getUniToolLocalVersionNumber();
        $isOutdated = $this->application->isUniToolOutdated();
        if (true === $force || true === $isOutdated) {
            $webVersion = $this->application->getUniToolWebVersionNumber();

            if (true === $isOutdated) {
                H::discover(H::i($indentLevel) . "A newer version of the uni-tool was found ($version --> $webVersion)." . PHP_EOL, $output);
            }


            H::info(H::i($indentLevel + 1) . "Reinstalling the new <b>uni-tool</b> from the web." . PHP_EOL, $output);


            $cmd = 'temp_file=$(mktemp); curl -fsSL https://raw.githubusercontent.com/lingtalfi/universe-naive-importer/master/installer.php > $temp_file; sudo php -f $temp_file;';

            if (true === ConsoleTool::passThru($cmd)) {


                H::info(H::i($indentLevel + 1) . 'Updating local info...', $output);
                $this->application->updateUniToolInfo([
                    "last_update" => date("Y-m-d H:i:s"),
                    "local_version" => $webVersion,
                ]);
                $output->write("<success>ok.</success>" . PHP_EOL);


                //--------------------------------------------
                // UPGRADING LOCAL SERVER IF ANY
                //--------------------------------------------
                H::info(H::i($indentLevel + 1) . 'Searching for local server...', $output);
                $localServer = $this->application->getLocalServer();

                if ($localServer->exists()) {

                    $serverDir = $localServer->getRootDir();


                    $output->write(' <success>Ok</success> (<bold>' . $serverDir . '</bold>)' . PHP_EOL);
                    H::info(H::i($indentLevel + 1) . 'Upgrading local server:' . PHP_EOL, $output); // from local dependencies-master.byml


                    /**
                     * Updating all planets in the local server
                     */
                    //--------------------------------------------
                    // IMPORT PLANETS
                    //--------------------------------------------
                    $myInput = new ArrayInput();
                    $myInput->setItems([
                        "application-dir" => $appDir,
                        ":store-all" => true,
                        "indent" => $indentLevel + 2,
                    ]);
                    $this->application->run($myInput, $output);


                } else {
                    $output->write(' <warning>The local server is not active and/or is not set. Use the <bold>conf</bold> command to configure the local server.</warning>' . PHP_EOL);
                }


            } else {
                H::error("the copy failed. The upgrade will stop." . PHP_EOL, $output);
            }
        } else {
            H::info("This uni-tool copy is already up-to-date (with version: $version). Nothing will be done." . PHP_EOL, $output);
        }


    }
}