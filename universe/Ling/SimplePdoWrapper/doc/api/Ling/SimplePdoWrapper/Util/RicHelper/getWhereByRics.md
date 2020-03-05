[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)<br>
[Back to the Ling\SimplePdoWrapper\Util\RicHelper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper.md)


RicHelper::getWhereByRics
================



RicHelper::getWhereByRics — Returns the where part of an sql query (where keyword excluded) based on the given rics.




Description
================


public static [RicHelper::getWhereByRics](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getWhereByRics.md)(array $ricColumns, array $userRics, array &$markers) : string




Returns the where part of an sql query (where keyword excluded) based on the given rics.
See the [ric definition](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) for more info.

Also feeds the pdo markers array.

It returns a string that looks like this for instance (parenthesis are part of the returned string)):

- (
     (user_id like '1' AND permission_group_id like '5')
     OR (user_id like '3' AND permission_group_id like '4')
     ...
  )


The given rics is an array of ric column names,
whereas the given userRics is an array of items, each of which representing a row and
being an array of (ric) column to value.




Parameters
================


- ricColumns

    

- userRics

    

- markers

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RicHelper::getWhereByRics](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/RicHelper.php#L42-L84)


See Also
================

The [RicHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper.md) class.

Next method: [getRicByPkAndColumnsAndUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getRicByPkAndColumnsAndUniqueIndexes.md)<br>

