<?php


namespace Ling\Light_Cli\Helper;

use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface;
use Ling\Light_Cli\Util\LightCliCommandDocUtility;

/**
 * The LightCliCommandDocHelper class.
 */
class LightCliCommandDocHelper
{


    /**
     * Prints the command list documentation for the given app.
     *
     * This tool was created so that author of apps can easily generate documentation for their own app
     * (if they implement LightCliApplicationInterface correctly).
     *
     * Available options are:
     * displayHeader: bool=true, whether to display a header before the commands list.
     *
     *
     *
     *
     * @param LightCliApplicationInterface $app
     * @param OutputInterface $output
     * @param array $options
     */
    public static function printCommandListDocByApp(LightCliApplicationInterface $app, OutputInterface $output, array $options = [])
    {

        $displayHeader = $options['displayHeader'] ?? true;
        $verbose = $options['verbose']??false;


        if (true === $displayHeader) {
            $output->write(PHP_EOL);
            $output->write("<bold>Commands list</bold>:" . PHP_EOL);
            $output->write(str_repeat('-', 17) . PHP_EOL);
            $output->write(PHP_EOL);
        }


        $cliApps = [
            $app->getAppId() => $app,
        ];

        $u = new LightCliCommandDocUtility();
        $u->printListByApp($cliApps, $output, [
            'filter' => null,
            'verbose' => $verbose,
            'displayIndexes' => false,
            'displayAliases' => false,
            'includeAppId' => false,
        ]);

    }
}