[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The DropDatabaseCommand class
================
2019-04-03 --> 2021-05-31






Introduction
============

The DropDatabaseCommand class.

This command drops the database(s) of the project.


By default, all databases listed in the [configuration of the project](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-configuration-file) are dropped.
To drop a single database, or a selected set of databases, use the **db** option.
By default, dropping a database won't prompt you for the password (it's passed automatically using
the mysqldump --defaults-extra-file option. See more details about this technique here:
https://stackoverflow.com/questions/20751352/suppress-warning-messages-using-mysql-from-within-terminal-but-password-written/22933056#22933056

If you want to type the passwords manually, use the **-s** flag, in which case you will be prompted for a password
for every database that you want to drop.





By default, only the database is dropped. To also drop the user along with the database, use the **-u** flag.
The operation of dropping an user will require root privileges,
and so you will be prompted for the password of the root user (of the database).




Options, flags
------------
- ?db=$identifier: the identifier of the database(s) to drop. It can also be a comma separated list of identifiers.
     Note: the identifier refers to a key in the **databases** section of the [configuration file](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-configuration-file).

- -r: remote flag. If set, the command will operate on the remote rather than on the site.
- -u: user flag. If set, the command will also drop the user.
- -s: secure flag. If set, this command will prompt the user for required database password(s).



Class synopsis
==============


class <span class="pl-k">DropDatabaseCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DropDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [DropDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DropDatabaseCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\DropDatabaseCommand<br>
See the source code of [Ling\Deploy\Command\DropDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/DropDatabaseCommand.php)



SeeAlso
==============
Previous class: [DiffCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand.md)<br>Next class: [EnterInteractiveModeCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/EnterInteractiveModeCommand.md)<br>
