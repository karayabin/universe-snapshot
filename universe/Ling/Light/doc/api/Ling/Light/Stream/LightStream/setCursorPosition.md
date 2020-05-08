[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStream class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md)


LightStream::setCursorPosition
================



LightStream::setCursorPosition — Sets the cursor to the given position.




Description
================


public [LightStream::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/setCursorPosition.md)(int $position) : void




Sets the cursor to the given position.
This will only work on seekable streams.

The position can be a negative number, see the class comments for more details.




Parameters
================


- position

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightStream::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/Stream/LightStream.php#L200-L209)


See Also
================

The [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md) class.

Previous method: [tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/tell.md)<br>Next method: [__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/__toString.md)<br>

