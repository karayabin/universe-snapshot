[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenFinder\Tool\TokenFinderTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md)


TokenFinderTool::getClassSignatureInfo
================



TokenFinderTool::getClassSignatureInfo — Returns an array containing info about the first class signature found in the tokens, or false if no class signature was found.




Description
================


public static [TokenFinderTool::getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getClassSignatureInfo.md)(array $tokens) : array




Returns an array containing info about the first class signature found in the tokens, or false if no class signature was found.

In case of success, the returned array structure is:

- 0: the class signature, including comments if any
- 1: the start line of the signature
- 2: the end line of the signature




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
See the source code for method [TokenFinderTool::getClassSignatureInfo](https://github.com/lingtalfi/TokenFun/blob/master/TokenFinder/Tool/TokenFinderTool.php#L260-L286)


See Also
================

The [TokenFinderTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool.md) class.

Previous method: [getParentClassName](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getParentClassName.md)<br>Next method: [getInterfaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenFinder/Tool/TokenFinderTool/getInterfaces.md)<br>

