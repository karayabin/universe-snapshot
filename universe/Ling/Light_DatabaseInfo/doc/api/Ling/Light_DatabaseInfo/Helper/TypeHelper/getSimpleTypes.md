[Back to the Ling/Light_DatabaseInfo api](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo.md)<br>
[Back to the Ling\Light_DatabaseInfo\Helper\TypeHelper class](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Helper/TypeHelper.md)


TypeHelper::getSimpleTypes
================



TypeHelper::getSimpleTypes — Returns an array of column name => simple type from the given sql types.




Description
================


public static [TypeHelper::getSimpleTypes](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Helper/TypeHelper/getSimpleTypes.md)(array $types) : array




Returns an array of column name => simple type from the given sql types.
The simple types are either:

- str: a string type, such as varchar, char, text, ...
- int: an int type, such as int, tinyint, float, decimal, but also bit, bool, ...
- date: a type containing a date, such as date, time, datetime...


The given types are sql types, which might be followed by the precision (inside parenthesis),
such as tinyint(4) for instance.




Parameters
================


- types

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [TypeHelper::getSimpleTypes](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/Helper/TypeHelper.php#L30-L63)


See Also
================

The [TypeHelper](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Helper/TypeHelper.md) class.



