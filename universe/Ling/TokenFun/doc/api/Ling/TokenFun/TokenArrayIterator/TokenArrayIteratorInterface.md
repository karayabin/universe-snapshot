[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The TokenArrayIteratorInterface class
================
2020-07-28 --> 2021-08-16






Introduction
============

The TokenArrayIteratorInterface interface



Class synopsis
==============


abstract class <span class="pl-k">TokenArrayIteratorInterface</span>  {

- Methods
    - abstract public [key](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/key.md)() : mixed | false
    - abstract public [current](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/current.md)() : mixed | false
    - abstract public [next](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/next.md)() : bool
    - abstract public [prev](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/prev.md)() : bool
    - abstract public [valid](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/valid.md)() : bool
    - abstract public [seek](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/seek.md)($index) : bool
    - abstract public [getArray](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/getArray.md)() : array

}






Methods
==============

- [TokenArrayIteratorInterface::key](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/key.md) &ndash; Returns the current key, or false if the cursor is out of bounds.
- [TokenArrayIteratorInterface::current](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/current.md) &ndash; Returns the current value, or false if the cursor is out of bounds.
- [TokenArrayIteratorInterface::next](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/next.md) &ndash; Moves the internal pointer forward by one step.
- [TokenArrayIteratorInterface::prev](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/prev.md) &ndash; Moves the internal pointer backward by one step.
- [TokenArrayIteratorInterface::valid](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/valid.md) &ndash; Returns whether or not the current position is valid.
- [TokenArrayIteratorInterface::seek](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/seek.md) &ndash; Seeks to index, and returns whether the method has succeeded in positioning the cursor at the given index.
- [TokenArrayIteratorInterface::getArray](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIteratorInterface/getArray.md) &ndash; Returns the inner array.





Location
=============
Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface<br>
See the source code of [Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface](https://github.com/lingtalfi/TokenFun/blob/master/TokenArrayIterator/TokenArrayIteratorInterface.php)



SeeAlso
==============
Previous class: [TokenArrayIterator](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator.md)<br>Next class: [TokenArrayIteratorTool](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/Tool/TokenArrayIteratorTool.md)<br>
