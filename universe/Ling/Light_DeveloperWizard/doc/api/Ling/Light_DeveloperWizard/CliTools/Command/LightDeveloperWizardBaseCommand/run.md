[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\CliTools\Command\LightDeveloperWizardBaseCommand class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md)


LightDeveloperWizardBaseCommand::run
================



LightDeveloperWizardBaseCommand::run — Runs the command.




Description
================


public [LightDeveloperWizardBaseCommand::run](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/run.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : mixed




Runs the command.

Important note:
The input object passed to the commands is the same as the input object passed to the application itself.
This means that the parameter index used by commands should start at 2 (because 1 is already the name of the command).

So, remember, when you're inside a command, if you want to get a parameter, starts with 2 (and not 0 or 1).




Parameters
================


- input

    

- output

    


Return values
================

Returns mixed.
If an int is returned, it should be assumed to be the exit status.
If no value is returned, 0 should be assumed (meaning exit status=0, meaning the program executed correctly).
Other return value types might be added in the future







Source Code
===========
See the source code for method [LightDeveloperWizardBaseCommand::run](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/CliTools/Command/LightDeveloperWizardBaseCommand.php#L83-L109)


See Also
================

The [LightDeveloperWizardBaseCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setContainer.md)<br>Next method: [getName](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/getName.md)<br>

