[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::getMethodsInfo
================



TokenFinderTool::getMethodsInfo — Returns some info about the methods found in the given tokens.




Description
================


public static [TokenFinderTool::getMethodsInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getMethodsInfo.md)(array $tokens) : array




Returns some info about the methods found in the given tokens.

The returned array is an array of methodName => info, each info is an array with the following properties:
     - name: string
     - visibility: public (default)|private|protected
     - abstract: bool
     - final: bool
     - static: bool
     - methodStartLine: int
     - methodEndLine: int
     - content: string
     - args: string
     - commentType: null|regular\docBlock
     - commentStartLine: null|int
     - commentEndLine: null|int
     - comment: null|string
     - startIndex: int, the index at which the pattern starts




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
See the source code for method [TokenFinderTool::getMethodsInfo](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L378-L524)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getInterfaces.md)<br>Next method: [getNamespace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getNamespace.md)<br>

