[Back to the Ling/JumboExploder api](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder.md)<br>
[Back to the Ling\JumboExploder\Iterator\JumboExploderCharIterator class](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator.md)


JumboExploderCharIterator::lookahead
================



JumboExploderCharIterator::lookahead — Returns the trimmed substring from the current index to the (current index + length).




Description
================


public [JumboExploderCharIterator::lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/lookahead.md)(int $length) : string




Returns the trimmed substring from the current index to the (current index + length).

Note: if there are not enough characters (end of content), the empty string
will replace any missing character.




Parameters
================


- length

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [JumboExploderCharIterator::lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/Iterator/JumboExploderCharIterator.php#L86-L101)


See Also
================

The [JumboExploderCharIterator](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator.md) class.

Previous method: [next](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/next.md)<br>

