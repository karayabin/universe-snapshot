[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The TokenArrayIterator class
================
2020-07-28 --> 2021-08-16






Introduction
============

The TokenArrayIterator class.



Class synopsis
==============


class <span class="pl-k">TokenArrayIterator</span> implements [TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md) {

- Properties
    - protected array [$array](#property-array) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/__construct.md)(array $array) : void
    - public [key](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/key.md)() : mixed | false
    - public [current](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/current.md)() : mixed | false
    - public [next](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/next.md)() : bool
    - public [prev](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/prev.md)() : bool
    - public [valid](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/valid.md)() : bool
    - public [seek](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/seek.md)($index) : bool
    - public [getArray](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/getArray.md)() : array
    - public [dump](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/dump.md)(?$fromCurrent = false) : void

}




Properties
=============

- <span id="property-array"><b>array</b></span>

    This property holds the array for this instance.
    
    



Methods
==============

- [TokenArrayIterator::__construct](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/__construct.md) &ndash; Builds the TokenArrayIterator instance.
- [TokenArrayIterator::key](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/key.md) &ndash; Returns the current key, or false if the cursor is out of bounds.
- [TokenArrayIterator::current](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/current.md) &ndash; Returns the current value, or false if the cursor is out of bounds.
- [TokenArrayIterator::next](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/next.md) &ndash; Moves the internal pointer forward by one step.
- [TokenArrayIterator::prev](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/prev.md) &ndash; Moves the internal pointer backward by one step.
- [TokenArrayIterator::valid](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/valid.md) &ndash; Returns whether or not the current position is valid.
- [TokenArrayIterator::seek](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/seek.md) &ndash; Seeks to index, and returns whether the method has succeeded in positioning the cursor at the given index.
- [TokenArrayIterator::getArray](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/getArray.md) &ndash; Returns the inner array.
- [TokenArrayIterator::dump](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator/dump.md) &ndash; Displays the token explicit names of the tokens parsed by this iterator.





Location
=============
Ling\TokenFun\TokenArrayIterator\TokenArrayIterator<br>
See the source code of [Ling\TokenFun\TokenArrayIterator\TokenArrayIterator](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/TokenArrayIterator.php)



SeeAlso
==============
Previous class: [UseStatementsParser](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser.md)<br>Next class: [TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface.md)<br>
