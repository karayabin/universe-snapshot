<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\ConvertTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Application\DeployApplication;
use Ling\Deploy\Helper\Quoter;


/**
 * The PushCommand class.
 *
 * This command applies the diff between the current site map and the given remote's map.
 * By default, the method used is to execute operations (add, remove or replace) file by file,
 * showing the progress to the console screen.
 *
 *
 *
 * Flags
 * ----------
 *
 * -z: zip. Use a zip archive. If this option is set, will wrap all the application into a zip archive and send it
 *      in one go to the remote server, and then replace the remote app with the one contained in the zip archive.
 *
 *
 * Options
 * ------------
 * - modes=add,remove,replace.
 *      A comma separated list (extra space allowed) of the operation names to execute.
 *      The possible modes are:
 *          - add: will add the files that are present in site but not in remote
 *          - replace: will replace the files in remote that are present in both the site and the remote (but were modified)
 *          - remove: will remove the files in remote that are not present in site
 *
 *      By default, all three modes are executed.
 *      So for instance, if you just want to upload the files from the site to the remote without removing any
 *      files on the remote, you can use "mode=add,replace" or "mode=add".
 *
 *
 * TODO: do the unzip part...
 *
 * TODO: remove archive.zip when done...
 *
 *
 *
 * Side notes about performance:
 * -------------------------
 * Here is a little comparison of different upload methods for a 51.9 Mb application.
 *
 * - transfer with Filezilla: about 7 minutes
 * - transfer with push -z (scp): about 7 minutes
 * - transfer with push (all 1435 files one by one via scp): 40 minutes (I almost died)
 *
 *
 *
 *
 */
class PushCommand extends DeployGenericCommand
{


