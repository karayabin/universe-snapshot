Last update: 2019-04-03

=========================
*    Deploy help       
=========================

A value preceded by a dollar symbol ($) is always a variable.

Global options:
-----------------
The following options apply to all the commands.

    - p=$project_identifier: sets the current project.
    - indent=$number: sets the base indentation level used by most commands.
    - -x: activates the exit status system: the application will exit with the status code returned by the command.

Commands list:
-----------------

- backup-db: creates the backup(s) for the database(s) specified in the configuration file.
    Backups are stored here: $project_root_dir/.deploy/backup-db/$database_identifier/$backup_name.
    By default, it will backup every database defined for the project. This can be changed with the db option.
    - ?db=$identifier: the identifier of the database to backup. It can also be a comma separated list of identifiers.
    - ?name=$backup_name: sets the name of the backup. Otherwise, the default name will be based on the datetime (i.e. 2019-03-26__08-49-17.sql).
        The .sql extension will be appended automatically if not specified.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
    - -s: secure flag. If set, forces the command to prompt you with the database(s) password(s). Otherwise, a technique involving temporary files and the mysqldump --defaults-extra-file option is used.
    - -o: open flag. If set, and if you are on a mac, will open the backup directory(ies) in the Finder after they are created.
- backup-files: creates a backup of the files of the application.
    Backups are stored here: $project_root_dir/.deploy/backup-files/$backup_name.
    - ?name=$backup_name: sets the name of the backup. Otherwise, the default name will be based on the datetime (i.e. 2019-03-26__08-49-17.zip).
        The .zip extension will be appended automatically if not specified.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
    - -o: open flag. If set, and if you are on a mac, will open the backup directory(ies) in the Finder after they are created.
- clean-backup-db: deletes database backups of the project.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
    - -d: delete flag. If set, remove ALL the database backups. This flag has precedence over any other options.
    - ?db=$identifiers: comma separated list of database identifiers. It represents the database identifiers to operate on.
    - ?keep=$number: defines the number of non-named database backups to keep (all other older non-named backups will be removed).
    - ?names=$names: the comma separated list of backup names to delete. Note: the ".sql" extension is appended automatically if omitted.
        Spaces between the comma an the names are allowed.
- clean-backup-files: deletes files backups of the project.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
    - -d: delete flag. If set, remove ALL the files backups. This flag has precedence over any other options.
    - ?keep=$number: defines the number of non-named files backups to keep (all other older non-named backups will be removed).
    - ?names=$names: the comma separated list of backup names to delete. Note: the ".zip" extension is appended automatically if omitted.
        Spaces between the comma an the names are allowed.
- conf: displays the general configuration, or the configuration for a specific project if the p global option is specified.
- create-db: creates database(s) along with their user(s), as specified in the configuration file.
    By default, all databases listed in the configuration are created.
    To create a single database, or a selected set of specified databases, use the db option.
    - ?db=$identifier: the identifier of the database to create. It can also be a comma separated list of identifiers.
        Note: the identifier refers to a key in the databases section of the configuration file.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
    - -f: force flag. If set, forces the recreation of the database(s) and user(s) by deleting them before re-creating them.
- diff: displays the differences between the current application files and the remote files.
    The differences are composed of 3 sections:
        - add: the files present in the site, not on the remote
        - remove: the files present in the remote, not on the site
        - replace: the files present in both the site and the remote, but they have a difference (i.e. their hash_id differs)
    - -f: if set, the command will create 3 files diff-add.txt, diff-remove.txt and diff-replace.txt in the .deploy dir of the site application, rather than displaying the diff to the screen.
- diffback: same as the diff command, but in reverse (i.e. the remote is the source, and the site becomes the mirrored target).
    - -f: if set, the command will create 3 files diff-add.txt, diff-remove.txt and diff-replace.txt in the .deploy dir of the site application, rather than displaying the diff to the screen.
- drop-db: drops the database(s) of the project.
    - ?db=$identifier: the identifier of the database to drop. It can also be a comma separated list of identifiers.
        Note: the identifier refers to a key in the databases section of the configuration file.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
    - -u: user flag. If set, the command will also drop the user.
    - -s: secure flag. If set, this command will prompt the user for required database password(s).
- fetch: an alias of the fetch-files command.
- fetch-backup-db: repatriates database backups from the remote to the local project.
    By default, it repatriates every single database backup.
    - ?names=$names: the comma separated list of backup names to repatriate.
        Note: the .sql extension is appended automatically if omitted.
- fetch-backup-files: repatriates files backups from the remote to the local project.
    By default, it repatriates all files backups.
    - ?names=$names: the comma separated list of backup names to repatriate.
        Note: the .zip extension is appended automatically if omitted.
- fetch-db: copies the remote database to the local machine.
    - ?db=$identifiers: the comma separated list of database identifiers to process.
    - -s: secure flag. If set, this command will prompt the user for required database password(s).
    - -k: keep flag. If set, this command will not drop the database before restoring the backup.
