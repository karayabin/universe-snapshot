<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;

/**
 * The OpenConfCommand class.
 *
 * Opens the configuration for all projects.
 * Only works on mac.
 *
 *
 *
 *
 */
class OpenConfCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $confPath = $this->application->getConfPath();
        exec('open "' . $confPath . '"');
    }
}