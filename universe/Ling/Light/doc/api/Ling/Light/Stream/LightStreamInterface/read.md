[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStreamInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)


LightStreamInterface::read
================



LightStreamInterface::read — and ending after the given length.




Description
================


abstract public [LightStreamInterface::read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/read.md)(?int $position = 0, ?int $length = null) : string




Returns a portion of the stream, starting at the given position,
and ending after the given length.

If the length is null, the stream will be read until the end (that's the default behaviour).

The position can be a negative number, in which case it's read from the end and backward, instead
of from the beginning and forward. See the class comment for more details.


Throws an exception if the stream is not readable.




Parameters
================


- position

    

- length

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightStreamInterface::read](https://github.com/lingtalfi/Light/blob/master/Stream/LightStreamInterface.php#L126-L126)


See Also
================

The [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md) class.

Previous method: [truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/truncate.md)<br>Next method: [getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/getSize.md)<br>

