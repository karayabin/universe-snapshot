<?php


namespace Ling\Uni2\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;


/**
 * The ReimportMapCommand class.
 *
 * Same as the @object(ReimportCommand) command,
 * but applies to all planets defined in a map file.
 *
 *
 * The map file is simply a @page(babyYaml) file containing a list of the planets you want to import.
 *
 *
 *
 * Here is an example **map.byml** file:
 *
 * ```yaml
 * - Ling.Bat
 * - Ling.Planet2
 * - Ling.Planet3
 * - MyUniverse.PlanetXX
 * - MyUniverse.Z6PO
 * - ...
 * ```
 *
 * Each item is composed of the galaxy name, followed by a dot, followed by the planet short name.
 *
 *
 * The map location should be passed as the sole parameter of this command on the command line.
 * By default, if no map location is specified, the command will search for **map.byml** at the root of
 * the application's universe directory and executes it if it finds it.
 *
 *
 *
 *
 * How to use
 * ------------
 *
 * ```bash
 * # will use the application's universe/map.byml file if it finds it
 * uni reimport-map
 *
 * # will use the /path/to/my/map.byml map
 * uni reimport-map /path/to/my/map.byml
 * ```
 *
 *
 *
 *
 *
 * Options, flags
 * -----------
 * - -f: force reimport.
 *
 *      - If this flag is set, the uni-tool will force the reimport of the planets.
 *          If the planets have dependencies, the dependencies will also be reimported forcibly.
 *
 * - -f: do not reboot.
 *
 *      By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
 *      If this option is set, the booting will not occur.
 *
 *
 */
class ReimportMapCommand extends UniToolGenericCommand
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
     * Builds the ReimportMapCommand instance.
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


        $readMap = false;
        $mapPath = $input->getParameter(2);

        if (null === $mapPath) {
            $mapPath = $this->application->getUniverseDirectory() . "/map.byml";
            if (file_exists($mapPath)) {
                H::info(H::i($indentLevel) . "Reading from the default map found in the application (<bold>$mapPath</bold>):" . PHP_EOL, $output);
                $readMap = true;
            } else {
                H::error(H::i($indentLevel) . "No map was defined. Use the <bold>help</bold> command to get more info." . PHP_EOL, $output);
            }
        } else {
            if (file_exists($mapPath)) {
                H::info(H::i($indentLevel) . "Reading map (<bold>$mapPath</bold>):" . PHP_EOL, $output);
                $readMap = true;
            } else {
                H::error(H::i($indentLevel) . "The map was not found at <bold>$mapPath</bold>." . PHP_EOL, $output);
            }
        }


        if (true === $readMap) {


            $mapConf = BabyYamlUtil::readFile($mapPath);
            if ($mapConf) {


                $errorSummary = new ErrorSummary();
                $helper = new ImportUtil();
                $helper->setErrorSummary($errorSummary);


                foreach ($mapConf as $mapLine) {

                    $p = explode(".", $mapLine);
                    if (2 === count($p)) {

                        list($galaxy, $planet) = $p;

                        $longPlanetName = $galaxy . "/" . $planet;

                        $helper->importPlanet($longPlanetName, $this->application, $output, [
                            "forceMode" => $forceMode,
                            "importMode" => $this->importMode,
                            "indentLevel" => $indentLevel+1,
                        ]);

                    } else {
                        H::warning(H::i($indentLevel + 1) . "Invalid map line: \"<red>$mapLine</red>\". Each line must be of the form <bold>\$galaxy.\$shortPlanetName</bold>." . PHP_EOL, $output);
                    }
                }
                $errorSummary->displayErrorRecap($output);
            } else {
                H::warning(H::i($indentLevel + 1) . "The map is empty, nothing to do." . PHP_EOL, $output);
            }
        }

    }
}