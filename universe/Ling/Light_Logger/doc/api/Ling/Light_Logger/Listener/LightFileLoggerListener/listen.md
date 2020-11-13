[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)<br>
[Back to the Ling\Light_Logger\Listener\LightFileLoggerListener class](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md)


LightFileLoggerListener::listen
================



LightFileLoggerListener::listen — and possibly rotates the file when the file size gets too big.




Description
================


public [LightFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/listen.md)($msg, string $channel) : void




Writes the logger message to the file specified in the configuration,
and possibly rotates the file when the file size gets too big.
See more in the class description.


Reacts to the given logger message in a specific way.
Note: the message can be of any type (string, object, ...).




Parameters
================


- msg

    

- channel

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/LightFileLoggerListener.php#L181-L240)


See Also
================

The [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) class.

Previous method: [configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/configure.md)<br>Next method: [getFileFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/getFileFormat.md)<br>

