[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasBlockApi class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi.md)


PageHasBlockApi::getPageHasBlocksColumns
================



PageHasBlockApi::getPageHasBlocksColumns — Returns a subset of the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [PageHasBlockApi::getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the pageHasBlock rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
See the source code for method [PageHasBlockApi::getPageHasBlocksColumns](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Generated/Classes/PageHasBlockApi.php#L214-L223)


See Also
================

The [PageHasBlockApi](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi.md) class.

Previous method: [getPageHasBlocksColumn](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksColumn.md)<br>Next method: [getPageHasBlocksKey2Value](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Generated/Classes/PageHasBlockApi/getPageHasBlocksKey2Value.md)<br>

