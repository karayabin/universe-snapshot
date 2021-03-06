<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Helper\ScpHelper;

/**
 * The PushBackupFilesCommand class.
 *
 * This command pushes files backups from the local project to the remote.
 *
 * By default, it pushes all files backups.
 * To change this behaviour, you can use one of the following options:
 *
 * - the **name** option
 * - the **last** option
 *
 * If the **name** option is defined, the last option will be ignored.
 *
 * The **name** option allows you to specify the name(s) of the files backups to push.
 * The **last** option allows you to define the number of the non-named files backups to push.
 *
 * This operation will overwrite existing files.
 *
 *
 *
 * Options, flags
 * ------------
 * - names=$names: the comma separated list of files backup names to upload. Note: the ".zip" extension is appended automatically if omitted.
 *                  Spaces between the comma an the names are allowed.
 * - last=$number: indicates the (max) number of non-named files backups to push.
 *
 *
 */
class PushBackupFilesCommand extends AbstractBackupCommand
{


    /**
     * This property holds the exitCode for this instance.
     * @var int = 0
     */
    protected $exitCode;


    /**
     * Builds the PushBackupFilesCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->exitCode = 0;
    }


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $res = $this->createArchive($input, $output);
        if (false === $res) {
            return 3;
        }
        return $this->exitCode;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    protected function onArchiveReady(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $conf = $this->application->getProjectConf();


        $applicationDir = $conf['root_dir'];
        $remoteRootDir = $conf['remote_root_dir'];
        $remoteBackupDir = $remoteRootDir . "/.deploy/backup-files";
        $remoteSshConfigId = $conf['ssh_config_id'];
        $remoteZipPath = $remoteRootDir . "/.deploy/backup-files.zip";
        $localZipPath = $applicationDir . '/.deploy/backup-files.zip';


        H::info(H::i($indentLevel) . "Uploading the zip archive to the remote...", $output);
        if (true === ScpHelper::push($localZipPath, $remoteZipPath, $remoteSshConfigId)) {
            $output->write('<success>ok</success>.' . PHP_EOL);


            H::info(H::i($indentLevel) . "Extracting the zip archive <b>$remoteZipPath</b> to <b>$remoteBackupDir</b>: calling the <b>unzip</b> command on the remote:" . PHP_EOL, $output);
            $cmd = "ssh $remoteSshConfigId deploy -x unzip src=\"$remoteZipPath\" dst=\"$remoteBackupDir\" indent=" . ($indentLevel + 1);
            if (true === ConsoleTool::passThru($cmd)) {
                H::success(H::i($indentLevel + 1) . "The zip archive was extracted successfully." . PHP_EOL, $output);
                $this->exitCode = 0;
                return;
            } else {
                H::error(H::i($indentLevel + 1) . "The archive couldn't be extracted." . PHP_EOL, $output);
            }

        } else {
            $output->write('<error>oops</error>.' . PHP_EOL);
            H::error(H::i($indentLevel + 1) . "An error occurred with the transfer." . PHP_EOL, $output);

        }
        $this->exitCode = 2;
    }
}