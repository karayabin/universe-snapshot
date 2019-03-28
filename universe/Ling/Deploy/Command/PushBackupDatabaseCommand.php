<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\ScpHelper;

/**
 * The PushBackupDatabaseCommand class.
 *
 * This command pushes database backups from the local project to the remote.
 *
 * By default, it pushes every single database backup.
 * To define a subset of database backup to upload, use the **name** option.
 *
 *
 * This operation will overwrite existing files.
 *
 *
 *
 * Options, flags
 * ------------
 * - name=$names: the comma separated list of backup names to upload. Note: the ".sql" extension is appended automatically if omitted.
 *                  Spaces between the comma an the names are allowed.
 *
 *
 */
class PushBackupDatabaseCommand extends DeployGenericCommand
{
    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        /**
         * The technique used here:
         *
         * - we first create a zip archive on the local machine, containing all db backups to upload
         * - then we upload it on the remote machine and extract it
         *
         */
        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('name');
        $conf = $this->application->getProjectConf();


        $applicationDir = $conf['root_dir'];
        $remoteRootDir = $conf['remote_root_dir'];
        $remoteBackupDir = $remoteRootDir . "/.deploy/backup-db";
        $remoteSshConfigId = $conf['ssh_config_id'];
        $remoteZipPath = $remoteRootDir . "/.deploy/backup-db.zip";
        $localBackupDir = $applicationDir . '/.deploy/backup-db';
        $localZipPath = $applicationDir . '/.deploy/backup-db.zip';


        H::info(H::i($indentLevel) . "Creating zip archive in <b>$localZipPath</b>, by executing the <b>zip-backup</b> command:" . PHP_EOL, $output);


        $sName = (null !== $nameOption) ? 'name="' . $nameOption . '"' : '';
        $cmd = "deploy -x zip-backup dst=\"$localZipPath\" dir=\"$localBackupDir\" ext=sql $sName indent=" . ($indentLevel + 1);
        if (true === ConsoleTool::passThru($cmd)) {
            H::success(H::i($indentLevel) . "The zip archive was created successfully." . PHP_EOL, $output);


            H::info(H::i($indentLevel) . "Uploading the zip archive to the remote...", $output);
            if (true === ScpHelper::push($localZipPath, $remoteZipPath, $remoteSshConfigId)) {
                $output->write('<success>ok</success>.' . PHP_EOL);
                H::info(H::i($indentLevel) . "Extracting the zip archive <b>$remoteZipPath</b> to <b>$remoteBackupDir</b>: calling the <b>unzip</b> command on the remote:" . PHP_EOL, $output);


                $cmd = "ssh $remoteSshConfigId deploy unzip src=\"$remoteZipPath\" dst=\"$remoteBackupDir\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    $output->write('<success>ok</success>.' . PHP_EOL);
                } else {
                    $output->write('<success>oops</success>.' . PHP_EOL);
                    H::error(H::i($indentLevel + 1) . "The archive couldn't be extracted." . PHP_EOL, $output);
                }

            } else {
                $output->write('<success>oops</success>.' . PHP_EOL);
                H::error(H::i($indentLevel + 1) . "An error occurred with the transfer." . PHP_EOL, $output);

            }

        } else {
            H::error(H::i($indentLevel) . "The zip archive couldn't be created. Aborting..." . PHP_EOL, $output);
        }


    }
}