[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators\GenerateLkaPluginProcess class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess.md)


GenerateLkaPluginProcess::createLkaGeneratorConfigFile
================



GenerateLkaPluginProcess::createLkaGeneratorConfigFile — Creates the lka generator config file, and returns its path.




Description
================


protected [GenerateLkaPluginProcess::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/createLkaGeneratorConfigFile.md)(array $params, ?array $options = []) : void




Creates the lka generator config file, and returns its path.

Params are:
- galaxy: string, the name of the galaxy to create the config file for
- planet: string, the name of the planet to create the config file for


Available options are:
- recreateEverything: bool=false, whether to force re-creating things even if they already exist




Parameters
================


- params

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [GenerateLkaPluginProcess::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/WebWizardTools/Process/Generators/GenerateLkaPluginProcess.php#L205-L227)


See Also
================

The [GenerateLkaPluginProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess.md) class.

Previous method: [generateLkaPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/generateLkaPlanet.md)<br>Next method: [getLkaServiceNameByPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Generators/GenerateLkaPluginProcess/getLkaServiceNameByPlanet.md)<br>

