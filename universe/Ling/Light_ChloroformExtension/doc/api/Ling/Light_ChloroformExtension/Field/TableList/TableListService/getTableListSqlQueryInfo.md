[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableList\TableListService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)


TableListService::getTableListSqlQueryInfo
================



TableListService::getTableListSqlQueryInfo — Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.




Description
================


protected [TableListService::getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getTableListSqlQueryInfo.md)(?bool $isCount = true, ?array $options = []) : array




Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.
The type of query returned depends on the isCount flag.

- if isCount=true, then the query is a count query (i.e. select count(*) as count...)
- if isCount=false, then the query is a query to fetch the items/rows.

The available options are:
- whereDev: an extra string to add to the where clause




Parameters
================


- isCount

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TableListService::getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php#L224-L277)


See Also
================

The [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) class.

Previous method: [getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getConfigurationItem.md)<br>

