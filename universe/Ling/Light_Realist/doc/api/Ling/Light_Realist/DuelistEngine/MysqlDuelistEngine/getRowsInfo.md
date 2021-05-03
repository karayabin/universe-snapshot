[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\DuelistEngine\MysqlDuelistEngine class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine.md)


MysqlDuelistEngine::getRowsInfo
================



MysqlDuelistEngine::getRowsInfo — Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.




Description
================


public [MysqlDuelistEngine::getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/getRowsInfo.md)(string $requestId, array $duelistDeclaration, array $tags) : array | false




Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.

The structure of the returned array is:

- rows: the rows to render, in mysql associative style (i.e. key/value pairs)
- nbTotalRows: the total number of rows if the request were not filtered
- limit: array of:
     - offset: int, the index of the first rendered element in the context of all the rows
     - length: int, the page length (i.e. how many items should be rendered)
- debugInfo: additional info which the engine wants to share with the caller.
     It's an array of key/value pairs.

If not otherwise specified, the tags used are the [open tags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-tags.md).
Duelist declaration: https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/duelist.md.

If something wrong occurs, the error message can be fetched via the getError method.


Throws an exception if something unexpected occurs.




Parameters
================


- requestId

    

- duelistDeclaration

    

- tags

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlDuelistEngine::getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/DuelistEngine/MysqlDuelistEngine.php#L86-L170)


See Also
================

The [MysqlDuelistEngine](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/setContainer.md)<br>Next method: [getError](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/getError.md)<br>

