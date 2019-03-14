<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Application\UniToolApplication;

/**
 * The PushUniverseSnapshotCommand class.
 *
 * This command does the following:
 *
 * - It replaces the universe snapshot (/myphp/universe-snapshot/universe directory) with the local server universe (/myphp/universe/).
 * - It cleans the universe snapshot's universe directory from .git files (that's a restriction of github.com I believe, that you can't have
 *              nested .git directories in a .git repo)
 * - It pushes the universe snapshot to github.com.
 *
 *
 */
class PushUniverseSnapshotCommand extends KaosGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();


        $universeDir = "/myphp/universe";
        $universeSnapshotDir = "/myphp/universe-snapshot";
        $universeSnapshotUniverseDir = "$universeSnapshotDir/universe";


        //--------------------------------------------
        // REPLACE UNIVERSE SNAPSHOT'S UNIVERSE DIRECTORY
        //--------------------------------------------
        H::info(H::i($indentLevel) . "Creating the universe snapshot from the local server...", $output);
        FileSystemTool::remove($universeSnapshotUniverseDir);
        FileSystemTool::copyDir($universeDir, $universeSnapshotUniverseDir);
        $output->write('<success>ok</success>' . PHP_EOL);


        //--------------------------------------------
        // CLEAN SNAPSHOT
        //--------------------------------------------
        H::info(H::i($indentLevel) . "Cleaning the universe snapshot directory:" . PHP_EOL, $output);

        $application = new UniToolApplication();
        $myInput = new ArrayInput();
        $myInput->setItems([
            ":clean" => true,
            "application-dir" => $universeSnapshotDir,
            "indent" => $indentLevel + 1,
        ]);
        $application->run($myInput, $output);


        //--------------------------------------------
        // PUSH TO GITHUB.COM
        //--------------------------------------------
        /**
         * Note: I'm using git shortcut commands:
         * https://github.com/lingtalfi/server-notes/blob/master/doc/my-git-local-flow.md
         */
        passthru("cd \"$universeSnapshotDir\"; git snap update \"update via kaos pushuni command.\"");
        passthru("cd \"$universeSnapshotDir\"; git pp");


        H::success(H::i($indentLevel) . "The <b>universe snapshot</b> has been successfully deployed to github.com." . PHP_EOL, $output);

    }


}
