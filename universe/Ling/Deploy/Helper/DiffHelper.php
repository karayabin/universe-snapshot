<?php


namespace Ling\Deploy\Helper;


use Ling\CliTools\Output\OutputInterface;

/**
 * The DiffHelper class.
 */
class DiffHelper
{


    /**
     * Displays the @concept(diff) to the console screen.
     *
     *
     *
     * @param OutputInterface $output
     * @param array $add
     * @param array $remove
     * @param array $replace
     */
    public static function showDiff(OutputInterface $output, array $add, array $remove, array $replace)
    {
        //--------------------------------------------
        // DISPLAYING THE DIFF TO THE SCREEN...
        //--------------------------------------------
        $output->write("Add" . PHP_EOL);
        $output->write(str_repeat('-', 14) . PHP_EOL);
        foreach ($add as $item) {
            $output->write('- ' . $item . PHP_EOL);
        }


        $output->write(PHP_EOL);
        $output->write("Remove" . PHP_EOL);
        $output->write(str_repeat('-', 14) . PHP_EOL);
        foreach ($remove as $item) {
            $output->write('- ' . $item . PHP_EOL);
        }


        $output->write(PHP_EOL);
        $output->write("Replace" . PHP_EOL);
        $output->write(str_repeat('-', 14) . PHP_EOL);
        foreach ($replace as $item) {
            $output->write('- ' . $item . PHP_EOL);
        }

    }
}