[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The HelpCommand class
================
2019-04-03 --> 2019-07-18






Introduction
============

The HelpCommand class.
This command will display the kaos help to the user.



Class synopsis
==============


class <span class="pl-k">HelpCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected array [$callbacks](#property-callbacks) ;
    - protected callable [$headerCallback](#property-headerCallback) ;

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - protected [getCallbacks](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/getCallbacks.md)(string $identifier = null) : mixed
    - protected [registerCallback](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/registerCallback.md)(string $commandName, callable $function, string $identifier = null) : void
    - protected [registerCallbacks](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/registerCallbacks.md)(Ling\CliTools\Output\OutputInterface $output) : void
    - private [n](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/n.md)(string $commandName) : string
    - private [o](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/o.md)(string $option) : string
    - private [d](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/d.md)(string $option) : string

- Inherited methods
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}




Properties
=============

- <span id="property-callbacks"><b>callbacks</b></span>

    This property holds the callbacks for this instance.
    It's an array of command name => callback to display the command's help.
    
    

- <span id="property-headerCallback"><b>headerCallback</b></span>

    This property holds the headerCallback for this instance.
    A callable displaying the help header.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the DeployApplication instance.
    
    



Methods
==============

- [HelpCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/__construct.md) &ndash; Builds the HelpCommand instance.
- [HelpCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/run.md) &ndash; Runs the command.
- [HelpCommand::getCallbacks](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/getCallbacks.md) &ndash; Returns the callbacks of the given $identifier group.
- [HelpCommand::registerCallback](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/registerCallback.md) &ndash; Registers the callback for the given command name.
- [HelpCommand::registerCallbacks](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/registerCallbacks.md) &ndash; Registers all callbacks for this instance.
- [HelpCommand::n](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/n.md) &ndash; Returns a formatted command name string.
- [HelpCommand::o](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/o.md) &ndash; Returns a formatted option/parameter string.
- [HelpCommand::d](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/HelpCommand/d.md) &ndash; Returns a formatted configuration directive string.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\HelpCommand<br>
See the source code of [Ling\Deploy\Command\HelpCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/HelpCommand.php)



SeeAlso
==============
Previous class: [FetchDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/FetchDatabaseCommand.md)<br>Next class: [ListBackupDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/ListBackupDatabaseCommand.md)<br>