- fetch-files: same as the push command, but in the opposite direction (i.e. the site is mirrored using the remote as the model.
- help ?$command: displays this help message.
    If the command parameter is passed, will display the help only for that command.
- i: enters the interactive mode.
- list-backup-db: lists the database backups of the application.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
- list-backup-files: lists the files backups of the application.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
- map: creates a map of the current application.
    The map will be created at $root_dir/.deploy/map.txt.
    - -r: remote. Executes the operation on the remote.
        In this case, the map will be located at $remote_root_dir/.deploy/map.txt.
    - -d: display on screen. If set, also displays the map on the console screen.
- push: an alias of the push-files command.
- push-backup-db: pushes database backups from the local project to the remote.
    By default, it pushes every single database backup.
    - ?names=$names: the comma separated list of backup names to push.
        Note: the .sql extension is appended automatically if omitted.
    - ?last=$number: the max number of most recent backups (per database identifier) to push.
        If the names option is set, the last option will be ignored.
    - ?db=$database_identifiers: a comma separated list of database identifiers to use.
        This is used as a pre-filter and is always executed before the names and last options.
- push-backup-files: pushes files backups from the local project to the remote.
    By default, it pushes all files backups.
    - ?names=$names: the comma separated list of backup names to push.
        Note: the .zip extension is appended automatically if omitted.
    - ?last=$number: the max number of most recent backups to push.
        If the names option is set, the last option will be ignored.
- push-db: pushes the current database(s) from the local machine to the remote.
    - ?db=$database_identifiers: a comma separated list of database identifiers to use.
    - -s: secure flag. If set, this command will prompt the user for required database password(s).
    - -k: keep flag. If set, this command will not drop the database before restoring the backup.
- push-files: pushes the current site to the remote.
    By default, it mirrors the current site to the remote (i.e. files can be removed on the remote).
    More control on this behaviour gan be gained using the mode option.
    - -z: zip. Use a zip archive for transferring files to add. This is faster than the default one by one method.
        However, you don't have the file details shown with the default method.
    - ?mode=$mode: a comma separated list (extra space allowed) of the operation names to execute.
    - The default value is: add,replace,remove.
        The possible operations are:
            - add: will add the files that are present in site but not in remote
            - replace: will replace the files in remote that are present in both the site and the remote (but were modified)
            - remove: will remove the files in remote that are not present in site
        By default, all three operations are executed.
        So for instance, if you just want to upload the files from the site to the remote without removing any
        files on the remote, you can use "mode=add,replace" or "mode=add".
- restore-backup-db: restores database backups.
    By default, it will restore every last non-named backup found in every database identifier.
    By default, this operation will drop the database before applying the backup.
    - ?name=$name: the name of the database backup to restore.
        The ".sql" extension is appended automatically if necessary.
    - ?db=$identifiers: the comma separated list of database identifiers to process.
    - -r: remote. If set, the command will operate on the remote rather than on the site.
    - -s: secure. If set, this command will prompt the user for required database password(s).
    - -k: keep. If set, this command will not drop the database before restoring the backup.
- restore-backup-files: restores files backups.
    By default, it will restore the last non-named backup found.
    By default, this operation will remove the application files before extracting the backup.
    - ?name=$name: the name of the files backup to restore.
        The ".zip" extension is appended automatically if necessary.
    - -r: remote. If set, the command will operate on the remote rather than on the site.
    - -k: keep. If set, this command will not remove the application files before extracting the backup.

Tools list:
-----------------

- remove src=$path: removes files listed in a source file.
    The source file contains a list of relative paths to remove, one per line.
    The paths are relative to the current site's root dir, or, if the remote flag is set, relative to the remote's root dir.
    If the path is a directory, it will be ignored (design by security, to prevent removing entire directories).
    - -r: remote. If set, the command will operate on the remote rather than on the site.
- remove-files-by-name dir=$path names=$names: removes files by name.
    - dir=$path: the path of the root dir containing the files to remove.
    - names=$names: the comma separated list of file names to remove.
    - -r: remote. If set, the command will operate on the remote rather than on the site.
- unzip src=$path dst=$path: utility to unzip zip archives into a given directory.
    Note: this doesn't remove existing files.
    However, if a file already exists, it will be overwritten.
    - -r: the remote flag. If set, this command will be called on the remote (over ssh) instead of the current site.
- zip src=$path dst=$path: A zip utility to zip files listed in a source file.
    - src=$path: the path to the source file.
        The source file contains a list of relative paths to remove, one per line.
        The paths are relative to the current site's root dir, or, if the remote option is set, relative to the remote's root dir.
        If the path is a directory, it will be zipped recursively.
    - dst=$path: the path to the zip archive to create.
    - -r: remote flag. If set, the command will operate on the remote rather than on the site.
- zip-backup dir=$path dst=$path ext=$extension: creates a zip archive containing the selected backup files.
    - dir=$path: the backup directory path.
    - dst=$path: the path to the zip archive to create.
    - ext=$extension: the extension to append to the backup name (if omitted).
    - ?names=$names: the comma separated list of backup names to put in the archive.
- zip-backup-db dir=$path dst=$path ext=$extension: creates a zip archive containing database backups, based on provided filtering criteria.
    - dir=$path: the backup directory path.
    - dst=$path: the path to the zip archive to create.
    - ext=$extension: the extension to append to the backup name (if omitted).
    - ?names=$names: the comma separated list of backup names to put in the archive.
    - ?last=$number: indicates the (max) number of non-named backups (per database identifier) to push.
    - ?db=$database_identifiers: a comma separated list of database identifiers to put in the archive.
- zip-backup-files dir=$path dst=$path ext=$extension: creates a zip archive containing files backups, based on provided filtering criteria.
    - dir=$path: the backup directory path.
    - dst=$path: the path to the zip archive to create.
    - ext=$extension: the extension to append to the backup name (if omitted).
    - ?names=$names: the comma separated list of backup names to put in the archive.
    - ?last=$number: indicates the (max) number of non-named backups to push.