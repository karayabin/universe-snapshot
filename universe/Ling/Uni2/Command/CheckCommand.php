<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\DependencySystemImporter\DependencySystemImporterInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\Util\ImportUtil;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The CheckCommand class.
 *
 *
 * Will list the problems of the current application's universe.
 * It will:
 *
 * - list the unresolved dependencies (for instance if planet A depends on planet B, but planet B is not in the application).
 * - list all planets which don't have a valid **meta-info.byml** file at their root (valid means it contains at least the version number).
 *      See @page(the meta info file) for more details.
 * - list all planets which have dependencies which call unknown importers.
 *
 *
 * Options, flags:
 * ------------
 * - -r: resolve. If this flag is set, the command will try to resolve unresolved planet dependencies.
 *
 *
 *
 * This command is mainly used to diagnose problems that might occur when you manipulate planet
 * structures manually (which you shouldn't).
 * I used it during the construction of the uni-tool.
 * Hopefully it will still be useful after that.
 *
 *
 *
 *
 *
 *
 */
class CheckCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $resolve = $input->hasFlag("r");

        $indentLevel = $this->application->getBaseIndent();
        $errorIds = [];

        $invalidMeta = [];
        $unknownImportersMessages = [];
        $unresolvedDependencyMessages = [];
        $unresolvedDependencyPlanets = [];


        $universeDir = $this->application->checkUniverseDirectory();
        $universeDependencyDir = $this->application->getUniverseDependenciesDir();
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);


        $galaxies = $this->application->getKnownGalaxies();


        H::info(H::i($indentLevel) . "Checking application directory for potential problems:" . PHP_EOL, $output);

        foreach ($planetDirs as $planetDir) {


            list($galaxyName, $planetName) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            $planetId = $galaxyName . "/" . $planetName;


            $meta = MetaInfoTool::parseInfo($planetDir);
            if (
                false === array_key_exists("version", $meta)
            ) {
                $invalidMeta[] = $planetName;
            }

            $depItem = DependencyTool::getDependencyItem($planetDir);


            $dependencies = $depItem['dependencies'];
            foreach ($dependencies as $system => $packageImportNames) {
                foreach ($packageImportNames as $packageImportName) {


                    /**
                     * @var $importer DependencySystemImporterInterface
                     */
                    $importer = $this->application->getImporter($system);

                    if (null !== $importer) {

                        $packageSymbolicName = $importer->getPackageSymbolicName($packageImportName);


                        if (in_array($system, $galaxies, true)) {
                            $depDir = $universeDir . "/$system/" . $packageSymbolicName;

                            if (false === is_dir($depDir)) {
                                $unresolvedDependencyMessages[] = "Dependency planet <bold>$system/$packageSymbolicName</bold> not found (referenced from planet <bold>$planetId</bold>).";
                                $unresolvedDependencyPlanets[] = $system . "/" . $packageSymbolicName;
                            }
                        } else {
                            $depDir = $universeDependencyDir . "/" . $system . "/" . $packageSymbolicName;
                            if (false === is_dir($depDir)) {
                                $unresolvedDependencyMessages[] = "Dependency item <bold>$system/$packageSymbolicName</bold> not found (referenced from planet <bold>$planetId</bold>).";
                            }
                        }
                    } else {
                        $errorId = "importer-$planetId-$system-$packageImportName";
                        if (false === in_array($errorId, $errorIds, true)) {
                            $errorIds[] = $errorId;
                            $unknownImportersMessages[] = "Planet <bold>$planetName</bold>'s dependency <bold>$system/$packageImportName</bold> uses the unknown <bold>$system</bold> importer.";
                        }
                    }
                }
            }
        }


        $hasProblem = (
            count($invalidMeta) > 0 ||
            count($unknownImportersMessages) > 0 ||
            count($unresolvedDependencyMessages) > 0
        );


        //--------------------------------------------
        // DISPLAYING MESSAGES
        //--------------------------------------------
        if ($hasProblem) {
            $sectionFormat = 'underlined:bold';
            if ($unknownImportersMessages) {
                foreach ($unknownImportersMessages as $msg) {
                    H::warning(H::i($indentLevel + 1) . $msg . PHP_EOL, $output);
                }
            }

            if ($invalidMeta) {
                H::warning(H::i($indentLevel + 1) . "<$sectionFormat>Invalid meta:</$sectionFormat>" . PHP_EOL, $output);
                H::warning(H::i($indentLevel + 2) . "The following planets have insufficient meta information (<bold>version</bold> and/or <bold>galaxy</bold> missing in <bold>meta-info.byml</bold>):" . PHP_EOL, $output);
                foreach ($invalidMeta as $planetName) {
                    H::warning(H::i($indentLevel + 2) . "- $planetName" . PHP_EOL, $output);
                }
            }

            if ($unresolvedDependencyMessages) {
                H::warning(H::i($indentLevel + 1) . "<$sectionFormat>Unresolved dependencies:</$sectionFormat>" . PHP_EOL, $output);
                foreach ($unresolvedDependencyMessages as $msg) {
                    H::warning(H::i($indentLevel + 2) . $msg . PHP_EOL, $output);
                }


                if (true === $resolve) {
                    H::info(H::i($indentLevel + 1) . "<$sectionFormat>Attempt to resolve unresolved dependencies;</$sectionFormat>" . PHP_EOL, $output);


                    $errorSummary = new ErrorSummary();
                    $helper = new ImportUtil();
                    $helper->setErrorSummary($errorSummary);
                    foreach ($unresolvedDependencyPlanets as $planetName) {


                        $helper->importPlanet($planetName, $this->application, $output, [
                            "indentLevel" => $indentLevel + 2,
                            "forceMode" => true,
                            "importMode" => "reimport",
                        ]);
                    }


                    $errorSummary->displayErrorRecap($output);
                }
            }


        } else {
            H::info(H::i($indentLevel) . "No problem found." . PHP_EOL, $output);
        }


    }
}