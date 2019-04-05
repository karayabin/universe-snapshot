[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The CreateDatabaseCommand class
================
2019-04-03 --> 2019-04-04






Introduction
============

The CreateDatabaseCommand class.

This command creates database(s) along with their user(s), based on the databases section of the [configuration file](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-configuration-file)
for the current project.

This operation will require root privileges, and so you will be prompted for the password of the root user (of the database).

By default, all databases listed in the configuration are created.
To create a single database, or a selected set of databases, use the **db** option.


Details: the database is first created, then the user, then all privileges are granted to that user on that database.
By default, if the database exists or if the user exists, they won't be overwritten.
However if the **-f** flag is set, the database and user will be deleted first and then recreated.




PROBLEMS THAT MIGHT HAPPEN
----------------

The whole error described below occurred in previous versions of this class, where I used the
"delete from mysql.user..." statement instead of the "drop user..." statement.
Now this problem is fixed, but I keep this error below as a reminder.


After playing for a while with this command, at some point it started to behave weirdly, and I've got the following
error (on mac: mysql  Ver 8.0.13 for osx10.12 on x86_64 (Homebrew)):

dp p=komin create-db
ERROR 1410 (42000) at line 3: You are not allowed to create a user with GRANT

Alternately, on the remote server I've got a similarly weird error (on ubuntu: mysql  Ver 14.14 Distrib 5.7.18, for Linux (x86_64) using  EditLine wrapper):

dp p=komin create-db -r
ERROR 1133 (42000) at line 7: Can't find any matching row in the user table


That's a stupid error, since it worked just fine before, anyway...
The work around I find in this case was just to use the -f flag and it magically worked:

dp p=komin create-db -f     # for local site
dp p=komin create-db -rf    # for remote

After that, the first command started to work normally again.
I guess the -f option did some cleaning. Weird...

Note: dp is an alias of deploy on my machine.


Options, flags
------------
- ?db=$identifier: the identifier of the database(s) to create. It can also be a comma separated list of identifiers.
Note: the identifier refers to a key in the **databases** section of the [configuration file](https://github.com/lingtalfi/Deploy/blob/master/README.md#the-configuration-file).

- -r: remote flag. If set, the command will operate on the remote rather than on the site.
- -f: force the recreation of the database(s) and user(s) by deleting them before re-creating them.



Class synopsis
==============


class <span class="pl-k">CreateDatabaseCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateDatabaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [CreateDatabaseCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateDatabaseCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\CreateDatabaseCommand


SeeAlso
==============
Previous class: [CleanBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CleanBackupFilesCommand.md)<br>Next class: [CreateMapCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateMapCommand.md)<br>
