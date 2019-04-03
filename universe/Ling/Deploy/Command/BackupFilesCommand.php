<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\LocalHostTool;
use Ling\Bat\ZipTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\FilesHelper;
use Ling\Deploy\Helper\MapHelper;
use Ling\Deploy\Helper\RemoteConfHelper;

/**
 * The BackupFilesCommand class.
 *
 * This command creates a backup of the files of the application.
 *
 *
 * Options, flags
 * -------------
 * - ?name=$name. Specifies the name of the backup to create. The name must not start with a dot (otherwise you won't be able to target it with other commands).
 * - -r: remote flag. If set, this command will operate on the remote.
 * - -m: map flag. If set, the backup files to put in the archive will be filtered by the map-conf directive of the configuration file.
 * - -o: open dir(s) flag. If set, and if you are on mac, the command will open the backup directory(ies) in the Finder.
 *
 *
 *
 *
 */
class BackupFilesCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $backupName = $input->getOption('name', date('Y-m-d__H-i-s.\z\i\p'));
        $remoteFlag = $input->hasFlag('r');
        $openFlag = $input->hasFlag('o');
        $mapFlag = $input->hasFlag('m');
        $confPath = $input->getOption("conf");


        if (null === $confPath) {
            $conf = $this->application->getProjectConf();
        } else {
            $conf = RemoteConfHelper::readConfByFile($confPath);
        }


        // hack me
        $applicationDir = $conf['root_dir'];
        $mapConf = $conf["map-conf"];


        if (true === $remoteFlag) {


            $remoteSshConfigId = $conf['ssh_config_id'];
            $remoteRootDir = $conf['remote_root_dir'];
            $dstTmpConf = $remoteRootDir . "/.deploy/tmp-conf.byml";
            $appDir = $conf['root_dir'];
            if (true === RemoteConfHelper::pushConf([
                    'root_dir' => $remoteRootDir,
                    'map-conf' => $mapConf,
                ], $remoteSshConfigId, $appDir, $dstTmpConf, $output, $indentLevel)) {
                H::info(H::i($indentLevel) . "Calling <b>backup-files</b> command on <b>remote</b>:" . PHP_EOL, $output);

                $sName = (null !== $backupName) ? 'name="' . $backupName . '"' : '';
                $sMap = (true === $mapFlag) ? '-m' : '';
                $cmd = "ssh $remoteSshConfigId deploy -x backup-files $sMap $sName conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }
        } else {
            if ('.zip' !== substr($backupName, -4)) {
                $backupName .= '.zip';
            }


            if (file_exists($applicationDir)) {


                //--------------------------------------------
                // CREATE THE BACKUP
                //--------------------------------------------
                $localZipPath = $applicationDir . "/.deploy/backup-files/$backupName";
                H::info(H::i($indentLevel) . "Creating backup <b>$localZipPath</b>...", $output);
                FileSystemTool::mkdir(dirname($localZipPath));


                // collect all files, except the .deploy dir
                if (false === $mapFlag) {
                    $files = FilesHelper::getApplicationFiles($applicationDir, true);
                } else {
                    $files = MapHelper::collectFiles($applicationDir, $mapConf);
                }

                $errors = [];
                $failed = [];
                if (true === ZipTool::zipByPaths($localZipPath, $applicationDir, $files, $errors, $failed)) {
                    $output->write('<success>ok</success>' . PHP_EOL);
                    if (true === $openFlag && true === LocalHostTool::isMac()) {
                        $cmd = 'open "' . $applicationDir . '"';
                        ConsoleTool::passThru($cmd);
                    }


                    return 0;
                } else {
                    $output->write('<error>oops</error>' . PHP_EOL);
                    if ($errors) {
                        H::error(H::i($indentLevel + 1) . "The following errors occurred:" . PHP_EOL, $output);
                        foreach ($errors as $error) {
                            H::error(H::i($indentLevel + 2) . "- $error" . PHP_EOL, $output);
                        }
                    }

                    if ($failed) {
                        H::error(H::i($indentLevel + 1) . "The following files couldn't be added to the archive:" . PHP_EOL, $output);
                        foreach ($failed as $file) {
                            H::error(H::i($indentLevel + 2) . "- $file" . PHP_EOL, $output);
                        }
                    }

                }
            } else {
                H::info(H::i($indentLevel) . "The application dir does not exist: <b>$applicationDir</b>. Nothing to do." . PHP_EOL, $output);
            }
        }
        return 2;
    }
}
