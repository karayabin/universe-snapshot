<?php


namespace Ling\Uni2\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The ShowDependencyMasterCommand class.
 * This command displays @page(the dependency-master file) content.
 *
 */
class ShowDependencyMasterCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $conf = $this->application->getDependencyMasterConf();
        //--------------------------------------------
        // DISPLAY
        //--------------------------------------------
        $string = BabyYamlUtil::getBabyYamlString($conf);
        $output->write($string . PHP_EOL);

    }

}