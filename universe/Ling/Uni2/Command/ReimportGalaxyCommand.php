<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;


/**
 * The ReimportGalaxyCommand class.
 *
 * This command re-imports a whole galaxy.
 * The name of the galaxy to reimport is passed as the parameter of the command line.
 *
 * The same algorithm as the @object(reimport command) is used.
 * The galaxy planets are found from the @page(local dependency master file).
 *
 *
 *
 */
class ReimportGalaxyCommand extends UniToolGenericCommand
{

    /**
     *
     * This property holds the importMode for this instance.
     * See the @page(importMode definition) for more details.
     *
     * @var string = reimport (import|reimport|store)
     */
    protected $importMode;


    /**
     * This property holds whether the @page(boot process) should be available to this command.
     * @var bool
     */
    protected $bootAvailable;

    /**
     * Builds the ReimportGalaxyCommand instance.
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


        $galaxy = $input->getParameter(2);

        if (true === $this->bootAvailable && false === $doNotBoot) {
            $this->application->bootUniverse($output);
        }
        $this->application->checkUpgrade($output);

        if (null !== $galaxy) {


            $masterConf = $this->application->getDependencyMasterConf();
            $galaxies = $masterConf['galaxies'] ?? [];

            if (array_key_exists($galaxy, $galaxies)) {


                $errorSummary = new ErrorSummary();
                $helper = new ImportUtil();
                $helper->setErrorSummary($errorSummary);
                foreach ($galaxies[$galaxy] as $planetName => $meta) {
                    $helper->importPlanet($galaxy . "/" . $planetName, $this->application, $output, [
                        "forceMode" => $forceMode,
                        "importMode" => $this->importMode,
                    ]);
                }

                $errorSummary->displayErrorRecap($output);

            } else {
                H::warning(H::i($indentLevel) . "Galaxy <bold>$galaxy</bold> was not found in the local dependency master file. The process will be aborted." . PHP_EOL, $output);
            }

        } else {
            H::error(H::i($indentLevel) . "The <bold>galaxy</bold> parameter must be passed. See the <bold>help</bold> command for some help about the <bold>reimport-galaxy</bold> command." . PHP_EOL, $output);
        }
    }
}