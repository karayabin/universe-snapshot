[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)


TokenArrayIteratorTool::moveToCorrespondingEnd
================



TokenArrayIteratorTool::moveToCorrespondingEnd — Look at the "opening" token at the current position and tries to move to the corresponding closing token.




Description
================


public static [TokenArrayIteratorTool::moveToCorrespondingEnd](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/moveToCorrespondingEnd.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai, ?array $tokens = null, ?array &$capture = []) : bool




Look at the "opening" token at the current position and tries to move to the corresponding closing token.
Returns whether or not the cursor could be moved to the corresponding end.


An opening token is one of:
     - {
     - (
     - [
And the corresponding closing tokens are respectively:
     - }
     - )
     - ]




Parameters
================


- tai

    

- tokens

    

- capture

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [TokenArrayIteratorTool::moveToCorrespondingEnd](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php#L56-L98)


See Also
================

The [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) class.

Previous method: [isWhiteSpace](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/isWhiteSpace.md)<br>Next method: [skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipClassLike.md)<br>

