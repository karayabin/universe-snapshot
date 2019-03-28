<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\ScpHelper;

/**
 * The FetchBackupDatabaseCommand class.
 *
 * This command repatriates database backups from the remote to the local project.
 *
 * By default, it repatriates every single database backup.
 * To define a subset of database backup to repatriate, use the **name** option.
 *
 *
 * This operation will overwrite existing files.
 *
 *
 *
 * Options, flags
 * ------------
 * - name=$names: the comma separated list of backup names to repatriate. Note: the ".sql" extension is appended automatically if omitted.
 *                  Spaces between the comma an the names are allowed.
 *
 *
 */
class FetchBackupDatabaseCommand extends DeployGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        /**
         * The technique used here:
         *
         * - we first create a zip archive on the remote, containing all db backups to repatriate
         * - then we download it on the local machine and extract it
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

        $sName = (null !== $nameOption) ? 'name="' . $nameOption . '"' : '';
        H::info(H::i($indentLevel) . "Creating zip archive in <b>$remoteZipPath</b>, by executing the <b>zip-backup</b> command:" . PHP_EOL, $output);
        $cmd = "ssh $remoteSshConfigId deploy -x zip-backup dst=\"$remoteZipPath\" dir=\"$remoteBackupDir\" ext=sql $sName indent=" . ($indentLevel + 1);
        if (true === ConsoleTool::passThru($cmd)) {
            H::success(H::i($indentLevel) . "The zip archive was created successfully." . PHP_EOL, $output);


            H::info(H::i($indentLevel) . "Downloading the zip archive from the remote...", $output);
            $localZipPath = $applicationDir . '/.deploy/backup-db.zip';
            if (true === ScpHelper::fetch($remoteZipPath, $localZipPath, $remoteSshConfigId)) {
                $output->write('<success>ok</success>.' . PHP_EOL);
                $localBackupDir = $applicationDir . '/.deploy/backup-db';
                H::info(H::i($indentLevel) . "Extracting the zip archive <b>$localZipPath</b> to <b>$localBackupDir</b>...", $output);
                if (true === ZipTool::unzip($localZipPath, $localBackupDir)) {
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