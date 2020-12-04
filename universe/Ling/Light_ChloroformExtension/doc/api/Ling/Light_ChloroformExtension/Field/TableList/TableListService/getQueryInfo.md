[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableList\TableListService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)


TableListService::getQueryInfo
================



TableListService::getQueryInfo — Returns the query info based on the given mode.




Description
================


private [TableListService::getQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getQueryInfo.md)(string $mode, ?array $options = []) : array




Returns the query info based on the given mode.
It's an array containing:

- 0: string, the query to execute
- 1: array, the pdo markers to execute the query with




Parameters
================


- mode

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TableListService::getQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php#L257-L284)


See Also
================

The [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md)<br>Next method: [checkSecurity](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/checkSecurity.md)<br>

