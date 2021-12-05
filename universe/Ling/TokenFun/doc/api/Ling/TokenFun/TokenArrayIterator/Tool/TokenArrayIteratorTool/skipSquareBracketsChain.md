[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)


TokenArrayIteratorTool::skipSquareBracketsChain
================



TokenArrayIteratorTool::skipSquareBracketsChain — Moves the iterator pointer forward skipping bracket wrappings, and returns whether a bracket wrapping has been skipped.




Description
================


public static [TokenArrayIteratorTool::skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipSquareBracketsChain.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool




Moves the iterator pointer forward skipping bracket wrappings, and returns whether a bracket wrapping has been skipped.


Skips a string like:

         ["pou"]
         [97]["o"]["..."]

if it is found at the current position of tai.
If a match was found, the cursor is placed just AT the last bracket.




Parameters
================


- tai

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [TokenArrayIteratorTool::skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php#L191-L220)


See Also
================

The [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) class.

Previous method: [skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipClassLike.md)<br>Next method: [skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipFunction.md)<br>

