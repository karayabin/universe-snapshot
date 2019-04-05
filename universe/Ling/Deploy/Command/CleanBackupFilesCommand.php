<?php


namespace Ling\Deploy\Command;


/**
 * The CleanBackupFilesCommand class.
 *
 * This command deletes files backups of the project.
 *
 *
 * It distinguishes between two types of files backups:
 *
 * - the non-named backups (created with the **backup-files** command without the **name** option), which look like this: 2019-03-26__08-49-17.zip
 * - the named backups (created with the **backup-files** command with the **name** option), which look like this: my_backup.zip
 *
 * The general idea is that the named backups are always preserved, unless you delete them explicitly with the **name** option or the **-d** flag.
 *
 *
 * By default, this command will keep all the named files backups, and also keep the 10 last non-named files backups and delete all other non-named backups.
 *
 * The number 10 can be changed with the **keep** option.
 *
 * By default this command operates on the site (aka local machine), use the **-r** flag to operate on the remote.
 *
 *
 * To remove a specific files backup, or a set of files backups, you can use the **name** option.
 * This will remove all files backups having the given name.
 * Note: you can even remove non-named backups with the name option as long as the name match the backup.
 *
 *
 * To clean the files backup directory entirely, effectively removing ALL files backups, use the **-d** flag.
 *
 *
 *
 * The path for a backup has the following format:
 *
 * ```txt
 * $root_dir/.deploy/backup-files/$backup_name
 * ```
 *
 *
 *
 *
 * Options, flags
 * ------------
 * - -r: remote flag. If set, the command will operate on the remote rather than on the site.
 * - -d: delete flag. If set, remove ALL the files backups. This flag has precedence over any other options.
 * - ?keep=$number: defines the number of non-named files backups to keep (all other older non-named backups will be removed)
 * - ?names=$names: the comma separated list of backup names to delete. Note: the ".zip" extension is appended automatically if omitted.
 *                  Spaces between the comma an the names are allowed.
 *
 *
 */
class CleanBackupFilesCommand extends BaseCleanBackupCommand
{

    /**
     * Builds the CleanBackupFilesCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commandName = "clean-backup-files";
        $this->dirName = "backup-files";
        $this->extension = "zip";
        $this->useDbFilter = true;
    }

}