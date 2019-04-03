<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\LocalHostTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\MysqlHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The BackupDatabaseCommand class.
 *
 * This command creates the backup(s) for the database(s) specified in the @page(configuration file).
 *
 *
 * The design below was driven by the idea that databases are owned by users, and each user has a different password.
 * And to restore a backup, you also need the user password.
 *
 *
 *
 * Backups for databases are stored at the project level, at:
 *
 *      $project_root_dir/.deploy/backup-db/$database_identifier/$backup_name
 *
 * By default, all databases of the project are backed up (each database identifier leading to the creation of one backup file).
 * To specify which subset of databases to backup, use the **db** option.
 *
 * The main idea is that when you refer to a $backup_name, you actually refer to all files with the same $backup_name,
 * possibly stored across different $backup_identifiers.
 *
 *
 * By default, this command operates on the site (i.e. the current application on the local machine).
 * Use the -r flag to operate on the remote.
 *
 *
 * The default backup name will be based on the date and will look like this:
 *
 *      2019-03-26__08-49-17.sql
 *
 * (this is basically the datetime)
 *
 * To specify the backup name manually, use the name option.
 * If you do so, the ".sql" extension will be appended automatically if it's not already in the name you gave.
 *
 *
 *
 * By default, the user will not be prompted with the database(s) password(s).
 * The technique used is to create a temporary file containing the (mysql) configuration, and then pass that file
 * using the mysqldump --defaults-extra-file option, a technique described in more details here:
 * https://stackoverflow.com/questions/20751352/suppress-warning-messages-using-mysql-from-within-terminal-but-password-written/22933056#22933056
 *
 *
 * Note: this is not the root password though (unless you use your root user for creating your app's databases, which you should NEVER do),
 * just a database password that must be in your app anyway in a form or another.
 * This saves the user some typing.
 *
 * If you want to type the passwords manually, use the **-s** flag, in which case you will be prompted for a password
 * for every database that you want to backup. So, if your project contains 3 databases, you will be prompted 3 times
 * for every backup that you want to create.
 *
 *
 *
 *
 *
 *
 * Options, flags
 * -------------
 * - ?db=$dbIdentifier. Specifies the database identifier to backup. Can also be a comma separated list of database identifiers.
 * - ?name=$name. Specifies the name of the backup to create. The name must not start with a dot (otherwise you won't be able to target it with other commands).
 * - -r: remote flag. If set, this command will operate on the remote.
 * - -s: secure flag. If set, this command will prompt the user for required database password(s).
 * - -o: open dir(s) flag. If set, and if you are on mac, the command will open the backup directory(ies) in the Finder.
 *
 *
 *
 *
 */
class BackupDatabaseCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $dbOption = $input->getOption('db');
        $backupName = $input->getOption('name', date('Y-m-d__H-i-s.\s\q\l'));
        $remoteFlag = $input->hasFlag('r');
        $secureFlag = $input->hasFlag('s');
        $openFlag = $input->hasFlag('o');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        $applicationDir = $conf['root_dir'];
        $databasesConf = $conf["databases"] ?? [];


        if (true === $remoteFlag) {


            $remoteSshConfigId = $conf['ssh_config_id'];
            $remoteRootDir = $conf['remote_root_dir'];
            $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
            $appDir = $conf['root_dir'];
            if (true === RemoteConfHelper::pushConf([
                    'root_dir' => $remoteRootDir,
                    'databases' => $databasesConf,
                ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling <b>backup-db</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sSecure = (true === $secureFlag) ? '-s' : '';
                $sDb = (null !== $dbOption) ? 'db="' . $dbOption . '"' : '';
                $sName = (null !== $backupName) ? 'name="' . $backupName . '"' : '';
                $cmd = "ssh $remoteSshConfigId deploy -x backup-db $sSecure $sDb $sName conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }


        } else {


            if ('.sql' !== substr($backupName, -4)) {
                $backupName .= '.sql';
            }


            //--------------------------------------------
            // WHAT DATABASES?
            //--------------------------------------------
            if (null !== $dbOption) {
                $databases = array_map(function ($v) {
                    return trim($v);
                }, explode(',', $dbOption));
            } else {
                $databases = array_keys($databasesConf);
            }

            //--------------------------------------------
            // CHECK FOR ERRORS AND COLLECT INFO
            //--------------------------------------------
            $infoStatements = MysqlHelper::getDatabasesConfigurationInfo($databases, $databasesConf, $output, $indentLevel);
            if (false !== $infoStatements) {

                //--------------------------------------------
                // CREATING THE BACKUPS one by one
                //--------------------------------------------
                foreach ($infoStatements as $infoStatement) {
                    list($databaseIdentifier, $name, $user, $pass) = $infoStatement;

                    $sqlBackupPath = $applicationDir . "/.deploy/backup-db/$databaseIdentifier/$backupName";
                    $sqlBackupDir = dirname($sqlBackupPath);

                    if (false === $secureFlag) {


                        /**
                         * https://stackoverflow.com/questions/20751352/suppress-warning-messages-using-mysql-from-within-terminal-but-password-written/22933056#22933056
                         */
                        $tmpConfPath = $applicationDir . "/.deploy/tmp-conf.cnf";
                        $tmpConfContent = <<<EEE
[client]
user = $user
password = $pass
host = localhost
EEE;

                        FileSystemTool::mkfile($tmpConfPath, $tmpConfContent);

                        $cmd = 'mkdir -p "' . $sqlBackupDir . '" && mysqldump --defaults-extra-file="' . $tmpConfPath . '" --single-transaction --quick --lock-tables=false --databases ' . $name . ' > "' . $sqlBackupPath . '"';
                    } else {
                        $cmd = 'mkdir -p "' . $sqlBackupDir . '" && mysqldump  -u' . $user . ' -p --single-transaction --quick --lock-tables=false --databases ' . $name . ' > "' . $sqlBackupPath . '"';
                    }


                    H::info(H::i($indentLevel) . "Creating backup for database (id=<b>$databaseIdentifier</b>) in <b>$sqlBackupPath</b>:" . PHP_EOL, $output);
                    if (true === ConsoleTool::passThru($cmd)) {
                        H::success(H::i($indentLevel) . "The backup was created successfully." . PHP_EOL, $output);

                        if (true === $openFlag && true === LocalHostTool::isMac()) {
                            $cmd = 'open "' . $sqlBackupDir . '"';
                            ConsoleTool::passThru($cmd);
                        }


                    } else {
                        H::error(H::i($indentLevel) . "The backup couldn't be created." . PHP_EOL, $output);
                    }


                    if (false === $secureFlag) {
                        FileSystemTool::remove($tmpConfPath);
                    }
                }
                return 0;
            }


        }

        return 6;
    }
}
