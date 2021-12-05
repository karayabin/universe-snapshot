[Back to the Ling/Light_SqlWizard api](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard.md)<br>
[Back to the Ling\Light_SqlWizard\Service\LightSqlWizardService class](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService.md)


LightSqlWizardService::getOption
================



LightSqlWizardService::getOption — Returns the option value corresponding to the given key.




Description
================


public [LightSqlWizardService::getOption](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void




Returns the option value corresponding to the given key.
If the option is not found, the return depends on the throwEx flag:

- if set to true, an exception is thrown
- if set to false, the default value is returned




Parameters
================


- key

    

- default

    

- throwEx

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightSqlWizardService::getOption](https://github.com/lingtalfi/Light_SqlWizard/blob/master/Service/LightSqlWizardService.php#L81-L90)


See Also
================

The [LightSqlWizardService](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/setOptions.md)<br>Next method: [getMysqlWizard](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/getMysqlWizard.md)<br>

