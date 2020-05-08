[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStreamInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)


LightStreamInterface::setCursorPosition
================



LightStreamInterface::setCursorPosition — Sets the cursor to the given position.




Description
================


abstract public [LightStreamInterface::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/setCursorPosition.md)(int $position) : void




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
See the source code for method [LightStreamInterface::setCursorPosition](https://github.com/lingtalfi/Light/blob/master/Stream/LightStreamInterface.php#L155-L155)


See Also
================

The [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md) class.

Previous method: [tell](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/tell.md)<br>Next method: [__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/__toString.md)<br>

