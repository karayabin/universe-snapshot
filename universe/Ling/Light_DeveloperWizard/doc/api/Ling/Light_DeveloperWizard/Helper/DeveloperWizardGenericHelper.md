[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)



The DeveloperWizardGenericHelper class
================
2020-06-30 --> 2021-03-05






Introduction
============

The DeveloperWizardGenericHelper class.



Class synopsis
==============


class <span class="pl-k">DeveloperWizardGenericHelper</span>  {

- Methods
    - public static [getSymbolicPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getSymbolicPath.md)(string $path, string $appDir) : string
    - public static [getTablesByCreateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablesByCreateFile.md)(string $createFile) : array
    - public static [getTablePrefix](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablePrefix.md)(string $planetDir, string $createFile) : string
    - public static [getTablePrefixes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablePrefixes.md)(string $createFile, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : array

}






Methods
==============

- [DeveloperWizardGenericHelper::getSymbolicPath](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getSymbolicPath.md) &ndash; Returns a symbolic path, where the given absolute path to the application directory is replaced by the symbol [app].
- [DeveloperWizardGenericHelper::getTablesByCreateFile](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablesByCreateFile.md) &ndash; Returns the name of the tables found in the given create file.
- [DeveloperWizardGenericHelper::getTablePrefix](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablePrefix.md) &ndash; Returns the table prefix from either the preferences (if found), or guessed from the given createFile otherwise.
- [DeveloperWizardGenericHelper::getTablePrefixes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablePrefixes.md) &ndash; Returns an array of table prefixes found from the given create file.





Location
=============
Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper<br>
See the source code of [Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Helper/DeveloperWizardGenericHelper.php)



SeeAlso
==============
Previous class: [DeveloperWizardBreezeGeneratorHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardBreezeGeneratorHelper.md)<br>Next class: [DeveloperWizardLkaHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardLkaHelper.md)<br>
