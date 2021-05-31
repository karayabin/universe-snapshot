<?php


namespace Ling\Light_PlanetInstaller\Util;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;

/**
 * The InstallInitUtil class.
 */
class InstallInitUtil
{

    /**
     *
     * Triggers the init phases (init1, init 2, init3) in order for the given planetDotName, and return a unix status code:
     *
     * - 0: everything ok
     * - 41: init 3 failed
     * - 42: init 2 failed
     * - 43: init 1 failed
     *
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     *
     *
     * @param OutputInterface $output
     * @param string $appDir
     * @param string $sessionDir
     * @param string $planetDotName
     * @return int
     */
    public function installInit(OutputInterface $output, string $appDir, string $sessionDir, string $planetDotName): int
    {
        $retCode = 0;


        //--------------------------------------------
        // PHASE INIT 1
        //--------------------------------------------
        $code = $this->exec("cd \"$appDir\" && light lpi install_init1 \"$sessionDir\"");
        if (0 === $code) {
            //--------------------------------------------
            // PHASE INIT 2
            //--------------------------------------------
            $code = $this->exec("cd \"$appDir\" && light lpi install_init2 \"$sessionDir\"");
            if (0 === $code) {
                //--------------------------------------------
                // PHASE INIT 3
                //--------------------------------------------
                $code = $this->exec("cd \"$appDir\" && light lpi install_init3 \"$sessionDir\"");
                if (0 === $code) {
                    $output->write("<success>The <b>install</b> of the planet <b>$planetDotName</b> was successful.</success>" . PHP_EOL);

                } else {
                    $this->processInitError("init3", $sessionDir, $output);
                    $retCode = 41;
                }

            } else {
                $this->processInitError("init2", $sessionDir, $output);
                $retCode = 42;
            }

        } else {
            $this->processInitError("init1", $sessionDir, $output);
            $retCode = 43;
        }
        return $retCode;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes the given command, and returns the unix code.
     *
     * @param string $command
     * @return int
     */
    private function exec(string $command): int
    {
        $returnCode = 0;
        passthru($command, $returnCode);
        return $returnCode;
    }


    /**
     * Writes an error message to the output, depending on the given error type.
     *
     * @param string $errorType
     * @param string $sessionDir
     * @param OutputInterface $output
     */
    private function processInitError(string $errorType, string $sessionDir, OutputInterface $output)
    {
        switch ($errorType) {
            case "init1":
            case "init2":
            case "init3":

                $file = "$sessionDir/$errorType.error.txt";
                if (true === file_exists($file)) {

                    $c = file_get_contents($file);
                    $output->write("<error:bold>Error logged during $errorType process:</error:bold>" . PHP_EOL);
                    $output->write("<error>$c</error>" . PHP_EOL);
                } else {
                    $output->write('<error>processInitError: An error was triggered by ' . $errorType . ', but no error file found. Aborting.</error>.' . PHP_EOL);
                }
                break;
            default:
                $this->error("processInitError: unknown errorType $errorType. Aborting.");
                break;
        }
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException(static::class . ": " . $msg, $code);
    }
}