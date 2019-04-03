<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\RemoteConfHelper;


/**
 * The ZipFilesCommand class.
 *
 * A zip utility to zip files listed in a source file.
 *
 *
 *
 *
 * Options
 * ------------
 * - src=$path. The path to the source file.
 *      The source file contains a list of relative paths to remove, one per line.
 *      The paths are relative to the current site's root dir, or, if the remote option is set, relative to the remote's root dir.
 *      If the path is a directory, it will be zipped recursively.
 *
 * - dst=$path. The path to the zip archive to create.
 * - ?conf=$path. The path to a proxy conf file used temporarily on the remote.
 *      This option is used internally and you shouldn't use it manually.
 *
 * - -r: the remote flag. If set, this command will be called on the remote (over ssh) instead of the current site.
 *
 *
 */
class ZipFilesCommand extends DeployGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $src = $input->getOption('src', null);
        $dst = $input->getOption('dst', null);
        $confPath = $input->getOption("conf");
        $useRemote = $input->hasFlag('r');
        $indentLevel = $this->application->getBaseIndentLevel();


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        $appDir = $conf['root_dir'];


        if (null !== $src) {
            if (null !== $dst) {
                if (true === $useRemote) {


                    $remoteSshConfigId = $conf['ssh_config_id'];
                    $remoteRootDir = $conf['remote_root_dir'];


                    H::info(H::i($indentLevel) . "Calling <b>zip</b> command on remote:" . PHP_EOL, $output);
                    $cmd = "ssh $remoteSshConfigId deploy conf=\"$remoteRootDir\" zip src=\"$src\" dst=\"$dst\" indent=" . ($indentLevel + 1);
                    ConsoleTool::passThru($cmd);


                    $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
                    if (true === RemoteConfHelper::pushConf([
                            'root_dir' => $remoteRootDir,
                        ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                        H::info(H::i($indentLevel) . "Calling <b>zip</b> command on remote:" . PHP_EOL, $output);
                        $cmd = "ssh $remoteSshConfigId deploy conf=\"$dstTmpConf\" zip src=\"$src\" dst=\"$dst\" indent=" . ($indentLevel + 1);
                        if(true===ConsoleTool::passThru($cmd)){
                            return 0;
                        }
                    }


                } else {

                    H::info(H::i($indentLevel) . "Creating zip file <b>$dst</b> with files listed in <b>$src</b>...", $output);
                    if (file_exists($src)) {
                        $files = file($src, \FILE_IGNORE_NEW_LINES);
                        if ($files) {

                            $dstDir = dirname($dst);
                            FileSystemTool::mkdir($dstDir);
                            if (file_exists($dst)) {
                                FileSystemTool::remove($dst);
                            }

                            $errors = [];
                            $failed = [];
                            if (true === ZipTool::zipByPaths($dst, $appDir, $files, $errors, $failed)) {
                                $output->write('<success>ok</success>' . PHP_EOL);
                                return 0;
                            } else {
                                $output->write('<error>oops</error>' . PHP_EOL);
                                if ($errors) {
                                    H::error(H::i($indentLevel + 1) . "The following errors occurred:" . PHP_EOL, $output);
                                    foreach ($errors as $error) {
                                        H::error(H::i($indentLevel + 2) . "- $error" . PHP_EOL, $output);
                                    }
                                }

                                if ($failed) {
                                    H::error(H::i($indentLevel + 1) . "The following files couldn't be added to the archive:" . PHP_EOL, $output);
                                    foreach ($failed as $file) {
                                        H::error(H::i($indentLevel + 2) . "- $file" . PHP_EOL, $output);
                                    }
                                }

                            }
                        } else {
                            H::info(H::i($indentLevel + 1) . "No files to remove (src file is empty)." . PHP_EOL, $output);
                        }


                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::error(H::i($indentLevel + 1) . "The src file doesn't exist: <b>$src</b>. Aborting." . PHP_EOL, $output);
                    }
                }
            } else {
                H::error(H::i($indentLevel) . "Missing option: <b>dst</b>." . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>src</b>." . PHP_EOL, $output);
        }
        return 2;
    }
}