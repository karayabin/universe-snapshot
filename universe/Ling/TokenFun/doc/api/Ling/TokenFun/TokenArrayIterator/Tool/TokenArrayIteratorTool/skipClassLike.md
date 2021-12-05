[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)


TokenArrayIteratorTool::skipClassLike
================



TokenArrayIteratorTool::skipClassLike — Moves the iterator pointer forward skipping class definition, and returns whether or not a class definition has been skipped.




Description
================


public static [TokenArrayIteratorTool::skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipClassLike.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai) : bool




Moves the iterator pointer forward skipping class definition, and returns whether or not a class definition has been skipped.

Skips a string like:

- class Do {}
- class \Do extends \Foo {}
- abstract class \Do\Foo extends \Foo\Zoo {}
- abstract class \Do implements \Foo {}
- interface \Do {}
- ...

if it is found at the current position of tai.
If a match was found, the cursor is placed just AT the last bracket, and true is returned; otherwise false is returned.




Parameters
================


- tai

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [TokenArrayIteratorTool::skipClassLike](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php#L120-L174)


See Also
================

The [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) class.

Previous method: [moveToCorrespondingEnd](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/moveToCorrespondingEnd.md)<br>Next method: [skipSquareBracketsChain](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipSquareBracketsChain.md)<br>

