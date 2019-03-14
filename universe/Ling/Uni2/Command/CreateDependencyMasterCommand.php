<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\DependencyMasterBuilderUtil;

/**
 * The CreateDependencyMasterCommand class.
 * This command creates a @concept(dependency master file) based on the planets of the application, or from the planets
 * of the local server (with the -s flag).
 *
 *
 *
 * Parameters
 * -------------
 * - path: the path where to create the dependency master file.
 *
 *
 *
 * Flags
 * --------
 *
 * - -s: use local server. By default, the dependency master file is created by parsing the planets of the application.
 *          The -s switch allows to create the file by parsing the planets from the local server.
 *
 */
class CreateDependencyMasterCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $fromServer = $input->hasFlag("s");

        $indentLevel = $this->application->getBaseIndent();
        $path = $input->getParameter(2);
        if (null !== $path) {


            $proceed = true;
            $allowedGalaxies = null;

            if (true === $fromServer) {
                $localServer = $this->application->getLocalServer();
                $universeDir = $localServer->getRootDir();
                if (null === $universeDir) {
                    H::error(H::i($indentLevel) . "The local server's root directory is not set. Cannot create the dependency master from the local server. Use the <bold>conf</bold> command to set the local server's root directory." . PHP_EOL, $output);
                    $proceed = false;
                }
                else{
                    $allowedGalaxies = $this->application->getKnownGalaxies();
                }
            } else {
                $universeDir = $this->application->checkUniverseDirectory();
            }


            if (true === $proceed) {

                H::info(H::i($indentLevel) . "Creating dependency-master to <bold>$universeDir</bold> directory...", $output);

                $errors = [];
                $util = new DependencyMasterBuilderUtil();
                $util->createDependencyMasterByUniverseDir($universeDir, $path, $errors, $allowedGalaxies);
                $output->write(PHP_EOL);
                if ($errors) {
                    foreach ($errors as $error) {
                        H::warning(H::i($indentLevel + 1) . $error . PHP_EOL, $output);
                    }
                }
                H::success(H::i($indentLevel) . "The dependency master file was created at <bold>$path</bold>." . PHP_EOL, $output);
            }


        } else {
            H::error(H::i($indentLevel) . "Path parameter missing! Use the <bold>help</bold> command to get some help with the <bold>create-master</bold> command." . PHP_EOL, $output);
        }
    }

}