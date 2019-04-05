<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\EasyConsoleMenu\MenuExecutor;

/**
 * The EnterInteractiveModeCommand class.
 *
 * This command enters the deploy interactive mode.
 *
 *
 *
 */
class EnterInteractiveModeCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $menuFile = __DIR__ . "/../menu.byml";
        $menu = new MenuExecutor();
        $menu->executeMenu($menuFile, $output);
    }

}
