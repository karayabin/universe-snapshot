[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\RicHelper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper.md)


RicHelper::getRicByPkAndColumnsAndUniqueIndexes
================



RicHelper::getRicByPkAndColumnsAndUniqueIndexes — Returns the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array from the given arguments.




Description
================


public static [RicHelper::getRicByPkAndColumnsAndUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getRicByPkAndColumnsAndUniqueIndexes.md)(array $pk, array $columns, array $uniqueIndexes, ?bool $useStrictRic = false) : array




Returns the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array from the given arguments.
- pk: An array of column names representing the primary key (can be an empty array if the table doesn't have a primary key)
- columns: An array of column names
- uniqueIndexes: An array of indexList. Each indexList is an array of column names representing an unique index.




Parameters
================


- pk

    

- columns

    

- uniqueIndexes

    

- useStrictRic

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [RicHelper::getRicByPkAndColumnsAndUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/RicHelper.php#L102-L118)


See Also
================

The [RicHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper.md) class.

Previous method: [getWhereByRics](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getWhereByRics.md)<br>

