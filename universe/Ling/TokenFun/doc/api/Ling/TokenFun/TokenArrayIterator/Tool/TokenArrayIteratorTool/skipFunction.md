[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)


TokenArrayIteratorTool::skipFunction
================



TokenArrayIteratorTool::skipFunction — Moves the iterator pointer forward skipping functions, and returns whether a function has been skipped.




Description
================


public static [TokenArrayIteratorTool::skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipFunction.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool




Moves the iterator pointer forward skipping functions, and returns whether a function has been skipped.
Skips a function like:

         function(){
             // do something
         }

only if it is found at the current position of tai.
If a match was found, the cursor is placed just AT the last bracket.




Parameters
================


- tai

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [TokenArrayIteratorTool::skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php#L236-L271)


See Also
================

The [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) class.

Previous method: [skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipSquareBracketsChain.md)<br>Next method: [skipNsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipNsChain.md)<br>

