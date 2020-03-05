[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md)


LightChloroformExtensionService::getTableListSqlQueryInfo
================



LightChloroformExtensionService::getTableListSqlQueryInfo — Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.




Description
================


protected [LightChloroformExtensionService::getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListSqlQueryInfo.md)(string $tableListIdentifier, ?bool $isCount = true, ?array $options = []) : array




Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.
The type of query returned depends on the isCount flag.

- if isCount=true, then the query is a count query (i.e. select count(*) as count...)
- if isCount=false, then the query is a query to fetch the items/rows.

The available options are:
- whereDev: an extra string to add to the where clause




Parameters
================


- tableListIdentifier

    

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
See the source code for method [LightChloroformExtensionService::getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Service/LightChloroformExtensionService.php#L217-L270)


See Also
================

The [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md)<br>

