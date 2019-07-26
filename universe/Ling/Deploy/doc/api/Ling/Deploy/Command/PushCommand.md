[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The PushCommand class
================
2019-04-03 --> 2019-07-18






Introduction
============

The PushCommand class.

Pushes the current site to the remote.
By default, it mirrors the current site to the remote (i.e. files can be removed on the remote).
More control on this behaviour gan be gained using the **mode** option.



Flags
----------

-z: zip. Use a zip archive for transferring files. This is much faster than the default one by one method.
         However, you don't have the progress/details over the transferred files.


Options
------------

- ?mode=add,remove,replace.
     A comma separated list (extra space allowed) of the operation names to execute.
     The default value is: add,replace,remove.
     The possible operations are:
         - add: will add the files that are present in the local application but not in the remote
         - replace: will replace the files in the remote that are present in both the local application and the remote (but were modified)
         - remove: will remove the files in the remote that are not present in the local application

     By default, all three operations are executed.
     So for instance, if you just want to upload the files from the local application to the remote without removing any
     files on the remote, you can use "mode=add,replace" or "mode=add".




Side notes about performance:
-------------------------
Here is a little comparison of different upload methods for a 51.9 Mb application.

- transfer with Filezilla: about 7 minutes
- transfer with push -z (scp): about 7 minutes
- transfer with push (all 1435 files one by one via scp): 40 minutes



Class synopsis
==============


class <span class="pl-k">PushCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$sentence](#property-sentence) ;
    - protected bool [$useDiffBack](#property-useDiffBack) ;

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - protected [onDiffReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/onDiffReady.md)(array $params, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}




Properties
=============

- <span id="property-sentence"><b>sentence</b></span>

    This property holds the sentence for this instance.
    The main sentence to display to the console before starting the command.
    
    

- <span id="property-useDiffBack"><b>useDiffBack</b></span>

    This property holds the useDiffBack for this instance.
    Whether to use diff or diffback command for the diff map.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the DeployApplication instance.
    
    



Methods
==============

- [PushCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [PushCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/run.md) &ndash; Runs the command.
- [PushCommand::onDiffReady](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushCommand/onDiffReady.md) &ndash; Executes the mirroring operation, based on the diff map.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\PushCommand<br>
See the source code of [Ling\Deploy\Command\PushCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/PushCommand.php)



SeeAlso
==============
Previous class: [PushBackupFilesCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushBackupFilesCommand.md)<br>Next class: [PushDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/PushDatabaseCommand.md)<br>
