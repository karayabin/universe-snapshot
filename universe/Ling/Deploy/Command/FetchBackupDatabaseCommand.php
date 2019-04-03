<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\RemoteConfHelper;
use Ling\Deploy\Helper\ScpHelper;

/**
 * The FetchBackupDatabaseCommand class.
 *
 * This command repatriates database backups from the remote to the local project.
 *
 * By default, it repatriates all database backup.
 * To define a subset of database backup to repatriate, you can use one of the following options:
 *
 * - the **name** option
 * - the **last** option
 * - the **db** option
 *
 * If the **name** option is defined, the last option will be ignored.
 *
 * The **name** option allows you to specify the name(s) of the database backups to fetch.
 * The **last** option allows you to define the number of the non-named backups (per database identifier) to fetch.
 * The **db** option defines which database identifiers will be parsed (database backups are
 *      organized by database identifiers).
 *      This option is executed before the **name** and **last** option.
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
 * - last=$number: indicates the (max) number of non-named backups (per database identifier) to fetch.
 * - db=$database_identifiers: a comma separated list of database identifiers to parse.
 *
 */
class FetchBackupDatabaseCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('names');
        $lastOption = $input->getOption('last');
        $dbOption = $input->getOption('db');
        $conf = $this->application->getProjectConf();


        $applicationDir = $conf['root_dir'];
        $remoteRootDir = $conf['remote_root_dir'];
        $remoteBackupDir = $remoteRootDir . "/.deploy/backup-db";
        $remoteZipPath = $remoteRootDir . "/.deploy/backup-db.zip";


        H::info(H::i($indentLevel) . "Creating zip archive in <b>$remoteZipPath</b>, by executing the <b>zip-backup-db</b> command on the remote:" . PHP_EOL, $output);

        $remoteSshConfigId = $conf['ssh_config_id'];
        $remoteRootDir = $conf['remote_root_dir'];
        $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
        $appDir = $conf['root_dir'];
        if (true === RemoteConfHelper::pushConf([
                'root_dir' => $remoteRootDir,
            ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {


            $sName = (null !== $nameOption) ? 'names="' . $nameOption . '"' : '';
            $sLast = (null !== $lastOption) ? 'last="' . $lastOption . '"' : '';
            $sDb = (null !== $dbOption) ? 'db="' . $dbOption . '"' : '';
            $cmd = "ssh $remoteSshConfigId deploy -x zip-backup-db conf=\"$dstTmpConf\" dst=\"$remoteZipPath\" dir=\"$remoteBackupDir\" ext=sql $sName $sLast $sDb indent=" . ($indentLevel + 1);

            if (true === ConsoleTool::passThru($cmd)) {
                H::success(H::i($indentLevel) . "The zip archive was created successfully." . PHP_EOL, $output);


                $localZipPath = $applicationDir . '/.deploy/backup-db.zip';
                H::info(H::i($indentLevel) . "Downloading the zip archive from the remote to <b>$localZipPath</b>...", $output);
                if (true === ScpHelper::fetch($remoteZipPath, $localZipPath, $remoteSshConfigId)) {
                    $output->write('<success>ok</success>.' . PHP_EOL);
                    $localBackupDir = $applicationDir . '/.deploy/backup-db';
                    H::info(H::i($indentLevel) . "Extracting the zip archive <b>$localZipPath</b> to <b>$localBackupDir</b>...", $output);
                    if (true === ZipTool::unzip($localZipPath, $localBackupDir)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                        return 0;
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


        return 2;
    }
}