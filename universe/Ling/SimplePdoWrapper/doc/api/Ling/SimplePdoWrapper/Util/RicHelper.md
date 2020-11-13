[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The RicHelper class
================
2019-07-22 --> 2020-11-12






Introduction
============

The RicHelper class.



Class synopsis
==============


class <span class="pl-k">RicHelper</span>  {

- Methods
    - public static [getWhereByRics](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getWhereByRics.md)(array $ricColumns, array $userRics, array &$markers) : string
    - public static [getRicByPkAndColumnsAndUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getRicByPkAndColumnsAndUniqueIndexes.md)(array $pk, array $columns, array $uniqueIndexes, ?bool $useStrictRic = false) : array

}






Methods
==============

- [RicHelper::getWhereByRics](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getWhereByRics.md) &ndash; Returns the where part of an sql query (where keyword excluded) based on the given rics.
- [RicHelper::getRicByPkAndColumnsAndUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getRicByPkAndColumnsAndUniqueIndexes.md) &ndash; Returns the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array from the given arguments.





Location
=============
Ling\SimplePdoWrapper\Util\RicHelper<br>
See the source code of [Ling\SimplePdoWrapper\Util\RicHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/RicHelper.php)



SeeAlso
==============
Previous class: [OrderBy](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy.md)<br>Next class: [SimplePdoGenericHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimplePdoGenericHelper.md)<br>
