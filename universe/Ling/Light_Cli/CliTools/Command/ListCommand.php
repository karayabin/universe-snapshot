<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Service\LightCliService;
use Ling\Light_Cli\Util\LightCliCommandDocUtility;


/**
 * The ListCommand class.
 * This command will display the list of all registered appId-command and/or aliases.
 *
 *
 *
 */
class ListCommand extends LightCliBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {



        /**
         * @var $lc LightCliService
         */
        $lc = $this->container->get('cli');
        $cliApps = $lc->getCliApps();


        $filter = $input->getParameter(2);
        $verbose = $input->hasFlag("v");

        if (null !== $filter && is_numeric($filter)) {
            $verbose = true;
        }


        $u = new LightCliCommandDocUtility();
        $u->printListByApp($cliApps, $output, [
            'filter' => $filter,
            'verbose' => $verbose,
        ]);

    }


}