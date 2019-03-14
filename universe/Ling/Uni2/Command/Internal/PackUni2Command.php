<?php


namespace Ling\Uni2\Command\Internal;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Command\UniToolGenericCommand;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The PackUni2Command class.
 *
 * This is a private command that I use to prepare the uni-tool for export to github.com.
 *
 * - creates the following structure at the location defined by the path option (usually ending with /uni)
 *
 *
 * ```txt
 * - $path/
 * ----- uni.php
 * ----- universe
 * --------- ...contains all planets necessary to make the uni-tool work properly
 * ```
 *
 *
 * The script **uni.php** is the uni-tool console program. It's ready to execute.
 *
 *
 *
 * Options
 * -----------
 * --path=$path, the path to the uni-tools directory to create. Generally, this directory is named uni.
 *
 *
 * Flags
 * -----------
 * - -f: force mode. By default, if a file exists at the path specified with the $path option,
 *      then the command does nothing (it aborts).
 *      To force the creation of the directory, set this flag: it will remove the **$path** directory/entry if
 *      it exists before creating the new directory.
 *
 *
 *
 */
class PackUni2Command extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndent();
        $path = $input->getOption("path");
        $forceMode = $input->hasFlag("f");


        H::info(H::i($indentLevel) . "Creating the uni-tools directory:" . PHP_EOL, $output);


        if (null !== $path) {


            $proceed = true;
            if (file_exists($path)) {
                if (false === $forceMode) {
                    H::warning(H::i($indentLevel + 1) . "The entry <bold>$path</bold> already exists. Use the -f flag to overwrite." . PHP_EOL, $output);
                    $proceed = false;
                } else {
                    FileSystemTool::remove($path);
                }
            }


            if (true === $proceed) {


                $skeletonDir = __DIR__ . "/../../assets/uni-skeleton";
                if (is_dir($skeletonDir)) {

                    H::info(H::i($indentLevel + 1) . "Copying <bold>uni-skeleton</bold> directory to <bold>$path</bold>" . PHP_EOL, $output);
                    FileSystemTool::copyDir($skeletonDir, $path);


                    //--------------------------------------------
                    // IMPORT PLANETS
                    //--------------------------------------------
                    $myInput = new ArrayInput();
                    $myInput->setItems([
                        "application-dir" => $path,
                        "indent" => $indentLevel + 1,
                        ":import-map" => true,
                        "-f" => true,
                        "-n" => true,
                    ]);
                    $this->application->run($myInput, $output);


                    //--------------------------------------------
                    // CLEAN PLANETS
                    //--------------------------------------------
                    $myInput = new ArrayInput();
                    $myInput->setItems([
                        "indent" => $indentLevel + 1,
                        "application-dir" => $path,
                        ":clean" => true,
                    ]);
                    $this->application->run($myInput, $output);


                    $cmdPath = rtrim($path, '/') . "/uni.php";

                    H::success(H::i($indentLevel) . "The <bold>uni-tools</bold> directory is now ready." . PHP_EOL, $output);
                    H::success(H::i($indentLevel) . "You can use it with: <black:bgWhite>php -f \"$cmdPath\" -- help</black:bgWhite>" . PHP_EOL, $output);


                } else {
                    H::error(H::i($indentLevel) . "The <bold>uni-skeleton</bold> directory was not found!!" . PHP_EOL, $output);
                }
            }


            //--------------------------------------------
            //
            //--------------------------------------------
        } else {
            H::error(H::i($indentLevel + 1) . "You must pass the <bold>path</bold> option to continue." . PHP_EOL, $output);
        }


    }
}
