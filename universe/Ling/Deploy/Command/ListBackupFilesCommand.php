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
 * The ListBackupFilesCommand class.
 * This command lists the files backups of the application.
 *
 * To see the database backups available on the remote, use the **-r** flag.
 *
 *
 *
 *
 * Options, flags
 * -------------
 * - -r: remote flag. If set, this command will operate on the remote.
 * - conf=$path: the path to a proxy configuration file. This is used internally, you probably won't need to use this option.
 *
 *
 *
 */
class ListBackupFilesCommand extends BaseListBackupCommand
{

    /**
     * Builds the ListBackupFilesCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commandName = "list-backup-files";
        $this->extension = "zip";
        $this->backupDirName = "backup-files";
    }
}