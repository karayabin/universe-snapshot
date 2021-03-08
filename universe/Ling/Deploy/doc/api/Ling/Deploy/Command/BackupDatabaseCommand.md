[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The BackupDatabaseCommand class
================
2019-04-03 --> 2021-03-05






Introduction
============

The BackupDatabaseCommand class.

This command creates the backup(s) for the database(s) specified in the [configuration file](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-configuration-file).


The design below was driven by the idea that databases are owned by users, and each user has a different password.
And to restore a backup, you also need the user password.



Backups for databases are stored at the project level, at:

     $project_root_dir/.deploy/backup-db/$database_identifier/$backup_name

By default, all databases of the project are backed up (each database identifier leading to the creation of one backup file).
To specify which subset of databases to backup, use the **db** option.

The main idea is that when you refer to a $backup_name, you actually refer to all files with the same $backup_name,
possibly stored across different $backup_identifiers.


By default, this command operates on the site (i.e. the current application on the local machine).
Use the -r flag to operate on the remote.


The default backup name will be based on the date and will look like this:

     2019-03-26__08-49-17.sql

(this is basically the datetime)

To specify the backup name manually, use the name option.
If you do so, the ".sql" extension will be appended automatically if it's not already in the name you gave.



By default, the user will not be prompted with the database(s) password(s).
The technique used is to create a temporary file containing the (mysql) configuration, and then pass that file
using the mysqldump --defaults-extra-file option, a technique described in more details here:
https://stackoverflow.com/questions/20751352/suppress-warning-messages-using-mysql-from-within-terminal-but-password-written/22933056#22933056


Note: this is not the root password though (unless you use your root user for creating your app's databases, which you should NEVER do),
just a database password that must be in your app anyway in a form or another.
This saves the user some typing.

If you want to type the passwords manually, use the **-s** flag, in which case you will be prompted for a password
for every database that you want to backup. So, if your project contains 3 databases, you will be prompted 3 times
for every backup that you want to create.






Options, flags
-------------
- ?db=$dbIdentifier. Specifies the database identifier to backup. Can also be a comma separated list of database identifiers.
- ?name=$name. Specifies the name of the backup to create. The name must not start with a dot (otherwise you won't be able to target it with other commands).
- -r: remote flag. If set, this command will operate on the remote.
- -s: secure flag. If set, this command will prompt the user for required database password(s).
- -o: open dir(s) flag. If set, and if you are on mac, the command will open the backup directory(ies) in the Finder.



Class synopsis
==============


class <span class="pl-k">BackupDatabaseCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BackupDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [BackupDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BackupDatabaseCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\BackupDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\BackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/BackupDatabaseCommand.php)



SeeAlso
==============
Previous class: [AbstractBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupDatabaseCommand.md)<br>Next class: [BackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/BackupFilesCommand.md)<br>
