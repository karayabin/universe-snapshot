[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)<br>
[Back to the Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool class](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)


TokenArrayIteratorTool::skipUntil
================



TokenArrayIteratorTool::skipUntil — Iterates the given tokenArrayIterator until it finds the given tokenProp.




Description
================


public static [TokenArrayIteratorTool::skipUntil](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipUntil.md)([Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) $tai, $tokenProp, ?bool $includeLast = false) : bool




Iterates the given tokenArrayIterator until it finds the given tokenProp.
It returns true when the tokenProp is matched, and false if there is no match.

If $includeLast is false, the matching tokenProp will NOT be included in the result (this is the default), otherwise it will.




Parameters
================


- tai

    

- tokenProp

    

- includeLast

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TokenArrayIteratorTool::skipUntil](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/Tool/TokenArrayIteratorTool.php#L408-L426)


See Also
================

The [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md) class.

Previous method: [skipWhiteSpacesOrComma](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool/skipWhiteSpacesOrComma.md)<br>

