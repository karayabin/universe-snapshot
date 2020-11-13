[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Helper\DeveloperWizardLkaHelper class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper.md)


DeveloperWizardLkaHelper::getBasicLkaGeneratorConfig
================



DeveloperWizardLkaHelper::getBasicLkaGeneratorConfig — Returns a basic lka configuration array.




Description
================


public static [DeveloperWizardLkaHelper::getBasicLkaGeneratorConfig](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper/getBasicLkaGeneratorConfig.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, string $galaxy, string $planet) : array




Returns a basic lka configuration array.

The root key is main.

Notes: the variables (main.variables) aren't injected (as this is the job of the lka generator to do so).




Parameters
================


- container

    

- galaxy

    

- planet

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [DeveloperWizardLkaHelper::getBasicLkaGeneratorConfig](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Helper/DeveloperWizardLkaHelper.php#L157-L170)


See Also
================

The [DeveloperWizardLkaHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper.md) class.

Previous method: [createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper/createLkaGeneratorConfigFile.md)<br>

