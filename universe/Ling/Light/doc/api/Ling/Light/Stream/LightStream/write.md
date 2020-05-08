[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStream class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md)


LightStream::write
================



LightStream::write — Writes the given string from the given position.




Description
================


public [LightStream::write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/write.md)(string $string, ?int $position = 0) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)




Writes the given string from the given position.
This replaces the corresponding old characters of the stream.

The position can be a negative number, in which case it's defined from the end and backward, instead
of from the beginning and forward. See the class comment for more details.

Throws an exception if the stream is not writable.




Parameters
================


- string

    

- position

    


Return values
================

Returns [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightStream::write](https://github.com/lingtalfi/Light/blob/master/Stream/LightStream.php#L104-L113)


See Also
================

The [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md) class.

Previous method: [prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/prepend.md)<br>Next method: [insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/insert.md)<br>