    public function run(InputInterface $input, OutputInterface $output)
    {
        $remote = $input->getOption('remote', null);
        $indentLevel = $this->application->getBaseIndentLevel();
        $conf = $this->application->getConf($output, $indentLevel);
        $appDir = $this->application->getProjectDirectory();
        $useZip = $input->hasFlag("z");
        $sMode = $input->getOption('mode', 'add,replace,remove');
        $allowedModes = ['add', 'replace', 'remove'];
        $modes = array_map(function ($v) {
            return trim($v);
        }, explode(',', $sMode));
        $syntaxError = false;
        foreach ($modes as $mode) {
            if (false === in_array($mode, $allowedModes, true)) {
                $syntaxError = true;
                $invalidMode = $mode;
                break;
            }
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        if (false === $syntaxError) {
            if (null !== $remote) {


                $remoteConf = $this->application->getRemoteConf($remote, $output, $indentLevel);
                $remoteSshConfigId = $remoteConf['ssh_config_id'];
                $remoteRootDir = $remoteConf['root_dir'];

                $sentence = "Pushing application dir <b>$appDir</b> to remote <b>$remote</b>";
                if (true === $useZip) {
                    $sentence .= ", using zip method";
                }
                H::info(H::i($indentLevel) . $sentence . ":" . PHP_EOL, $output);

                //--------------------------------------------
                // CREATING THE DIFF
                //--------------------------------------------
                $appInput = new ArrayInput();
                $appInput->setItems([
                    ":diff" => true,
                    "dir" => $appDir,
                    "remote" => $remote,
                    "-f" => true,
                    "indent" => $indentLevel + 1,
                ]);
                $app = new DeployApplication();
                $app->run($appInput, $output);
                $addFile = $appDir . "/.deploy/diff-add.txt";
                $removeFile = $appDir . "/.deploy/diff-remove.txt";
                $replaceFile = $appDir . "/.deploy/diff-replace.txt";
                $parseAdd = true;
                $parseRemove = true;
                $parseReplace = true;

                if (in_array('add', $modes, true)) {
                    if (false === file_exists($addFile)) {
                        $parseAdd = false;
                        H::warning(H::i($indentLevel + 2) . "<b>diff-add</b> file not found in $addFile." . PHP_EOL, $output);
                    }
                } else {
                    $parseAdd = false;
                }

                if (in_array('replace', $modes, true)) {
                    if (false === file_exists($replaceFile)) {
                        $parseReplace = false;
                        H::warning(H::i($indentLevel + 2) . "<b>diff-replace</b> file not found in $replaceFile." . PHP_EOL, $output);
                    }
                } else {
                    $parseReplace = false;
                }

                if (in_array('remove', $modes, true)) {
                    if (false === file_exists($removeFile)) {
                        $parseRemove = false;
                        H::warning(H::i($indentLevel + 2) . "<b>diff-remove</b> file not found in $removeFile." . PHP_EOL, $output);
                    }
                } else {
                    $parseRemove = false;
                }


                $nbOperations = 0;
                if (true === $parseAdd) {
                    $rPathsAdd = file($addFile, \FILE_IGNORE_NEW_LINES);
                    $nbOperations += count($rPathsAdd);
                }
                if (true === $parseRemove) {
                    $rPathsRemove = file($removeFile, \FILE_IGNORE_NEW_LINES);
                    $nbOperations += count($rPathsRemove);
                }
                if (true === $parseReplace) {
                    $rPathsReplace = file($replaceFile, \FILE_IGNORE_NEW_LINES);
                    $nbOperations += count($rPathsReplace);
                }


                if (false === $useZip) {
                    //--------------------------------------------
                    // PUSH ONE BY ONE METHOD
                    //--------------------------------------------
                    H::info(H::i($indentLevel + 1) . "Applying the diff map:" . PHP_EOL, $output);


                    $count = 1;
                    $nbFailure = 0;
                    if (true === $parseAdd) {
                        foreach ($rPathsAdd as $rPath) {
                            H::info(H::i($indentLevel + 2) . "Adding <b>$rPath</b> to remote <b>$remote</b> ($count/$nbOperations)...", $output);
                            $remoteDir = dirname("$remoteRootDir/$rPath");
                            $dstPath = Quoter::scpEscapeSpace("$remoteRootDir/$rPath");
                            $cmd = "ssh $remoteSshConfigId 'mkdir -p \"$remoteDir\"' && scp -Cq \"$appDir/$rPath\" $remoteSshConfigId:\"$dstPath\"";
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
                            H::info(H::i($indentLevel + 2) . "Replacing <b>$rPath</b> in remote <b>$remote</b> ($count/$nbOperations)...", $output);
                            $remoteDir = dirname("$remoteRootDir/$rPath");
                            $dstPath = Quoter::scpEscapeSpace("$remoteRootDir/$rPath");
                            $cmd = "ssh $remoteSshConfigId 'mkdir -p \"$remoteDir\"' && scp -Cq \"$appDir/$rPath\" $remoteSshConfigId:\"$dstPath\"";
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
                            H::info(H::i($indentLevel + 2) . "Removing <b>$rPath</b> from remote <b>$remote</b> ($count/$nbOperations)...", $output);
                            $cmd = "ssh $remoteSshConfigId 'rm \"$remoteRootDir/$rPath\"'";
                            if (true === ConsoleTool::exec($cmd)) {
                                $output->write('<success>ok</success>.' . PHP_EOL);
                            } else {
                                $output->write('<error>oops</error>.' . PHP_EOL);
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
                    // PUSH ALL AT ONCE METHOD
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


                    $limit = ini_get('memory_limit');
                    ini_set('memory_limit', "256M");

                    $zipFile = $appDir . "/.deploy/app.zip";
                    H::info(H::i($indentLevel + 2) . "Creating archive in <b>$zipFile</b>...", $output);


                    $rpathsToAdd = [];
                    if (true === $parseAdd) {
                        $rpathsToAdd = $rPathsAdd;
                    }
                    if (true === $parseReplace) {
                        foreach ($rPathsReplace as $rpath) {
                            $rpathsToAdd[] = $rpath;
                        }
                    }


                    if (true === ZipTool::zipByPaths($zipFile, $appDir, $rpathsToAdd)) {

                        $output->write('<success>ok</success>.' . PHP_EOL);
                        ini_set('memory_limit', $limit);


                        $fileSize = ConvertTool::convertBytes(filesize($zipFile), 'm') . "Mb";
                        H::info(H::i($indentLevel + 2) . "Transferring zip archive ($fileSize) to remote <b>$remote</b>...", $output);

                        $cmd = "scp -Cq \"$zipFile\" $remoteSshConfigId:\"$remoteRootDir/.deploy/app.zip\"";

                        if (true === ConsoleTool::exec($cmd)) {
                            $output->write('<success>ok</success>.' . PHP_EOL);
                        } else {
                            $output->write('<error>oops</error>.' . PHP_EOL);
                            H::error(H::i($indentLevel + 3) . "Couldn't transfer the zip archive to the remote. Aborting." . PHP_EOL, $output);
                        }


                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::error(H::i($indentLevel + 3) . "Couldn't create the archive. Aborting." . PHP_EOL, $output);
                        ini_set('memory_limit', $limit);
                    }


                }


            } else {
                H::error(H::i($indentLevel) . "Missing option: <b>remote</b>." . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Invalid mode: <b>$invalidMode</b>." . PHP_EOL, $output);
        }

    }
}