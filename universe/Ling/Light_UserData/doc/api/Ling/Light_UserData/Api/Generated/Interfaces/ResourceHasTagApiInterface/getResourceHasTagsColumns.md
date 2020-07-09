[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceHasTagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md)


ResourceHasTagApiInterface::getResourceHasTagsColumns
================



ResourceHasTagApiInterface::getResourceHasTagsColumns — Returns a subset of the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [ResourceHasTagApiInterface::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
See the source code for method [ResourceHasTagApiInterface::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceHasTagApiInterface.php#L115-L115)


See Also
================

The [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md) class.

Previous method: [getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumn.md)<br>Next method: [getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsKey2Value.md)<br>

