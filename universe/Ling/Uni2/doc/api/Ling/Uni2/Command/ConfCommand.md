[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ConfCommand class
================
2019-03-12 --> 2019-03-21






Introduction
============

The ConfCommand class.
This command will display the [uni-tool configuration](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-uni2-configuration), and update configuration values.


The configuration is always displayed.


But we can decide to update the configuration values or not.
To set configuration values, we use [command line options](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md), each option representing
a configuration key/value pair to update.


Note: the [bdot notation](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md) is used to set the configuration values.



So for instance, to display the configuration, we can do this:

```bash
uni conf
```


And to set a value, we can do this:

```bash
uni conf local_server.is_active=0
```

We can even set multiple options at once if we want to:

```bash
uni conf local_server.is_active=0 automatic_updates.frequency=70
```

Note: in all cases, the configuration is displayed.
And if you've changed the configuration (by passing some options), the new configuration will be displayed (i.e. not the old one).



Class synopsis
==============


class <span class="pl-k">ConfCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ConfCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ConfCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ConfCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ConfCommand


SeeAlso
==============
Previous class: [CleanCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/CleanCommand.md)<br>Next class: [ConfPathCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ConfPathCommand.md)<br>
