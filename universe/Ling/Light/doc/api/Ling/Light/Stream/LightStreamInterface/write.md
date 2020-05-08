[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStreamInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)


LightStreamInterface::write
================



LightStreamInterface::write — Writes the given string from the given position.




Description
================


abstract public [LightStreamInterface::write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/write.md)(string $string, ?int $position = 0) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)




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
See the source code for method [LightStreamInterface::write](https://github.com/lingtalfi/Light/blob/master/Stream/LightStreamInterface.php#L78-L78)


See Also
================

The [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md) class.

Previous method: [prepend](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/prepend.md)<br>Next method: [insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/insert.md)<br>

