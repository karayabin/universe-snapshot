<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The InfoUniverseCommand class.
 *
 * This command shows information about the current universe, based on @page(the dependency master file).
 *
 * The info shown is:
 *
 * - the total number of galaxies
 * - the total number of planets
 * - the percentage of planets having dependencies to other planets
 *
 *
 * It also shows the per-galaxy details:
 * - the total number of planets (for the given galaxy)
 * - the percentage (for the given galaxy) of planets having dependencies to other planets
 *
 *
 *
 *
 */
class InfoUniverseCommand extends UniToolGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndent();
        $depMaster = $this->application->getDependencyMasterConf();

        $nbPlanets = 0;
        $nbPlanetsWithDependencies = 0;


        $galaxies = $depMaster['galaxies'] ?? [];
        $nbGalaxies = count($galaxies);
        foreach ($galaxies as $galaxyName => $planets) {
            $nbPlanets += count($planets);
            foreach ($planets as $planetName => $planetMeta) {
                $dependencies = $planetMeta['dependencies'] ?? [];
                $nbPlanetsWithDependencies += count($dependencies);
            }
        }

        $percentagePlanetsWithDependencies = round($nbPlanetsWithDependencies / $nbPlanets * 100, 2);

        H::info(H::i($indentLevel) . "<bold>Information about this universe (based on the local dependency master file):</bold>" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "- number of galaxies: $nbGalaxies" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "- number of planets: $nbPlanets" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "- percentage of planets having dependencies: $percentagePlanetsWithDependencies%" . PHP_EOL, $output);
        H::info(H::i($indentLevel) . "<bold>Details per galaxy:</bold>" . PHP_EOL, $output);
        foreach ($galaxies as $galaxyName => $planets) {
            H::info(H::i($indentLevel) . "- galaxy <bold>$galaxyName</bold>:" . PHP_EOL, $output);

            $nbPlanets = count($planets);
            $nbPlanetsWithDependencies = 0;

            foreach ($planets as $planetName => $planetMeta) {
                $dependencies = $planetMeta['dependencies'] ?? [];
                $nbPlanetsWithDependencies += count($dependencies);
            }

            H::info(H::i($indentLevel) . "----- number of planets: $nbPlanets:" . PHP_EOL, $output);
            H::info(H::i($indentLevel) . "----- percentage of planets having dependencies: $percentagePlanetsWithDependencies%" . PHP_EOL, $output);
        }


    }
}