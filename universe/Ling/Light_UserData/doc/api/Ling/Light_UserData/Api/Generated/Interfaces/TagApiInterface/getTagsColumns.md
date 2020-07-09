[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md)


TagApiInterface::getTagsColumns
================



TagApiInterface::getTagsColumns — Returns a subset of the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [TagApiInterface::getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TagApiInterface::getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/TagApiInterface.php#L130-L130)


See Also
================

The [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md) class.

Previous method: [getTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumn.md)<br>Next method: [getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsKey2Value.md)<br>

