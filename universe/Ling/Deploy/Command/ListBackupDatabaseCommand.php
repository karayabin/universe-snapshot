<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\RemoteConfHelper;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The ListBackupDatabaseCommand class.
 * This command lists the database backups of the application.
 *
 * To see the database backups available on the remote, use the **-r** flag.
 *
 *
 *
 *
 * Options, flags
 * -------------
 * - -r: remote flag. If set, this command will operate on the remote.
 * - conf=$path: the path to a proxy configuration file. This is used internally, you probably won't need to use this option.
 *
 *
 *
 */
class ListBackupDatabaseCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $remoteFlag = $input->hasFlag('r');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        $applicationDir = $conf['root_dir'];


        if (true === $remoteFlag) {


            $remoteSshConfigId = $conf['ssh_config_id'];
            $remoteRootDir = $conf['remote_root_dir'];
            $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
            $appDir = $conf['root_dir'];
            if (true === RemoteConfHelper::pushConf([
                    'root_dir' => $remoteRootDir,
                ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling the <b>list-backup-db</b> command on <b>remote</b>:" . PHP_EOL, $output);
                $cmd = "ssh $remoteSshConfigId deploy -x list-backup-db conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                ConsoleTool::passThru($cmd);
            }


        } else {


            $backupDir = $applicationDir . "/.deploy/backup-db";
            $noBackupFound = true;
            if (is_dir($backupDir)) {
                $sqlFiles = YorgDirScannerTool::getFilesWithExtension($backupDir, 'sql', false, true, true);
                if (count($sqlFiles) > 0) {


                    H::info(H::i($indentLevel) . "<b>$backupDir</b>:" . PHP_EOL, $output);

                    $noBackupFound = false;
                    foreach ($sqlFiles as $sqlFile) {
                        H::info(H::i($indentLevel + 1) . "- $sqlFile" . PHP_EOL, $output);
                    }
                }
            }


            if (true === $noBackupFound) {
                H::info(H::i($indentLevel) . "No backup found in <b>$backupDir</b>." . PHP_EOL, $output);
            }


        }


    }
}