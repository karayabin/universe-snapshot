[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightStreamInterface class
================
2019-04-09 --> 2020-04-17






Introduction
============

The LightStreamInterface interface.


Position numbers
----------

A position can be defined either as a positive number or a negative number.
If it's a positive number, we start to count from the beginning of the first character and moving towards the end of the stream.
If it's a negative number, we start to count from the end of the last character and moving towards the beginning of the stream.

So for instance in the following stream:

- 1234567890

A position of 6 will move the cursor to the left of the 7 character.
A position of -6 will move the cursor to the left of the 5 character.


The position is a modulo
-------
When the given position is greater than the stream's length, it cycles back from the beginning (in case
of a positive number) or from the end (in case of a negative number).

In other words, the position number is the position modulo the size of the stream.



Class synopsis
==============


abstract class <span class="pl-k">LightStreamInterface</span>  {

- Methods
    - abstract public [append](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/append.md)(string $string) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - abstract public [prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/prepend.md)(string $string) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - abstract public [write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/write.md)(string $string, ?int $position = 0) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - abstract public [insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/insert.md)(string $string, int $position) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - abstract public [truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/truncate.md)() : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - abstract public [read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/read.md)(?int $position = 0, ?int $length = null) : string
    - abstract public [getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/getSize.md)() : int
    - abstract public [tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/tell.md)() : int
    - abstract public [setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/setCursorPosition.md)(int $position) : void
    - abstract public [__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/__toString.md)() : string
    - abstract public [isReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isReadable.md)() : bool
    - abstract public [isWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isWritable.md)() : bool
    - abstract public [isSeekable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isSeekable.md)() : bool
    - abstract public [isPipe](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isPipe.md)() : bool
    - abstract public [getMetaData](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/getMetaData.md)() : array

}






Methods
==============

- [LightStreamInterface::append](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/append.md) &ndash; Appends the given string to the stream.
- [LightStreamInterface::prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/prepend.md) &ndash; Prepends the stream with the given string.
- [LightStreamInterface::write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/write.md) &ndash; Writes the given string from the given position.
- [LightStreamInterface::insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/insert.md) &ndash; Inserts the given string at the given position.
- [LightStreamInterface::truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/truncate.md) &ndash; Empties the stream and returns this instance for chaining.
- [LightStreamInterface::read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/read.md) &ndash; and ending after the given length.
- [LightStreamInterface::getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/getSize.md) &ndash; Returns the size in bytes of the current stream.
- [LightStreamInterface::tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/tell.md) &ndash; Returns the current position of the pointer.
- [LightStreamInterface::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/setCursorPosition.md) &ndash; Sets the cursor to the given position.
- [LightStreamInterface::__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/__toString.md) &ndash; Returns the whole stream as a string.
- [LightStreamInterface::isReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isReadable.md) &ndash; Returns whether the stream is readable.
- [LightStreamInterface::isWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isWritable.md) &ndash; Returns whether the stream is writable.
- [LightStreamInterface::isSeekable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isSeekable.md) &ndash; Returns whether the stream is seekable.
- [LightStreamInterface::isPipe](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/isPipe.md) &ndash; Returns whether the stream is a pipe.
- [LightStreamInterface::getMetaData](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/getMetaData.md) &ndash; Returns the array of meta data.





Location
=============
Ling\Light\Stream\LightStreamInterface<br>
See the source code of [Ling\Light\Stream\LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/Stream/LightStreamInterface.php)



SeeAlso
==============
Previous class: [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md)<br>Next class: [LightStringStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStringStream.md)<br>
