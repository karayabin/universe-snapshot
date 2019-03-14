<?php


namespace Ling\Uni2\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\DirScanner;
use Ling\Uni2\Helper\OutputHelper as H;

/**
 * The CleanCommand class.
 *
 * Parses all planets and items of the application recursively, and removes any entries set in the
 * clean_items configuration.
 *
 * Use the **conf** command to see the value of the clean_items directive.
 *
 *
 *
 */
class CleanCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndent();
        $filesToRemove = [];
        $sCleanItems = $this->application->getConfValue("clean_items", "");
        $entriesToRemove = array_map(function ($v) {
            return trim($v);
        }, explode(",", $sCleanItems));


        $callable = function ($path, $rPath, $level) use ($entriesToRemove, &$filesToRemove) {
            $file = basename($path);
            if (in_array($file, $entriesToRemove, true)) {
                $filesToRemove[] = $path;
            }
        };


        //--------------------------------------------
        // COLLECTING FROM PLANETS
        //--------------------------------------------

        $universeDir = $this->application->getUniverseDirectory();
        if (is_dir($universeDir)) {
            H::info(H::i($indentLevel) . "Cleaning items from the <bold>universe</bold> directory ($universeDir)." . PHP_EOL, $output);
            $scanner = DirScanner::create();
            $scanner->scanDir($universeDir, $callable);
        } else {
            H::warning(H::i($indentLevel) . "Clean command: the <bold>universe</bold> directory wasn't found at $universeDir." . PHP_EOL, $output);
        }


        //--------------------------------------------
        // COLLECTING FROM DEPENDENCIES
        //--------------------------------------------
        $universeDepDir = $this->application->getUniverseDependenciesDir();
        if (is_dir($universeDepDir)) {
            H::info(H::i($indentLevel) . "Cleaning items from the <bold>universe-dependencies</bold> directory ($universeDepDir)." . PHP_EOL, $output);
            $scanner->scanDir($universeDepDir, $callable);
        }
        else{
//            H::warning(H::i($indentLevel) . "Clean command: the <bold>universe-dependencies</bold> directory wasn't found at $universeDepDir." . PHP_EOL, $output);
        }


        //--------------------------------------------
        // EXECUTING
        //--------------------------------------------
        foreach ($filesToRemove as $entry) {
            FileSystemTool::remove($entry);
        }


    }
}