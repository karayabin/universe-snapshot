[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Helper\DeveloperWizardLkaHelper class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper.md)


DeveloperWizardLkaHelper::createLkaGeneratorConfigFile
================



DeveloperWizardLkaHelper::createLkaGeneratorConfigFile — Creates a basic lka generator config file, and returns its path.




Description
================


public static [DeveloperWizardLkaHelper::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper/createLkaGeneratorConfigFile.md)(array $params, ?array $options = []) : void




Creates a basic lka generator config file, and returns its path.

Params are:
- galaxy: string, the name of the galaxy to create the config file for
- planet: string, the name of the planet to create the config file for
- path: string|null=null, if set, defines the location of the config file to create
- tplPath: string|null=null, if set, defines the location of the config file template to use
- onAlreadyExists: callable|null=null, is triggered only if the config file already exists (and is therefore not created)
- onCreateBefore: callable|null=null, is triggered only if the config file is actually (re)created


Available options are:
- recreateEverything: bool=false, whether to force re-creating the file even if it already exists




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
See the source code for method [DeveloperWizardLkaHelper::createLkaGeneratorConfigFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Helper/DeveloperWizardLkaHelper.php#L53-L140)


See Also
================

The [DeveloperWizardLkaHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper.md) class.

Previous method: [getLkaOriginPlanet](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper/getLkaOriginPlanet.md)<br>Next method: [getBasicLkaGeneratorConfig](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper/getBasicLkaGeneratorConfig.md)<br>

