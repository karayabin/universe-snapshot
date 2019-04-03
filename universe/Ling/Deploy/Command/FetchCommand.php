<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\Quoter;


/**
 * The FetchCommand class.
 *
 * Fetches the remote to the current site.
 * It's the opposite of the PushCommand.
 *
 *
 * By default, it mirrors the remote to the current site (i.e. files can be removed on the site).
 * More control on this behaviour gan be gained using the **mode** option.
 *
 *
 *
 * Flags
 * ----------
 *
 * -z: zip. Use a zip archive for transferring files to add. This is faster than the default one by one method.
 *          However, you don't have the file details shown with the default method.
 *
 *
 * Options
 * ------------
 *
 * - ?mode=add,remove,replace.
 *      A comma separated list (extra space allowed) of the operation names to execute.
 *      The default value is: add,replace,remove.
 *      The possible operations are:
 *          - add: will add the files that are present in remote but not in files
 *          - replace: will replace the files in site that are present in both the remote and the site (but were modified)
 *          - remove: will remove the files in site that are not present in remote
 *
 *      By default, all three operations are executed.
 *      So for instance, if you just want to download the files from the remote to the site without removing any
 *      files on the site, you can use "mode=add,replace" or "mode=add".
 *
 *
 *
 *
 */
class FetchCommand extends PushCommand
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->sentence = "Fetching remote to application dir <b>{app}</b>";
        $this->useDiffBack = true;
    }


    /**
     * @overrides
     */
    protected function onDiffReady(array $params, OutputInterface $output)
    {

        $useZip = $params['useZip'];
        $indentLevel = $params['indentLevel'];
        $nbOperations = $params['nbOperations'];
        $remoteRootDir = $params['remoteRootDir'];
        $remoteSshConfigId = $params['remoteSshConfigId'];
        $appDir = $params['appDir'];
        $parseAdd = $params['parseAdd'];
        $rPathsAdd = $params['rPathsAdd'];
        $parseReplace = $params['parseReplace'];
        $rPathsReplace = $params['rPathsReplace'];
        $parseRemove = $params['parseRemove'];
        $rPathsRemove = $params['rPathsRemove'];
        $removeFile = $params['removeFile'];


        if (false === $useZip) {
            //--------------------------------------------
            // PUSH ONE BY ONE METHOD
            //--------------------------------------------
            H::info(H::i($indentLevel + 1) . "Applying the diff map:" . PHP_EOL, $output);


            $count = 1;
            $nbFailure = 0;
            if (true === $parseAdd) {
                foreach ($rPathsAdd as $rPath) {
                    H::info(H::i($indentLevel + 2) . "Adding <b>$rPath</b> to site ($count/$nbOperations)...", $output);
                    $itemDir = dirname("$appDir/$rPath");
                    if (false === is_dir($itemDir)) {
                        FileSystemTool::mkdir($itemDir);
                    }
                    $dstPath = Quoter::scpEscapeSpace("$remoteRootDir/$rPath");
                    $cmd = "scp -Cq  $remoteSshConfigId:\"$dstPath\" \"$appDir/$rPath\"";
                    if (true === ConsoleTool::exec($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        $nbFailure++;
                    }
                    $count++;
                }
            }
            if (true === $parseReplace) {
                foreach ($rPathsReplace as $rPath) {
                    H::info(H::i($indentLevel + 2) . "Replacing <b>$rPath</b> in site ($count/$nbOperations)...", $output);

                    $itemDir = dirname("$appDir/$rPath");
                    if (false === is_dir($itemDir)) {
                        FileSystemTool::mkdir($itemDir);
                    }

                    $dstPath = Quoter::scpEscapeSpace("$remoteRootDir/$rPath");
                    $cmd = "scp -Cq $remoteSshConfigId:\"$dstPath\" \"$appDir/$rPath\"";
                    if (true === ConsoleTool::exec($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        $nbFailure++;
                    }
                    $count++;
                }
            }
            if (true === $parseRemove) {
                foreach ($rPathsRemove as $rPath) {
                    H::info(H::i($indentLevel + 2) . "Removing <b>$rPath</b> from site ($count/$nbOperations)...", $output);
                    $apath = $appDir . "/" . $rPath;
                    if (true === is_file($apath)) {
                        if (true === FileSystemTool::remove($apath)) {
                            $output->write('<success>ok</success>.' . PHP_EOL);
                        } else {
                            $output->write('<error>oops</error>.' . PHP_EOL);
                            $nbFailure++;
                        }
                    } else {
                        $output->write('<warning>oops, this is a directory, skipping</warning>.' . PHP_EOL);
                        $nbFailure++;
                    }
                    $count++;
                }
            }


            if ($nbFailure > 0) {
                H::error(H::i($indentLevel + 1) . "Number of failed operations: $nbFailure." . PHP_EOL, $output);
            }


        } else {
            //--------------------------------------------
            // PUSH ALL AT ONCE WITH ZIP METHOD
            //--------------------------------------------
            /**
             * The basic strategy here is the following:
             *
             *
             * - create the zip by putting all "add" and "replace" files in it.
             * - upload the zip to the remote, extract it, and copy all files to the remote app. If a file exist, overwrite it.
             * - if "remove", upload the diff-remove.txt map on the remote and ask the remote to remove those files.
             *
             */

            $rpathsToAdd = [];
            $rpathsToRemove = [];
            if (true === $parseAdd) {
                $rpathsToAdd = $rPathsAdd;
            }
            if (true === $parseReplace) {
                foreach ($rPathsReplace as $rpath) {
                    $rpathsToAdd[] = $rpath;
                }
            }
            if (true === $parseRemove) {
                $rpathsToRemove = $rPathsRemove;
            }


            if ($rpathsToAdd) {


                $zipMapSite = $appDir . "/.deploy/zip-map.txt";
                H::info(H::i($indentLevel + 1) . "Creating <b>$zipMapSite</b>...", $output);
                if (true === FileSystemTool::mkfile($zipMapSite, implode(PHP_EOL, $rpathsToAdd))) {
                    $output->write('<success>ok</success>.' . PHP_EOL);


                    H::info(H::i($indentLevel + 1) . "Transferring <b>$zipMapSite</b> to remote...", $output);

                    $cmd = "scp -Cq \"$zipMapSite\" $remoteSshConfigId:\"" . Quoter::scpEscapeSpace($remoteRootDir) . "/.deploy/zip-map.txt\"";
                    if (true === ConsoleTool::passThru($cmd)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);


                        H::info(H::i($indentLevel + 1) . "Creating <b>app.zip</b> archive in remote (calling <b>zip</b> command):" . PHP_EOL, $output);


                        $zipMapRemote = $remoteRootDir . "/.deploy/zip-map.txt";
                        $zipAppRemote = $remoteRootDir . "/.deploy/app.zip";
                        $cmd = "ssh $remoteSshConfigId deploy -x zip dir=\"$remoteRootDir\" src=\"$zipMapRemote\" dst=\"$zipAppRemote\" indent=" . ($indentLevel + 2);

                        if (true === ConsoleTool::passThru($cmd)) {


                            H::info(H::i($indentLevel + 1) . "Downloading <b>app.zip</b> archive from remote...", $output);

                            $zipAppSite = $appDir . "/.deploy/app.zip";
                            $cmd = "scp -Cq $remoteSshConfigId:\"" . Quoter::scpEscapeSpace($zipAppRemote) . "\" \"$zipAppSite\"";

                            if (true === ConsoleTool::passThru($cmd)) {
                                $output->write('<success>ok</success>.' . PHP_EOL);

                                H::info(H::i($indentLevel + 1) . "Extracting <b>app.zip</b> archive in <b>$appDir</b>...", $output);
                                if (true === ZipTool::unzip($zipAppSite, $appDir)) {
                                    $output->write('<success>ok</success>.' . PHP_EOL);
                                } else {
                                    $output->write('<error>oops</error>.' . PHP_EOL);
                                    H::error(H::i($indentLevel + 2) . "Couldn't extract the zip archive. Skipping." . PHP_EOL, $output);
                                }
                            } else {
                                $output->write('<error>oops</error>.' . PHP_EOL);
                                H::error(H::i($indentLevel + 2) . "A problem occurred with the <b>zip</b> command. Skipping." . PHP_EOL, $output);
                            }
                        }

                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::error(H::i($indentLevel + 2) . "Couldn't transfer the <b>zip-map.txt</b> file to remote. Skipping." . PHP_EOL, $output);
                    }
                } else {
                    $output->write('<error>oops</error>.' . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't create the <b>zip-map.txt</b> file. Skipping." . PHP_EOL, $output);
                }


            }


            if ($rpathsToRemove) {
                H::info(H::i($indentLevel + 1) . "Removing files from the site...", $output);
                foreach ($rpathsToRemove as $rpath) {
                    $apath = $appDir . "/" . $rpath;
                    if (is_file($apath)) {
                        if (true === FileSystemTool::remove($apath)) {
                            $output->write('<success>ok</success>.' . PHP_EOL);
                        } else {
                            $output->write('<error>oops, cannot create that file</error>.' . PHP_EOL);
                        }
                    } else {
                        $output->write('<error>oops, this is a directory. Skipping</error>.' . PHP_EOL);
                    }
                }

            }


            if (empty($rpathsToAdd) && empty($rpathsToRemove)) {
                H::info(H::i($indentLevel + 1) . "Nothing to do according to the diff map." . PHP_EOL, $output);
            }

        }
        return 0;
    }
}