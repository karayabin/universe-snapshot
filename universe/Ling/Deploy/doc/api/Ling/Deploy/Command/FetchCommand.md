[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The FetchCommand class
================
2019-04-03 --> 2019-04-18






Introduction
============

The FetchCommand class.

Fetches the remote to the current site.
It's the opposite of the PushCommand.


By default, it mirrors the remote to the current site (i.e. files can be removed on the site).
More control on this behaviour gan be gained using the **mode** option.



Flags
----------

-z: zip. Use a zip archive for transferring files to add. This is faster than the default one by one method.
         However, you don't have the file details shown with the default method.


Options
------------

- ?mode=add,remove,replace.
     A comma separated list (extra space allowed) of the operation names to execute.
     The default value is: add,replace,remove.
     The possible operations are:
         - add: will add the files that are present in remote but not in files
         - replace: will replace the files in site that are present in both the remote and the site (but were modified)
         - remove: will remove the files in site that are not present in remote

     By default, all three operations are executed.
     So for instance, if you just want to download the files from the remote to the site without removing any
     files on the site, you can use "mode=add,replace" or "mode=add".



Class synopsis
==============


class <span class="pl-k">FetchCommand</span> extends [PushCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected string [PushCommand::$sentence](#property-sentence) ;
    - protected bool [PushCommand::$useDiffBack](#property-useDiffBack) ;
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchCommand/__construct.md)() : void
    - protected [onDiffReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchCommand/onDiffReady.md)(array $params, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [PushCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [FetchCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [FetchCommand::onDiffReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchCommand/onDiffReady.md) &ndash; Executes the mirroring operation, based on the diff map.
- [PushCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\FetchCommand


SeeAlso
==============
Previous class: [FetchBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchBackupFilesCommand.md)<br>Next class: [FetchDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchDatabaseCommand.md)<br>
