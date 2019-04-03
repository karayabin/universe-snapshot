<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\BackupHelper;
use Ling\Deploy\Helper\FilesHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The RestoreBackupFilesCommand class.
 *
 * This command restores files backups.
 *
 * By default, it will restore the last non-named backup found
 *
 *
 * To define the name of the files backup to restore, use the **name** option.
 *
 * By default, this operation will remove all the application files (except the .deploy directory) before extracting the backup.
 * If you don't want to remove all files, but rather extract the backup within the existing
 * application, use the **-k** flag.
 *
 *
 *
 *
 * Options, flags
 * ------------
 * - name=$name: the name of the database backup to restore.
 *          The ".zip" extension is appended automatically if necessary.
 * - -r: remote flag. If set, the operation will be executed on the remote rather than on the local application.
 * - -k: keep flag. If set, this command will not remove the application files before restoring the backup.
 *
 *
 */
class RestoreBackupFilesCommand extends DeployGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('name');
        $keepFlag = $input->hasFlag('k');
        $remoteFlag = $input->hasFlag('r');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }

        //
        $applicationDir = $conf['root_dir'];


        if (true === $remoteFlag) {


            $remoteSshConfigId = $conf['ssh_config_id'];
            $remoteRootDir = $conf['remote_root_dir'];
            $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
            $appDir = $conf['root_dir'];
            if (true === RemoteConfHelper::pushConf([
                    'root_dir' => $remoteRootDir,
                ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling <b>restore-backup-files</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sKeep = (true === $keepFlag) ? '-k' : '';
                $sName = (null !== $nameOption) ? 'name=' . $nameOption : '';

                $cmd = "ssh $remoteSshConfigId deploy -x restore-backup-files $sKeep $sName conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }


        } else {


            //--------------------------------------------
            // SELECTING BACKUP FILE
            //--------------------------------------------
            $backupFile = null;
            $backupDir = $applicationDir . '/.deploy/backup-files';
            $name = $nameOption;


            H::info(H::i($indentLevel) . "Selecting backup file:" . PHP_EOL, $output);


            // filtering name
            if (null !== $name) {
                if (".zip" !== substr($name, -4)) {
                    $name .= '.zip';
                }
                $backupFile = $backupDir . "/$name";
            } else {
                // by default, take the last non-named backup
                list($named, $nonNamed) = BackupHelper::getNamedNonNamedBackups($backupDir, 'zip');
                if ($nonNamed) {
                    $backupFile = array_shift($nonNamed);
                }
            }


            if (null !== $backupFile) {
                H::info(H::i($indentLevel + 1) . "- $backupFile" . PHP_EOL, $output);

                if (file_exists($backupFile)) {


                    //--------------------------------------------
                    // RESTORING BACKUP
                    //--------------------------------------------
                    H::info(H::i($indentLevel) . "Restoring backup <b>$backupFile</b>:" . PHP_EOL, $output);

                    // remove all application files first?
                    if (false === $keepFlag) {
                        $filesToDelete = FilesHelper::getApplicationFiles($applicationDir);
                        foreach ($filesToDelete as $file) {
                            FileSystemTool::remove($file);
                        }
                    }
                    if (true === ZipTool::unzip($backupFile, $applicationDir)) {
                        H::success(H::i($indentLevel) . "The backup was successfully restored." . PHP_EOL, $output);
                    } else {
                        H::error(H::i($indentLevel) . "The backup couldn't be restored." . PHP_EOL, $output);
                    }

                    return 0;

                } else {
                    H::error(H::i($indentLevel) . "The backup file $backupFile doesn't exist." . PHP_EOL, $output);
                }
            }
        }


        return 2;

    }
}