[Back to the Ling/Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md)<br>
[Back to the Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper class](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper.md)


DeveloperWizardGenericHelper::getTablePrefixes
================



DeveloperWizardGenericHelper::getTablePrefixes — Returns an array of table prefixes found from the given create file.




Description
================


public static [DeveloperWizardGenericHelper::getTablePrefixes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablePrefixes.md)(string $createFile, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : array




Returns an array of table prefixes found from the given create file.
The first prefix is the main prefix (representing the plugin).

The returned array contains at least one entry, or otherwise an exception is thrown.




Parameters
================


- createFile

    

- container

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [DeveloperWizardGenericHelper::getTablePrefixes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/Helper/DeveloperWizardGenericHelper.php#L101-L152)


See Also
================

The [DeveloperWizardGenericHelper](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper.md) class.

Previous method: [getTablePrefix](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard/Helper/DeveloperWizardGenericHelper/getTablePrefix.md)<br>

