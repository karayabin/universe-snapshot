<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;


/**
 * The ReimportUniverseCommand class.
 *
 * This command re-imports the whole universe.
 *
 * The same algorithm as the @object(reimport command) is used.
 * The universe's planets are found from the @page(local dependency master file).
 *
 *
 *
 */
class ReimportUniverseCommand extends UniToolGenericCommand
{

    /**
     *
     * This property holds the importMode for this instance.
     * See the @page(importMode definition) for more details.
     *
     * @var string = reimport (import|reimport)
     */
    protected $importMode;

    /**
     * This property holds whether the @page(boot process) should be available to this command.
     * @var bool
     */
    protected $bootAvailable;


    /**
     * Builds the ReimportUniverseCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->importMode = "reimport";
        $this->bootAvailable = true;
    }


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndent();
        $forceMode = $input->hasFlag("f");
        $doNotBoot = $input->hasFlag("n");


        if (true === $this->bootAvailable && false === $doNotBoot) {
            $this->application->bootUniverse($output);
        }
        $this->application->checkUpgrade($output);

        $masterConf = $this->application->getDependencyMasterConf();
        $galaxies = $masterConf['galaxies'] ?? [];
        $errorSummary = new ErrorSummary();
        $helper = new ImportUtil();

        $helper->setErrorSummary($errorSummary);

        foreach ($galaxies as $galaxy => $galaxyItems) {
            H::info(H::i($indentLevel) . "Importing galaxy <bold>$galaxy</bold>:" . PHP_EOL, $output);

            foreach ($galaxyItems as $planetName => $meta) {
                $helper->importPlanet($galaxy . "/" . $planetName, $this->application, $output, [
                    "forceMode" => $forceMode,
                    "importMode" => $this->importMode,
                    "indentLevel" => $indentLevel + 1,
                ]);
            }
        }

        $errorSummary->displayErrorRecap($output);


    }
}