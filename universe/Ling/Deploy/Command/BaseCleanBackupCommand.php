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
 * The BaseCleanBackupCommand class.
 *
 * This command helps cleaning backups.
 *
 */
class BaseCleanBackupCommand extends DeployGenericCommand
{

    /**
     * This property holds the commandName for this instance.
     * This is the clean backup command name.
     * @var string
     */
    protected $commandName;


    /**
     * This property holds the dirName for this instance.
     * This is the backup directory name.
     *
     * @var string
     */
    protected $dirName;

    /**
     * This property holds the extension for this instance.
     * This is the file extension of the backup.
     *
     * @var string
     */
    protected $extension;

    /**
     * This property holds whether to use the db filter.
     * The db filter is only useful for the clean-backup-db command.
     * @var bool = false
     */
    protected $useDbFilter;


    /**
     * Builds the BaseCleanBackupCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commandName = "clean-backup-db";
        $this->dirName = "backup-db";
        $this->extension = "sql";
        $this->useDbFilter = true;
    }


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $nameOption = $input->getOption('names');
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

            $exportArr = [
                'root_dir' => $remoteRootDir,
            ];
            if (true === $this->useDbFilter) {
                $exportArr['databases'] = $databasesConf;
            }

            if (true === RemoteConfHelper::pushConf($exportArr, $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling the <b>$this->commandName</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sName = (null !== $nameOption) ? 'names=' . $nameOption : '';
                $sKeep = (null !== $keepOption) ? 'keep=' . $keepOption : '';
                $sDb = (null !== $dbOption) ? 'db=' . $dbOption : '';
                $sDelete = (true === $deleteFlag) ? '-d' : '';
                $cmd = "ssh -t $remoteSshConfigId deploy -x $this->commandName $sDelete $sName $sKeep $sDb conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }


        } else {


            $backupDir = $applicationDir . "/.deploy/" . $this->dirName;

            if ($backupDir) {
                $backupPathsToDelete = [];


                list($named, $nonNamed) = BackupHelper::getNamedNonNamedBackups($backupDir, $this->extension);

                if (true === $this->useDbFilter) {
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
                    if ('.' . $this->extension !== substr($nameOption, -1 * (strlen($this->extension) + 1))) {
                        $theName .= "." . $this->extension;
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


                if ($backupPathsToDelete) {

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
                    H::info(H::i($indentLevel) . "No path to delete. Nothing to do." . PHP_EOL, $output);
                }

            } else {
                H::info(H::i($indentLevel) . "The backup directory doesn't exist: <b>$backupDir</b>. No backups to clean." . PHP_EOL, $output);
            }
        }
        return 0; // this command never fails
    }
}