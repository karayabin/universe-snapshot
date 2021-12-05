[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\CliTools\Command\LightDeveloperWizardBaseCommand class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md)


LightDeveloperWizardBaseCommand::checkInsideAppDir
================



LightDeveloperWizardBaseCommand::checkInsideAppDir — Returns whether the current working directory is a correct universe application (i.e.




Description
================


protected [LightDeveloperWizardBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool




Returns whether the current working directory is a correct universe application (i.e. containing an universe dir).

This is a security measure to prevent you to accidentally install/import things at wrong places.

If false is returned, an error message is also written to the output.




Parameters
================


- input

    

- output

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightDeveloperWizardBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/CliTools/Command/LightDeveloperWizardBaseCommand.php#L212-L228)


See Also
================

The [LightDeveloperWizardBaseCommand](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand.md) class.

Previous method: [setApplication](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/setApplication.md)<br>Next method: [writeError](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/CliTools/Command/LightDeveloperWizardBaseCommand/writeError.md)<br>

