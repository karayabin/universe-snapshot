[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\DuelistEngine\DuelistEngineInterface class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md)


DuelistEngineInterface::getRowsInfo
================



DuelistEngineInterface::getRowsInfo — Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.




Description
================


abstract public [DuelistEngineInterface::getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface/getRowsInfo.md)(string $requestId, array $duelistDeclaration, array $tags) : array | false




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
See the source code for method [DuelistEngineInterface::getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/DuelistEngine/DuelistEngineInterface.php#L41-L41)


See Also
================

The [DuelistEngineInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md) class.

Next method: [getError](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface/getError.md)<br>

