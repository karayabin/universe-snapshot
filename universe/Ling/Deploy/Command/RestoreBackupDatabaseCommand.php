<?php


namespace Ling\Deploy\Command;


use Ling\Bat\BDotTool;
use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\BackupHelper;
use Ling\Deploy\Helper\MysqlHelper;
use Ling\Deploy\Helper\OptionHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The RestoreBackupDatabaseCommand class.
 *
 * This command restores database backups.
 *
 * By default, it will restore every last non-named backup found in every database identifier.
 * Reminder: the structure of a database backup is the following:
 *
 * ```txt
 * $project_root_dir/.deploy/backup-db/$database_identifier/$backup_name
 * ```
 *
 * Which implies that a backup name could be located under different database identifiers at the same time.
 *
 *
 * To define the name of the database backup to restore, use the **name** option.
 * To restrict the database identifiers to a smaller subset, use the **db** option.
 *
 *
 * By default, this operation will drop the database before applying the backup.
 * If you want to not drop the database, use the **-k** flag.
 *
 *
 *
 *
 * Options, flags
 * ------------
 * - name=$name: the name of the database backup to restore.
 *          The ".sql" extension is appended automatically if necessary.
 * - db=$identifier: the comma separated list of database identifiers to process.
 * - -r: remote flag. If set, the operation will be executed on the remote rather than on the local application.
 * - -s: secure flag. If set, this command will prompt the user for required database password(s).
 * - -k: keep flag. If set, this command will not drop the database before restoring the backup.
 *
 *
 */
class RestoreBackupDatabaseCommand extends DeployGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('name');
        $dbOption = $input->getOption('db');
        $secureFlag = $input->hasFlag('s');
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
                H::info(H::i($indentLevel) . "Calling <b>restore-backup-db</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sSecure = (true === $secureFlag) ? '-s' : '';
                $sKeep = (true === $keepFlag) ? '-k' : '';
                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sName = (null !== $nameOption) ? 'name=' . $nameOption : '';

                $cmd = "ssh $remoteSshConfigId deploy -x restore-backup-db $sSecure $sKeep $sDb $sName conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }


        } else {


            $backupDir = $applicationDir . '/.deploy/backup-db';
            $databases = [];
            if (null !== $dbOption) {
                $databases = OptionHelper::csvToArray($dbOption);
            }
            $name = $nameOption;
            list($named, $nonNamed) = BackupHelper::getNamedNonNamedBackups($backupDir, 'sql');
            $allFiles = array_merge($named, $nonNamed);


            //--------------------------------------------
            // SELECTING BACKUP FILES
            //--------------------------------------------
            H::info(H::i($indentLevel) . "Selecting backup files:" . PHP_EOL, $output);

            // filtering databases
            if (false === empty($databases)) {
                $allFiles = array_filter($allFiles, function ($file) use ($databases) {
                    return in_array(basename(dirname($file)), $databases, true);
                });
            }


            // filtering name
            if (null !== $name) {
                if (".sql" !== substr($name, -4)) {
                    $name .= '.sql';
                }
                $allFiles = array_filter($allFiles, function ($file) use ($name) {
                    return (basename($file) === $name);
                });
            }


            // what are the database identifiers used?
            $databaseIdentifiers = [];
            foreach ($allFiles as $file) {
                $databaseIdentifiers[] = basename(dirname($file));
            }
            $databaseIdentifiers = array_unique($databaseIdentifiers);


            if (null === $name) {
                // by default, select the most recent non-named backups
                $groupedByDbIdentifiers = [];
                foreach ($nonNamed as $file) {
                    $dbIdentifier = basename(dirname($file));
                    if (false === array_key_exists($dbIdentifier, $groupedByDbIdentifiers)) {
                        $groupedByDbIdentifiers[$dbIdentifier] = [];
                    }
                    $groupedByDbIdentifiers[$dbIdentifier][] = $file;
                }

                $selectedGroupByDbIdentifiers = [];
                foreach ($databaseIdentifiers as $dbIdentifier) {
                    if (array_key_exists($dbIdentifier, $groupedByDbIdentifiers)) {
                        $selectedGroupByDbIdentifiers[$dbIdentifier] = $groupedByDbIdentifiers[$dbIdentifier];
                    }
                }

                $latests = [];
                foreach ($selectedGroupByDbIdentifiers as $files) {
                    $latests[] = array_shift($files);
                }

                $allFiles = $latests;
            }

            foreach ($allFiles as $file) {
                H::info(H::i($indentLevel + 1) . "- $file" . PHP_EOL, $output);
            }


            //--------------------------------------------
            // CHECKING CONFIGURATION
            //--------------------------------------------
            H::info(H::i($indentLevel) . "Checking configuration for selected backup files:" . PHP_EOL, $output);
            $usedDbIdentifiers = [];
            foreach ($allFiles as $file) {
                $usedDbIdentifiers[] = basename(dirname($file));
            }
            $usedDbIdentifiers = array_unique($usedDbIdentifiers);

            $infoStatements = MysqlHelper::getDatabasesConfigurationInfo($usedDbIdentifiers, $databasesConf, $output, $indentLevel + 1);
            $hasError = false;
            if (false !== $infoStatements) {

                // making sure every database identifiers has a corresponding conf item
                foreach ($infoStatements as $infoStatement) {
                    list($dbIdentifier, $name, $user, $pass) = $infoStatement;
                    if (false === in_array($dbIdentifier, $usedDbIdentifiers, true)) {
                        $hasError = true;
                        H::error(H::i($indentLevel) . "The database identifier <b>$dbIdentifier</b> was not defined in the <b>configuration file</b>." . PHP_EOL, $output);
                    }
                }
            } else {
                $hasError = true;
            }


            //--------------------------------------------
            // RESTORING BACKUPS
            //--------------------------------------------
            if (false === $hasError) {
                foreach ($allFiles as $file) {
                    $dbIdentifier = basename(dirname($file));
                    $infoStatement = $infoStatements[$dbIdentifier];
                    list($dbIdentifier, $name, $user, $pass) = $infoStatement;
                    H::info(H::i($indentLevel) . "Restoring backup <b>$file</b> for database <b>$name</b> and user <b>$user</b>:" . PHP_EOL, $output);


                    // drop database trick?
                    if (false === $keepFlag) {
                        $tmpSql = $applicationDir . '/.deploy/tmp.sql';
                        copy($file, $tmpSql);
                        $file = $tmpSql;
                        FileTool::prepend($file, 'drop database if exists `' . $name . '`;' . PHP_EOL);
                    }


                    // collate trick?
                    $collate = BDotTool::getDotValue("$dbIdentifier.collate", $databasesConf);
                    if (null !== $collate) {
                        MysqlHelper::alterCollate($file, $collate);
                    }


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

                        $cmd = 'mysql --defaults-extra-file="' . $tmpConfPath . '" < "' . $file . '"';
                    } else {
                        $cmd = 'mysql  -u' . $user . ' -p  < "' . $file . '"';
                    }


                    if (true === ConsoleTool::passThru($cmd)) {
                        H::success(H::i($indentLevel) . "The backup was successfully restored." . PHP_EOL, $output);
                    } else {
                        H::error(H::i($indentLevel) . "The backup couldn't be restored." . PHP_EOL, $output);
                    }

                    if (false === $secureFlag) {
                        FileSystemTool::remove($tmpConfPath);
                    }

                    if (false === $keepFlag) {
                        FileSystemTool::remove($tmpSql);
                    }


                }

                return 0;
            }
        }


        return 2;

    }
}