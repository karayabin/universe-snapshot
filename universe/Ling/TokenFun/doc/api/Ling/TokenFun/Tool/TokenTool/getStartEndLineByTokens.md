[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\Tool\TokenTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool.md)


TokenTool::getStartEndLineByTokens
================



TokenTool::getStartEndLineByTokens — Returns an array: [startLine, endLine] containing the line numbers at which the given tokens start and end.




Description
================


public static [TokenTool::getStartEndLineByTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/getStartEndLineByTokens.md)(array $tokens) : array




Returns an array: [startLine, endLine] containing the line numbers at which the given tokens start and end.

If all the given tokens don't have this information (i.e. all tokens are special chars),
and exception is thrown.




Parameters
================


- tokens

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TokenTool::getStartEndLineByTokens](https://github.com/lingtalfi/TokenFun/blob/master/Tool/TokenTool.php#L129-L148)


See Also
================

The [TokenTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool.md) class.

Previous method: [fetchAll](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/fetchAll.md)<br>Next method: [ltrim](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Tool/TokenTool/ltrim.md)<br>

