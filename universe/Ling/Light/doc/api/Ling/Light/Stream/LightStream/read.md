[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStream class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md)


LightStream::read
================



LightStream::read — and ending after the given length.




Description
================


public [LightStream::read](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/read.md)(?int $position = 0, ?int $length = null) : string




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
See the source code for method [LightStream::read](https://github.com/lingtalfi/Light/blob/master/Stream/LightStream.php#L147-L163)


See Also
================

The [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md) class.

Previous method: [truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/truncate.md)<br>Next method: [getSize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/getSize.md)<br>

