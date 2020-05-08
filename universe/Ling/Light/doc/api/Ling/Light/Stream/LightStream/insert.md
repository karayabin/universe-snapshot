[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Stream\LightStream class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md)


LightStream::insert
================



LightStream::insert — Inserts the given string at the given position.




Description
================


public [LightStream::insert](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/insert.md)(string $string, int $position) : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)




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
See the source code for method [LightStream::insert](https://github.com/lingtalfi/Light/blob/master/Stream/LightStream.php#L118-L128)


See Also
================

The [LightStream](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream.md) class.

Previous method: [write](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/write.md)<br>Next method: [truncate](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStream/truncate.md)<br>

