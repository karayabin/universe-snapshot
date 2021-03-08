<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\LingTalfi\Util\SubscribersUtil;

/**
 * The UpdateSubscriberDependenciesCommand class
 */
class UpdateSubscriberDependenciesCommand extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $defaultAppDir = "/komin/jin_site_demo";

        $appDir = $input->getOption("app", $defaultAppDir);


        $planetDotName = $input->getParameter(2);

        $u = new SubscribersUtil();
        $u->updateSubscribersDependenciesAndCommit($appDir, $planetDotName);

    }


}