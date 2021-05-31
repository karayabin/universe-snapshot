<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The SyncDependencies class.
 *
 * This class helps scanning/resolving potential unsync problems that could occur in the universe.
 *
 *
 * The main problem we're looking for is the following:
 *
 * As a dependency evolves, the master planet's dependency files still reference the old dependency planet.
 * For instance planet B version 1.0.0 depends on planet A, now planet B evolves to 1.1.0 but planet A
 * still has a reference to planet B version 1.0.0.
 *
 * To fix the problem, planet A needs to be pushed again (so that it references the latest version of planet B again).
 *
 * This class allows us to scan for such problems at a planet or universe level (by default), and then resolve it.
 *
 *
 */
class SyncDependencies extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

    }
}