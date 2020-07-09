[Back to the Ling/JumboExploder api](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder.md)<br>
[Back to the Ling\JumboExploder\Iterator\JumboExploderCharIterator class](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator.md)


JumboExploderCharIterator::next
================



JumboExploderCharIterator::next — Moves the index forward and returns the corresponding character.




Description
================


public [JumboExploderCharIterator::next](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/next.md)(?int $n = 1) : string




Moves the index forward and returns the corresponding character.
Note: if the reading was not started, the first character will be returned.
If there is not more character, null will be returned.

You can move more than one character by using the n argument.




Parameters
================


- n

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [JumboExploderCharIterator::next](https://github.com/lingtalfi/JumboExploder/blob/master/Iterator/JumboExploderCharIterator.php#L59-L71)


See Also
================

The [JumboExploderCharIterator](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator.md) class.

Previous method: [setString](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/setString.md)<br>Next method: [lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/lookahead.md)<br>

