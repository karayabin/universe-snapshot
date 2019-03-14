<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The VersionCommand class.
 * This command will display the version of the local copy of the uni-tool (not the version of this Uni2 planet).
 *
 *
 * Example
 * -------------
 *
 * ```bash
 * $ uni version
 * 2.0.0
 *
 * ```
 *
 *
 *
 *
 *
 */
class VersionCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $version = $this->application->getUniToolLocalVersionNumber();
        $output->write($version . PHP_EOL);
    }

}