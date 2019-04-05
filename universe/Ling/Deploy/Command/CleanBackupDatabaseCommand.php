<?php


namespace Ling\Deploy\Command;


/**
 * The CleanBackupDatabaseCommand class.
 *
 * This command deletes database backups of the project.
 *
 *
 * It distinguishes between two types of database backups:
 *
 * - the non-named backups (created with the **backup-db** command without the **name** option), which look like this: 2019-03-26__08-49-17.sql
 * - the named backups (created with the **backup-db** command with the **name** option), which look like this: my_backup.sql
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
 * - ?keep=$number: defines the number of non-named database backups to keep (all other older non-named backups will be removed).
 * - ?db=$database_identifier: comma separated list of database identifiers. It represents the database identifiers to operate on.
 * - ?names=$names: the comma separated list of backup names to delete. Note: the ".sql" extension is appended automatically if omitted.
 *                  Spaces between the comma an the names are allowed.
 *
 *
 */
class CleanBackupDatabaseCommand extends BaseCleanBackupCommand
{

    /**
     * Builds the CleanBackupDatabaseCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commandName = "clean-backup-db";
        $this->dirName = "backup-db";
        $this->extension = "sql";
        $this->useDbFilter = true;
    }

}