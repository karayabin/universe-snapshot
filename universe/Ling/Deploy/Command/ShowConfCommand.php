<?php


namespace Ling\Deploy\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;

/**
 * The ShowConfCommand class.
 *
 * Shows the configuration for all projects, or for one project in particular.
 *
 *
 * Options:
 * -----------
 * -p: the project identifier of a particular project to show the configuration from
 *
 *
 *
 */
class ShowConfCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $projectId = $input->getOption('p');
        if (null === $projectId) {
            $conf = $this->application->getConf();
        } else {
            $conf = $this->application->getProjectConf();
        }
        $confString = BabyYamlUtil::getBabyYamlString($conf);
        $output->write($confString);
        $output->write(PHP_EOL);

    }
}