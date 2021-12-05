[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)


TokenArrayIteratorTool::skipNsChain
================



TokenArrayIteratorTool::skipNsChain — Moves the iterator pointer forward skipping namespace chain, and returns whether a namespace chain has been skipped.




Description
================


public static [TokenArrayIteratorTool::skipNsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipNsChain.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool




Moves the iterator pointer forward skipping namespace chain, and returns whether a namespace chain has been skipped.

In case of a successful match, the cursor position is AFTER the last token of the ns chain.

Skips a chain like \My\Object or My\Object




Parameters
================


- tai

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [TokenArrayIteratorTool::skipNsChain](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php#L285-L331)


See Also
================

The [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) class.

Previous method: [skipFunction](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipFunction.md)<br>Next method: [skipWhiteSpaces](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpaces.md)<br>

