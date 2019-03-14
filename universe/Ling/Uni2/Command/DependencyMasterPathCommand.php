<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The DependencyMasterPathCommand class.
 * This command displays the path of the local @page(dependency-master file).
 *
 */
class DependencyMasterPathCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $path = $this->application->getLocalDependencyMasterPath();
        if (file_exists($path)) {
            $path = realpath($path);
        }

        $output->write($path . PHP_EOL);
    }

}