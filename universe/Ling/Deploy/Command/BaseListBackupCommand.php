<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\RemoteConfHelper;
use Ling\DirScanner\YorgDirScannerTool;

/**
 *
 * The BaseListBackupCommand class.
 * A helper for commands which list backups.
 *
 *
 */
class BaseListBackupCommand extends DeployGenericCommand
{


    /**
     * This property holds the extension for this instance.
     * @var string
     */
    protected $extension;

    /**
     * This property holds the backupDirName for this instance.
     * @var string
     */
    protected $backupDirName;


    /**
     * This property holds the commandName for this instance.
     * @var string
     */
    protected $commandName;


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

                $cmdName = $this->commandName;
                H::info(H::i($indentLevel) . "Calling the <b>$cmdName</b> command on <b>remote</b>:" . PHP_EOL, $output);
                $cmd = "ssh $remoteSshConfigId deploy -x $cmdName conf=\"$dstTmpConf\" indent=" . ($indentLevel + 1);
                if (true === ConsoleTool::passThru($cmd)) {
                    return 0;
                }
            }


        } else {


            $backupDir = $applicationDir . "/.deploy/" . $this->backupDirName;
            $noBackupFound = true;
            if (is_dir($backupDir)) {
                $files = YorgDirScannerTool::getFilesWithExtension($backupDir, $this->extension, false, true, true);
                if (count($files) > 0) {


                    H::info(H::i($indentLevel) . "<b>$backupDir</b>:" . PHP_EOL, $output);

                    $noBackupFound = false;
                    foreach ($files as $file) {
                        H::info(H::i($indentLevel + 1) . "- $file" . PHP_EOL, $output);
                    }
                }
            }


            if (true === $noBackupFound) {
                H::info(H::i($indentLevel) . "No backup found in <b>$backupDir</b>." . PHP_EOL, $output);
            }


        }

        return 0;
    }
}