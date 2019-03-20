<?php


namespace Ling\Deploy\Command;


use Ling\Bat\BDotTool;
use Ling\Bat\ConsoleTool;
use Ling\Bat\ConvertTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Application\DeployApplication;


/**
 * The PushCommand class.
 *
 * This command applies the diff between the current site map and the given remote's map.
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
        $conf = $this->application->getConf($output);
        $appDir = $this->application->getProjectDirectory();
        $useZip = $input->hasFlag("z");

        if (null !== $remote) {


            $remoteConf = BDotTool::getDotValue("remotes.$remote", $conf);
            if (null !== $remoteConf) {


                // first check remote conf
                $remoteSshConfigId = $remoteConf['ssh_config_id'] ?? null;
                $remoteRootDir = $remoteConf['root_dir'] ?? null;
                if (null !== $remoteSshConfigId) {
                    if (null !== $remoteRootDir) {


                        $sentence = "Pushing application dir <b>$appDir</b> to remote <b>$remote</b>";
                        if (true === $useZip) {
                            $sentence .= ", using zip method";
                        }
                        H::info(H::i($indentLevel) . $sentence . ":" . PHP_EOL, $output);


                        if (false === $useZip) {
                            //--------------------------------------------
                            // PUSH ONE BY ONE METHOD
                            //--------------------------------------------


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


                            //--------------------------------------------
                            // APPLYING THE DIFF MAP
                            //--------------------------------------------
                            H::info(H::i($indentLevel + 1) . "Applying the diff map:" . PHP_EOL, $output);
                            $addFile = $appDir . "/.deploy/diff-add.txt";
                            $removeFile = $appDir . "/.deploy/diff-remove.txt";
                            $replaceFile = $appDir . "/.deploy/diff-replace.txt";
                            $parseAdd = true;
                            $parseRemove = true;
                            $parseReplace = true;


                            if (false === file_exists($addFile)) {
                                $parseAdd = false;
                                H::warning(H::i($indentLevel + 2) . "<b>diff-add</b> file not found in $addFile." . PHP_EOL, $output);
                            }
                            if (false === file_exists($removeFile)) {
                                $parseRemove = false;
                                H::warning(H::i($indentLevel + 2) . "<b>diff-remove</b> file not found in $removeFile." . PHP_EOL, $output);
                            }
                            if (false === file_exists($replaceFile)) {
                                $parseReplace = false;
                                H::warning(H::i($indentLevel + 2) . "<b>diff-replace</b> file not found in $replaceFile." . PHP_EOL, $output);
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


                            $count = 1;
                            $nbFailure = 0;


                            if (true === $parseAdd) {
                                foreach ($rPathsAdd as $rPath) {
                                    H::info(H::i($indentLevel + 2) . "Adding <b>$rPath</b> to remote <b>$remote</b> ($count/$nbOperations)...", $output);
                                    $remoteDir = dirname("$remoteRootDir/$rPath");
                                    $cmd = "ssh $remoteSshConfigId 'mkdir -p \"$remoteDir\"' && scp -q \"$appDir/$rPath\" $remoteSshConfigId:\"$remoteRootDir/$rPath\"";
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
                                    $cmd = "ssh $remoteSshConfigId 'mkdir -p \"$remoteDir\"' && scp -q \"$appDir/$rPath\" $remoteSshConfigId:\"$remoteRootDir/$rPath\"";
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
                                    $cmd = "ssh $remoteSshConfigId 'rm \"$remoteRootDir/$rPath\"";
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
                            $zipFile = $appDir . "/.deploy/app.zip";
                            H::info(H::i($indentLevel + 2) . "Creating archive in <b>$zipFile</b>...", $output);
                            if (true === ZipTool::zip($appDir, $zipFile)) {
                                $output->write('<success>ok</success>.' . PHP_EOL);
                                $fileSize = ConvertTool::convertBytes(filesize($zipFile), 'm') . "Mb";
                                H::info(H::i($indentLevel + 2) . "Transferring zip archive ($fileSize) to remote <b>$remote</b>...", $output);

                                $cmd = "scp -q \"$zipFile\" $remoteSshConfigId:\"$remoteRootDir/.deploy/app.zip\"";

                                if (true === ConsoleTool::exec($cmd)) {
                                    $output->write('<success>ok</success>.' . PHP_EOL);
                                } else {
                                    $output->write('<error>oops</error>.' . PHP_EOL);
                                    H::error(H::i($indentLevel + 3) . "Couldn't transfer the zip archive to the remote. Aborting." . PHP_EOL, $output);
                                }


                            } else {
                                $output->write('<error>oops</error>.' . PHP_EOL);
                                H::error(H::i($indentLevel + 3) . "Couldn't create the archive. Aborting." . PHP_EOL, $output);
                            }


                        }

                    } else {
                        H::error(H::i($indentLevel) . "Incomplete configuration for remote <b>$remote</b>: <b>root_dir</b> key not found. Cannot connect to ssh remote." . PHP_EOL, $output);
                    }
                } else {
                    H::error(H::i($indentLevel) . "Incomplete configuration for remote <b>$remote</b>: <b>ssh_config_id</b> key not found. Cannot connect to ssh remote." . PHP_EOL, $output);
                }


            } else {
                H::error(H::i($indentLevel) . "No configuration found for remote <b>$remote</b>." . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>remote</b>." . PHP_EOL, $output);
        }

    }
}