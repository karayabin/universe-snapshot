[Back to the Ling/JumboExploder api](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder.md)



The JumboExploderCharIterator class
================
2020-06-09 --> 2021-05-31






Introduction
============

The JumboExploderCharIterator class.



Class synopsis
==============


class <span class="pl-k">JumboExploderCharIterator</span>  {

- Properties
    - protected array [$chars](#property-chars) ;
    - protected int|null [$index](#property-index) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/__construct.md)() : void
    - public [setString](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/setString.md)(string $str) : void
    - public [next](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/next.md)(?int $n = 1) : string
    - public [lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/lookahead.md)(int $length) : string

}




Properties
=============

- <span id="property-chars"><b>chars</b></span>

    This property holds the chars for this instance.
    
    

- <span id="property-index"><b>index</b></span>

    This property holds the index for this instance.
    Null means the reading hasn't started yet.
    
    



Methods
==============

- [JumboExploderCharIterator::__construct](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/__construct.md) &ndash; Builds the JumboExploderCharIterator instance.
- [JumboExploderCharIterator::setString](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/setString.md) &ndash; Sets the string to parse.
- [JumboExploderCharIterator::next](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/next.md) &ndash; Moves the index forward and returns the corresponding character.
- [JumboExploderCharIterator::lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Iterator/JumboExploderCharIterator/lookahead.md) &ndash; Returns the trimmed substring from the current index to the (current index + length).





Location
=============
Ling\JumboExploder\Iterator\JumboExploderCharIterator<br>
See the source code of [Ling\JumboExploder\Iterator\JumboExploderCharIterator](https://github.com/lingtalfi/JumboExploder/blob/master/Iterator/JumboExploderCharIterator.php)



SeeAlso
==============
Previous class: [JumboExploderException](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/Exception/JumboExploderException.md)<br>Next class: [JumboExploder](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder.md)<br>
