<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The ConfPathCommand class.
 * This command will display the uni tool's configuration path.
 *
 *
 */
class ConfPathCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $output->write($this->application->getConfFile() . PHP_EOL);

    }

}