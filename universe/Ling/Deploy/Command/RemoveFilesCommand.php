<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\RemoteConfHelper;


/**
 * The RemoveFilesCommand class.
 *
 * Removes files listed in a source file.
 *
 *
 * Options
 * ------------
 * - src=$path. The path to the source file.
 *      The source file contains a list of relative paths to remove, one per line.
 *      The paths are relative to the current site's root dir, or, if the remote option is set, relative to the remote's root dir.
 *      If the path is a directory, it will be ignored (design by security, to prevent removing entire directories).
 *
 *
 * - -r: remote. If set, the command will operate on the remote rather than on the site.
 *
 *
 */
class RemoveFilesCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $indentLevel = $this->application->getBaseIndentLevel();
        $src = $input->getOption('src', null);
        $useRemote = $input->hasFlag('r');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        $appDir = $conf['root_dir'];


        if (null !== $src) {
            if (true === $useRemote) {


                $remoteSshConfigId = $conf['ssh_config_id'];
                $remoteRootDir = $conf['remote_root_dir'];
                $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
                $appDir = $conf['root_dir'];
                if (true === RemoteConfHelper::pushConf([
                        'root_dir' => $remoteRootDir,
                    ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                    H::info(H::i($indentLevel) . "Calling <b>remove</b> command on <b>remote</b>:" . PHP_EOL, $output);
                    $mapCmd = "ssh $remoteSshConfigId deploy -x remove conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                    if (true === ConsoleTool::passThru($mapCmd)) {
                        return 0;
                    }
                }

            } else {

                H::info(H::i($indentLevel) . "Removing files listed in <b>$src</b>:" . PHP_EOL, $output);
                if (file_exists($src)) {
                    $files = file($src, \FILE_IGNORE_NEW_LINES);
                    if ($files) {
                        foreach ($files as $file) {
                            $apath = $appDir . "/" . $file;
                            H::info(H::i($indentLevel + 1) . "- $file...", $output);

                            if (is_file($apath)) {
                                if (true === FileSystemTool::remove($apath)) {
                                    $output->write('<success>ok</success>' . PHP_EOL);
                                } else {
                                    $output->write('<error>oops (cannot remove it)</error>' . PHP_EOL);
                                }
                            } else {
                                $output->write('<warning>skip (not a file: ' . $apath . ')</warning>' . PHP_EOL);
                            }
                        }
                    } else {
                        H::info(H::i($indentLevel + 1) . "No files to remove (src file is empty)." . PHP_EOL, $output);
                    }


                    return 0;

                } else {
                    $output->write('<error>oops</error>.' . PHP_EOL);
                    H::error(H::i($indentLevel + 1) . "The src file doesn't exist: <b>$src</b>. Aborting." . PHP_EOL, $output);
                }
            }
        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>src</b>." . PHP_EOL, $output);
        }
        return 2;
    }
}