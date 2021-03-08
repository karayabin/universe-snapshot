<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_Cli\Service\LightCliService;
use Ling\Light_Cli\Util\LightCliCommandDocUtility;


/**
 * The CommandsCommand class.
 * This command will display the list of all registered appId-command and/or aliases.
 *
 *
 *
 */
class CommandsCommand extends LightCliDocCommand
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



    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return " displays the list of registered third party application commands and aliases.";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "filter" => [
                " filters the list using either an int or a string.
 - If it's a string, it filters the list using that string. We search in <b>appId command</b> names.
 By default, the filter expression matches any part of the string. To make it match only the
 beginning of the string, prefix the string with the dollar symbol ($).
 - If it's an int, it's a number given by this list command. Each number represents a unique appId
 command.",
                true,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "v" => " verbose, whether to display all the details about each command (flags, options, parameters, etc...).",
        ];
    }


}