[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardBaseProcess class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess.md)


LightDeveloperWizardBaseProcess::addServiceConfigHook
================



LightDeveloperWizardBaseProcess::addServiceConfigHook — Adds a service config hook, only if it doesn't already exist.




Description
================


protected [LightDeveloperWizardBaseProcess::addServiceConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceConfigHook.md)(string $serviceName, array $methodItem, ?array $ifArgs = null) : void




Adds a service config hook, only if it doesn't already exist.
It also send message to the logs.

If the ifArgs array is passed, it represents the args to use for testing whether the hook already exists.
Otherwise, if not set, the args defined in the given methodItem will be used for the testing.

Note, this method will only work if the calling class has defined the util property,
which is a configured ServiceManagerUtil instance.




Parameters
================


- serviceName

    

- methodItem

    

- ifArgs

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightDeveloperWizardBaseProcess::addServiceConfigHook](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/WebWizardTools/Process/LightDeveloperWizardBaseProcess.php#L308-L332)


See Also
================

The [LightDeveloperWizardBaseProcess](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess.md) class.

Previous method: [addServiceFactory](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/addServiceFactory.md)<br>Next method: [error](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/WebWizardTools/Process/LightDeveloperWizardBaseProcess/error.md)<br>

