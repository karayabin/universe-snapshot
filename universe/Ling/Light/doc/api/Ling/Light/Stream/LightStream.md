[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightStream class
================
2019-04-09 --> 2021-07-30






Introduction
============

The LightStream class.



Class synopsis
==============


abstract class <span class="pl-k">LightStream</span> implements [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md), [\Stringable](https://wiki.php.net/rfc/stringable) {

- Properties
    - private resource [$stream](#property-stream) ;
    - protected static array [$modes](#property-modes) = ['readable' => ['r','r+','w+','a+','x+','c+'],'writable' => ['r+','w','w+','a','a+','x','x+','c','c+']] ;
    - protected bool [$readable](#property-readable) ;
    - protected bool [$writable](#property-writable) ;
    - protected bool [$seekable](#property-seekable) ;
    - protected bool [$isPipe](#property-isPipe) ;
    - protected int [$size](#property-size) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/__construct.md)() : void
    - public [append](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/append.md)(string $string) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/prepend.md)(string $string) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/write.md)(string $string, ?int $position = 0) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/insert.md)(string $string, int $position) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/truncate.md)() : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/read.md)(?int $position = 0, ?int $length = null) : string
    - public [getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getSize.md)() : int
    - public [tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/tell.md)() : int
    - public [setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setCursorPosition.md)(int $position) : void
    - public [__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/__toString.md)() : string
    - public [isReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isReadable.md)() : bool
    - public [isWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isWritable.md)() : bool
    - public [isSeekable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isSeekable.md)() : bool
    - public [isPipe](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/isPipe.md)() : bool
    - public [getMetaData](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getMetaData.md)() : array
    - protected [setStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setStream.md)($stream) : void
    - protected [fixPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/fixPosition.md)(int $position) : int
    - private [error](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/error.md)(string $msg) : void
    - private [checkReadable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/checkReadable.md)() : void
    - private [checkWritable](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/checkWritable.md)() : void

}




Properties
=============

- <span id="property-stream"><b>stream</b></span>

    A php stream resource.
    See https://www.php.net/manual/en/language.types.resource.php for more details
    
    

- <span id="property-modes"><b>modes</b></span>

    Resource modes
    
    

- <span id="property-readable"><b>readable</b></span>

    Whether the stream is readable. It's a cache.
    
    

- <span id="property-writable"><b>writable</b></span>

    Whether the stream is writable. It's a cache.
    
    

- <span id="property-seekable"><b>seekable</b></span>

    Whether the stream is seekable. It's a cache.
    
    

- <span id="property-isPipe"><b>isPipe</b></span>

    Whether the stream is a pipe. It's a cache.
    
    

- <span id="property-size"><b>size</b></span>

    The current size of the stream in bytes. It's a cache.
    
    



Methods
==============

- [LightStream::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/__construct.md) &ndash; Builds the LightStream instance.
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





Location
=============
Ling\Light\Stream\LightStream<br>
See the source code of [Ling\Light\Stream\LightStream](https://github.com/lingtalfi/Light/blob/master/Stream/LightStream.php)



SeeAlso
==============
Previous class: [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)<br>Next class: [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)<br>
