<?php


namespace Ling\Deploy\Command;


/**
 * The ListBackupDatabaseCommand class.
 * This command lists the database backups of the application.
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
class ListBackupDatabaseCommand extends BaseListBackupCommand
{


    /**
     * Builds the ListBackupDatabaseCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commandName = "list-backup-db";
        $this->extension = "sql";
        $this->backupDirName = "backup-db";
    }
}