[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin\LightKitAdminBaseProcess class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Light_Kit_Admin/LightKitAdminBaseProcess.md)


LightKitAdminBaseProcess::createLkaGeneratorConfigFile
================



LightKitAdminBaseProcess::createLkaGeneratorConfigFile — Creates the lka generator config file, and returns its path.




Description
================


protected [LightKitAdminBaseProcess::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Light_Kit_Admin/LightKitAdminBaseProcess/createLkaGeneratorConfigFile.md)(array $params, ?array $options = []) : void




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
See the source code for method [LightKitAdminBaseProcess::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/WebWizardTools/Process/Light_Kit_Admin/LightKitAdminBaseProcess.php#L253-L276)


See Also
================

The [LightKitAdminBaseProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Light_Kit_Admin/LightKitAdminBaseProcess.md) class.

Previous method: [generateLkaPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Light_Kit_Admin/LightKitAdminBaseProcess/generateLkaPlanet.md)<br>Next method: [getLkaServiceNameByPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/Light_Kit_Admin/LightKitAdminBaseProcess/getLkaServiceNameByPlanet.md)<br>

