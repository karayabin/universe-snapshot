<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;
use Ling\UniverseTools\PlanetTool;


/**
 * The ReimportAllCommand class.
 *
 * Same as the @object(ReimportCommand) command,
 * but applies for all planets in the current application.
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
 * - -f: do not reboot.
 *
 *      By default, this command will boot the universe if necessary (for instance the universe dir does not exist, or the bigbang.php script was not found).
 *      If this option is set, the booting will not occur.
 *
 */
class ReimportAllCommand extends UniToolGenericCommand
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
     * Builds the ReimportAllCommand instance.
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


        $universeDir = $this->application->getUniverseDirectory();
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);


        $errorSummary = new ErrorSummary();
        $helper = new ImportUtil();
        $helper->setErrorSummary($errorSummary);


        foreach ($planetDirs as $planetDir) {
            $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            if (false !== $pInfo) {
                list($galaxy, $planetName) = $pInfo;
                $longPlanetName = $galaxy . "/" . $planetName;

                $helper->importPlanet($longPlanetName, $this->application, $output, [
                    "forceMode" => $forceMode,
                    "importMode" => $this->importMode,
                ]);
            } else {
                H::warning(H::i($indentLevel) . "Invalid planet dir: <bold>$planetDir</bold>." . PHP_EOL, $output);
            }
        }

        $errorSummary->displayErrorRecap($output);
    }
}