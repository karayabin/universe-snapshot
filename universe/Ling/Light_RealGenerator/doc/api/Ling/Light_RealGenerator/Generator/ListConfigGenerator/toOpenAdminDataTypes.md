[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Generator\ListConfigGenerator class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)


ListConfigGenerator::toOpenAdminDataTypes
================



ListConfigGenerator::toOpenAdminDataTypes — with openAdminDataType being an [open admin data type](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-protocol.md#the-data-types).




Description
================


protected [ListConfigGenerator::toOpenAdminDataTypes](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/toOpenAdminDataTypes.md)(array $types, string $table, ?array $options = []) : array




Returns an array of columnName => openAdminDataType,
with openAdminDataType being an [open admin data type](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-protocol.md#the-data-types).

The options are:
- useCustomTypes: bool=true. Whether to use custom types defined in the configuration if available.
                 If false, the custom types won't be used.




Parameters
================


- types

    

- table

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ListConfigGenerator::toOpenAdminDataTypes](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/ListConfigGenerator.php#L616-L628)


See Also
================

The [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md) class.

Previous method: [getCrossColumnPluginName](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getCrossColumnPluginName.md)<br>Next method: [getOpenAdminDataTypeBySqlType](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/getOpenAdminDataTypeBySqlType.md)<br>

