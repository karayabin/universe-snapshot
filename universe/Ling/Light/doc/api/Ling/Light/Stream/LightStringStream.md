[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightStringStream class
================
2019-04-09 --> 2020-07-28






Introduction
============

The LightStringStream class.

A readable/writable stream.



Class synopsis
==============


class <span class="pl-k">LightStringStream</span> extends [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md) implements [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md) {

- Inherited properties
    - protected static array [LightStream::$modes](#property-modes) = ['readable' => ['r','r+','w+','a+','x+','c+'],'writable' => ['r+','w','w+','a','a+','x','x+','c','c+']] ;
    - protected bool [LightStream::$readable](#property-readable) ;
    - protected bool [LightStream::$writable](#property-writable) ;
    - protected bool [LightStream::$seekable](#property-seekable) ;
    - protected bool [LightStream::$isPipe](#property-isPipe) ;
    - protected int [LightStream::$size](#property-size) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStringStream/__construct.md)() : void

- Inherited methods
    - public [LightStream::append](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/append.md)(string $string) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [LightStream::prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/prepend.md)(string $string) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [LightStream::write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/write.md)(string $string, ?int $position = 0) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [LightStream::insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/insert.md)(string $string, int $position) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [LightStream::truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/truncate.md)() : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [LightStream::read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/read.md)(?int $position = 0, ?int $length = null) : string
    - public [LightStream::getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getSize.md)() : int
    - public [LightStream::tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/tell.md)() : int
    - public [LightStream::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setCursorPosition.md)(int $position) : void
    - public [LightStream::__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/__toString.md)() : string
    - public [LightStream::isReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isReadable.md)() : bool
    - public [LightStream::isWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isWritable.md)() : bool
    - public [LightStream::isSeekable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isSeekable.md)() : bool
    - public [LightStream::isPipe](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isPipe.md)() : bool
    - public [LightStream::getMetaData](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getMetaData.md)() : array
    - protected [LightStream::setStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setStream.md)($stream) : void
    - protected [LightStream::fixPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/fixPosition.md)(int $position) : int
    - private [LightStream::error](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/error.md)(string $msg) : void
    - private [LightStream::checkReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/checkReadable.md)() : void
    - private [LightStream::checkWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/checkWritable.md)() : void

}






Methods
==============

- [LightStringStream::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStringStream/__construct.md) &ndash; Builds the LightStringStream instance.
- [LightStream::append](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/append.md) &ndash; Appends the given string to the stream.
- [LightStream::prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/prepend.md) &ndash; Prepends the stream with the given string.
- [LightStream::write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/write.md) &ndash; Writes the given string from the given position.
- [LightStream::insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/insert.md) &ndash; Inserts the given string at the given position.
- [LightStream::truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/truncate.md) &ndash; Empties the stream and returns this instance for chaining.
- [LightStream::read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/read.md) &ndash; and ending after the given length.
- [LightStream::getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getSize.md) &ndash; Returns the size in bytes of the current stream.
- [LightStream::tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/tell.md) &ndash; Returns the current position of the pointer.
- [LightStream::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setCursorPosition.md) &ndash; Sets the cursor to the given position.
- [LightStream::__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/__toString.md) &ndash; Returns the whole stream as a string.
- [LightStream::isReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isReadable.md) &ndash; Returns whether the stream is readable.
- [LightStream::isWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isWritable.md) &ndash; Returns whether the stream is writable.
- [LightStream::isSeekable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isSeekable.md) &ndash; Returns whether the stream is seekable.
- [LightStream::isPipe](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isPipe.md) &ndash; Returns whether the stream is a pipe.
- [LightStream::getMetaData](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getMetaData.md) &ndash; Returns the array of meta data.
- [LightStream::setStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setStream.md) &ndash; Sets the stream resource for this instance.
- [LightStream::fixPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/fixPosition.md) &ndash; Returns a positive number representing the position.
- [LightStream::error](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/error.md) &ndash; Throws an exception.
- [LightStream::checkReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/checkReadable.md) &ndash; Checks that the stream is readable, and if not throws an exception.
- [LightStream::checkWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/checkWritable.md) &ndash; Checks that the stream is writable, and if not throws an exception.


Examples
==========

Demo
===========
2020-04-16


```php 

<?php 


$stream = new LightStringStream();

$stream->append("pou"); // pou
$stream->append("liche"); // pouliche
$stream->insert("tar", 2); // potaruliche
$stream->insert("kop", -2); // potarulickophe
$stream->prepend("gee"); // geepotarulickophe
$stream->write("XXX", 2); // geXXXtarulickophe
$stream->write("YY", -4); // geXXXtarulickYYhe


a($stream->read()); // geXXXtarulickYYhe
a($stream->read(2)); // XXXtarulickYYhe
a($stream->read(-2)); // he
a($stream->read(2, 5)); // XXXta
a($stream->tell()); // 7
a($stream->getSize()); // 17




az($stream->__toString());

```


Location
=============
Ling\Light\Stream\LightStringStream<br>
See the source code of [Ling\Light\Stream\LightStringStream](https://github.com/lingtalfi/Light/blob/master/Stream/LightStringStream.php)



SeeAlso
==============
Previous class: [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)<br>Next class: [LightTool](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Tool/LightTool.md)<br>
