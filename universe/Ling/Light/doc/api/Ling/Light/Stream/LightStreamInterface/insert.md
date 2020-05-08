[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStreamInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)


LightStreamInterface::insert
================



LightStreamInterface::insert — Inserts the given string at the given position.




Description
================


abstract public [LightStreamInterface::insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/insert.md)(string $string, int $position) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)




Inserts the given string at the given position.

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
See the source code for method [LightStreamInterface::insert](https://github.com/lingtalfi/Light/blob/master/Stream/LightStreamInterface.php#L93-L93)


See Also
================

The [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md) class.

Previous method: [write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/write.md)<br>Next method: [truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface/truncate.md)<br>

