[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Helper\DeveloperWizardBreezeGeneratorHelper class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardBreezeGeneratorHelper.md)


DeveloperWizardBreezeGeneratorHelper::spawnConfFile
================



DeveloperWizardBreezeGeneratorHelper::spawnConfFile — Create a new breeze generator configuration file, based on an internal model.




Description
================


public static [DeveloperWizardBreezeGeneratorHelper::spawnConfFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardBreezeGeneratorHelper/spawnConfFile.md)(string $dst, ?array $params = []) : void




Create a new breeze generator configuration file, based on an internal model.
If the file already exists, it will be overwritten.

The generated file will be written at the given destination, and filled with the given parameters.

Parameters are:

- galaxyName: string, the name of the galaxy.
- planetName: string, the name of the planet (light plugin)
- createFilePath: string, the absolute path to the create file.
- prefix: string, the table prefix
- ?otherPrefixes: array, other prefixes to use (apart from the given table prefix), see the [ling breeze generator 2 documentation](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md) for more info


See the [Light_DeveloperWizard conception notes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- dst

    

- params

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [DeveloperWizardBreezeGeneratorHelper::spawnConfFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Helper/DeveloperWizardBreezeGeneratorHelper.php#L45-L94)


See Also
================

The [DeveloperWizardBreezeGeneratorHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardBreezeGeneratorHelper.md) class.



