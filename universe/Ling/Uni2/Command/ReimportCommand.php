<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;


/**
 * The ReimportCommand class.
 *
 * This class implements the reimport command defined in the @page(uni-tool upgrade system document).
 *
 *
 * This command will import a planet only if either of the following cases is true:
 *
 * - the planet directory does not exist yet in the application
 * - the planet directory exist in the application, but there is a newer version of this planet (defined in @concept(the local dependency master))
 * - the force flag (-f) is set to true
 *
 * The same applies recursively to the planet dependencies (if any).
 *
 * Note: non-planet items behave differently: they are only imported if their directory doesn't exist yet in the universe-dependencies directory.
 *
 *
 *
 * The import process is the same for all items:
 * - first try to fetch the item (planet or non-planet) from the local server (much faster)
 * - if the local server doesn't contain the item, then fetch the item on the web. In case of success, create a local server copy for the next time.
 *
 *
 *
 *
 * Options, flags, parameters
 * -----------
 * - -f: force reimport.
 *
 *      - If this flag is set, the uni-tool will force the reimport of the planet, even if there is no newer version.
 *          This can be useful for testing purposes for instance.
 *          If the planet has dependencies, the dependencies will also be reimported forcibly.
 *
 * - -f: do not reboot.
 *
 *      By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
 *      If this option is set, the booting will not occur.
 *
 *
 */
class ReimportCommand extends UniToolGenericCommand
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
     * Builds the ReimportCommand instance.
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


        $doNotBoot = $input->hasFlag("n");
        $forceMode = $input->hasFlag("f");

        if (true === $this->bootAvailable && false === $doNotBoot) {
            $this->application->bootUniverse($output);
        }
        $this->application->checkUpgrade($output);

        $planetName = $input->getParameter(2);
        if (null !== $planetName) {

            $errorSummary = new ErrorSummary();
            $helper = new ImportUtil();
            $helper->setErrorSummary($errorSummary);


            $helper->importPlanet($planetName, $this->application, $output, [
                "indentLevel" => $indentLevel,
                "forceMode" => $forceMode,
                "importMode" => $this->importMode,
            ]);


            $errorSummary->displayErrorRecap($output);


        } else {
            H::error(H::i($indentLevel) . "Planet name missing! Type <bold>uni help</bold> to get some help with the <bold>" . $this->importMode . "</bold> command." . PHP_EOL, $output);
        }
    }
}