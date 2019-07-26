[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Command\AbstractBackupCommand class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md)


AbstractBackupCommand::createArchive
================



AbstractBackupCommand::createArchive — and returns whether the zip creation was successful.




Description
================


public [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/createArchive.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : bool




Creates the backup zip archive, using the given parameters in the input,
and returns whether the zip creation was successful.
Also calls the onArchiveReady method if the zip creation was successful.


The archive is created by collecting all backups from the backup dir, then filtering them
using the following options:

- the **names** option
- the **last** option

If the **name** option is defined, the last option will be ignored.

The **name** option allows you to specify the name(s) of the backups to archive.
The **last** option allows you to define the number of the non-named backups to archive.




Parameters
================


- input

    

- output

    


Return values
================

Returns bool.


Exceptions thrown
================

- [BatException](https://github.com/lingtalfi/Bat/blob/master/Exception/BatException.php).&nbsp;

- [DeployException](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Exception/DeployException.md).&nbsp;







Source Code
===========
See the source code for method [AbstractBackupCommand::createArchive](https://github.com/lingtalfi/Deploy/blob/master/Command/AbstractBackupCommand.php#L86-L174)


See Also
================

The [AbstractBackupCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand.md) class.

Previous method: [onArchiveReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/onArchiveReady.md)<br>Next method: [getFetcherUtilInstance](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/AbstractBackupCommand/getFetcherUtilInstance.md)<br>

