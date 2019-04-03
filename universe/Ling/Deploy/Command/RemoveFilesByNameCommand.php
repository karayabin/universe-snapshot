<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\FilesHelper;
use Ling\Deploy\Helper\RemoteConfHelper;


/**
 * The RemoveFilesByNameCommand class.
 *
 * Removes files by name.
 *
 *
 * Options
 * ------------
 * - dir=$path. The path of the root dir containing the files to remove.
 * - names=$names. The comma separated list of file names to remove.
 * - -r: remote. If set, the command will operate on the remote rather than on the site.
 *
 *
 */
class RemoveFilesByNameCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $indentLevel = $this->application->getBaseIndentLevel();
        $dirOption = $input->getOption('dir', null);
        $namesOption = $input->getOption('names', null);
        $useRemote = $input->hasFlag('r');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        if (null !== $dirOption) {
            if (null !== $namesOption) {
                if (true === $useRemote) {


                    $remoteSshConfigId = $conf['ssh_config_id'];
                    $remoteRootDir = $conf['remote_root_dir'];
                    $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
                    $appDir = $conf['root_dir'];
                    if (true === RemoteConfHelper::pushConf([
                            'root_dir' => $remoteRootDir,
                        ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                        H::info(H::i($indentLevel) . "Calling <b>remove-files-by-name</b> command on <b>remote</b>:" . PHP_EOL, $output);
                        $sDir = (null !== $dirOption) ? 'dir="' . $dirOption . '"' : '';
                        $sNames = (null !== $namesOption) ? 'names="' . $namesOption . '"' : '';
                        $mapCmd = "ssh $remoteSshConfigId deploy -x remove-files-by-name conf=\"$dstTmpConf\" $sDir $sNames indent=" . ($indentLevel + 1);
                        if (true === ConsoleTool::passThru($mapCmd)) {
                            return 0;
                        }
                    }

                } else {

                    H::info(H::i($indentLevel) . "Removing files <b>$namesOption</b>:" . PHP_EOL, $output);
                    FilesHelper::removeFilesByName($dirOption, $namesOption);
                    return 0;
                }
            } else {
                H::error(H::i($indentLevel) . "Missing option: <b>names</b>." . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Missing option: <b>dir</b>." . PHP_EOL, $output);
        }
        return 2;
    }
}