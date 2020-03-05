[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\SimpleTypeHelper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimpleTypeHelper.md)


SimpleTypeHelper::getSimpleTypes
================



SimpleTypeHelper::getSimpleTypes — Returns an array of column name => simple type from the given sql types.




Description
================


public static [SimpleTypeHelper::getSimpleTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimpleTypeHelper/getSimpleTypes.md)(array $types) : array




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
See the source code for method [SimpleTypeHelper::getSimpleTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/SimpleTypeHelper.php#L30-L63)


See Also
================

The [SimpleTypeHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimpleTypeHelper.md) class.



