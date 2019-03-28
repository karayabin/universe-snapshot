<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\BackupHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The CleanBackupDatabaseCommand class.
 *
 * This command deletes database backups of the project.
 *
 *
 * It distinguishes between two types of database backups:
 *
 * - the non-named backups (created with the **create-db** command without the **name** option), which look like this: 2019-03-26__08-49-17.sql
 * - the named backups (created with the **create-db** command with the **name** option), which look like this: my_backup.sql
 *
 * The general idea is that the named backups are always preserved, unless you delete them explicitly with the **name** option or the **-d** flag.
 *
 *
 * By default, this command will keep all the named database backups, and also keep the 10 last non-named database backups and delete all other non-named backups.
 *
 * The number 10 can be changed with the **keep** option.
 *
 * By default this command operates on the site (aka local machine), use the **-r** flag to operate on the remote.
 *
 *
 * To remove a specific database backup, or a set of database backups, you can use the **name** option.
 * This will remove all database backups having the given name.
 *
 * To clean the database backup directory, effectively removing ALL database backups, use the **-d** flag.
 *
 *
 *
 * The path for a backup has the following format:
 *
 * ```txt
 * $root_dir/.deploy/backup-db/$database_identifier/$backup_name
 * ```
 *
 * By default, the command repeats the same operation for every $database_identifier found.
 * To define the set of database identifiers to operate on, use the **db** option.
 *
 *
 *
 *
 *
 * Options, flags
 * ------------
 * - -r: remote flag. If set, the command will operate on the remote rather than on the site.
 * - -d: delete flag. If set, remove ALL the database backups. This flag has precedence over any other options.
 * - keep=$number: defines the number of non-named database backups to keep (all other older non-named backups will be removed).
 * - db=$database_identifier: comma separated list of database identifiers. It represents the database identifiers to operate on.
 * - name=$names: the comma separated list of backup names to delete. Note: the ".sql" extension is appended automatically if omitted.
 *                  Spaces between the comma an the names are allowed.
 *
 *
 */
class CleanBackupDatabaseCommand extends DeployGenericCommand
{
    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('name');
        $keepOption = $input->getOption('keep');
        $dbOption = $input->getOption('db');
        $remoteFlag = $input->hasFlag('r');
        $deleteFlag = $input->hasFlag('d');
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
                H::info(H::i($indentLevel) . "Calling the <b>clean-backup-db</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sName = (null !== $nameOption) ? 'name=' . $nameOption : '';
                $sKeep = (null !== $keepOption) ? 'keep=' . $keepOption : '';
                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sDelete = (true === $deleteFlag) ? '-d' : '';
                $cmd = "ssh -t $remoteSshConfigId deploy -x clean-backup-db $sDelete $sName $sKeep $sDb conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                ConsoleTool::passThru($cmd);
            }


        } else {


            $backupDir = $applicationDir . "/.deploy/backup-db";

            if ($backupDir) {
                $backupPathsToDelete = [];


                list($named, $nonNamed) = BackupHelper::getNamedNonNamedBackups($backupDir, 'sql');
                if (null !== $dbOption) {
                    $databaseIdentifiers = array_map(function ($v) {
                        return trim($v);
                    }, explode(',', $dbOption));

                    $dropItems = function ($v) use ($databaseIdentifiers) {
                        return in_array(basename(dirname($v)), $databaseIdentifiers);
                    };

                    $named = array_filter($named, $dropItems);
                    $nonNamed = array_filter($nonNamed, $dropItems);

                }

                //--------------------------------------------
                // DELETE ALL FLAG
                //--------------------------------------------
                if (true === $deleteFlag) {
                    $backupPathsToDelete = array_merge($named, $nonNamed);
                }
                //--------------------------------------------
                // KEEP ALGORITHM
                //--------------------------------------------
                elseif (null !== $keepOption) {
                    keepalgo:
                    $keepOption = (int)$keepOption;

                    $nonNamedByDir = [];
                    foreach ($nonNamed as $file) {
                        $dir = dirname($file);
                        if (false === array_key_exists($dir, $nonNamedByDir)) {
                            $nonNamedByDir[$dir] = [];
                        }
                        $nonNamedByDir[$dir][] = $file;
                    }

                    foreach ($nonNamedByDir as $dir => $files) {
                        $backupPathsToDelete = array_merge($backupPathsToDelete, array_slice($files, $keepOption));
                    }
                }
                //--------------------------------------------
                // NAME ALGORITHM
                //--------------------------------------------
                elseif (null !== $nameOption) {
                    $allFiles = array_merge($named, $nonNamed);
                    $theName = $nameOption;
                    if ('.sql' !== substr($nameOption, -4)) {
                        $theName .= ".sql";
                    }
                    foreach ($allFiles as $file) {
                        $baseName = basename($file);
                        if ($baseName === $theName) {
                            $backupPathsToDelete[] = $file;
                        }
                    }
                }
                //--------------------------------------------
                // DEFAULT ALGORITHM
                //--------------------------------------------
                else {
                    $keepOption = 10;
                    goto keepalgo;
                }


                foreach ($backupPathsToDelete as $file) {
                    H::info(H::i($indentLevel) . "Deleting backup <b>$file</b>...", $output);
                    if (true === FileSystemTool::remove($file)) {
                        $output->write('<success>ok</success>.' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>.' . PHP_EOL);
                        H::info(H::i($indentLevel + 1) . "Couldn't delete this backup file." . PHP_EOL, $output);
                    }
                }

            } else {
                H::info(H::i($indentLevel) . "The database backup directory doesn't exist: <b>$backupDir</b>. No backups to clean." . PHP_EOL, $output);
            }
        }
    }
}