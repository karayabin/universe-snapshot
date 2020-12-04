[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)<br>
[Back to the Ling\Light_Kit_Admin_Generator\Generator\MenuConfigGenerator class](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md)


MenuConfigGenerator::getTableInfoByConfigBundle
================



MenuConfigGenerator::getTableInfoByConfigBundle — 




Description
================


protected [MenuConfigGenerator::getTableInfoByConfigBundle](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator/getTableInfoByConfigBundle.md)(string $table, array $configBundle) : array




Returns an array containing:
- prefix: string|null, the prefix of the table if any, or null otherwise
- childItem: array, the menu item corresponding to the given table

The configBundle contains the following entries:
- prefixes
- hasKeywords
- customItems
- prefix2Rights
- controllerFormat
- itemPrefix
- plugin
- defaultRight




Parameters
================


- table

    

- configBundle

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MenuConfigGenerator::getTableInfoByConfigBundle](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Generator/MenuConfigGenerator.php#L147-L209)


See Also
================

The [MenuConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md) class.

Previous method: [generate](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator/generate.md)<br>Next method: [getDefaultLabelFromObject](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator/getDefaultLabelFromObject.md)<br>

