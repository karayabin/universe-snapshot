<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The InfoApplicationCommand class.
 *
 * This command shows information about the current application, based on the current application.
 *
 * The info shown is:
 *
 * - the total number of galaxies
 * - the total number of planets
 * - the percentage of planets having dependencies to other planets
 *
 *
 *
 */
class InfoApplicationCommand extends UniToolGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndent();
        $universeDir = $this->application->checkUniverseDirectory();

        $galaxies = [];


        $nbPlanets = 0;
        $nbPlanetsWithDependencies = 0;


        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planetDirs as $planetDir) {
            $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            if (false !== $pInfo) {
                list($galaxyName, $planetName) = $pInfo;

                if (false === in_array($galaxyName, $galaxies, true)) {
                    $galaxies[] = $galaxyName;
                }
                $nbPlanets++;


                $item = DependencyTool::getDependencyItem($planetDir);
                $dependencies = $item['dependencies'] ?? [];
                if ($dependencies) {
                    $nbPlanetsWithDependencies++;
                }


            } else {
                H::error(H::i($indentLevel) . "Invalid planet dir: $planetDir" . PHP_EOL, $output);
            }
        }

        $nbGalaxies = count($galaxies);
        $percentagePlanetsWithDependencies = round($nbPlanetsWithDependencies / $nbPlanets * 100, 2);

        H::info(H::i($indentLevel) . "<bold>Information about this application:</bold>" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "- number of galaxies: $nbGalaxies" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "- number of planets: $nbPlanets" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "- percentage of planets having dependencies: $percentagePlanetsWithDependencies%" . PHP_EOL, $output);


    }
}