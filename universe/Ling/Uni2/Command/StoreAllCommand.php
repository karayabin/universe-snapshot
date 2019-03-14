<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Util\ImportUtil;


/**
 * The StoreAllCommand class.
 *
 * Same as the @object(StoreCommand) command,
 * but applies for all planets in the local server.
 *
 *
 * Options, flags, parameters
 * -----------
 * - -f: force reimport.
 *
 *      - If this flag is set, the uni-tool will force the reimport of the planets, even if there is no newer version.
 *          This can be useful for testing purposes for instance.
 *          If the planets have dependencies, the dependencies will also be reimported forcibly.
 *
 */
class StoreAllCommand extends UniToolGenericCommand
{


    /**
     * Builds the StoreAllCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $this->application->checkUpgrade($output);


        $forceMode = $input->hasFlag("f");
        $indentLevel = $this->application->getBaseIndent();

        $localServer = $this->application->getLocalServer();
        $galaxies = $this->application->getKnownGalaxies();
        $planetLongNames = $localServer->getPlanetNames($galaxies);


        $errorSummary = new ErrorSummary();
        $helper = new ImportUtil();
        $helper->setErrorSummary($errorSummary);


        foreach ($planetLongNames as $longPlanetName) {
            $helper->importPlanet($longPlanetName, $this->application, $output, [
                "forceMode" => $forceMode,
                "importMode" => "store",
                "indentLevel" => $indentLevel,
            ]);
        }

        $errorSummary->displayErrorRecap($output);
    }
}