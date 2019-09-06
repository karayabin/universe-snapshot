[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)<br>
[Back to the Ling\Light_Logger\Listener\LightFileLoggerListener class](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md)


LightFileLoggerListener::log
================



LightFileLoggerListener::log — and possibly rotates the file when the file size gets too big.




Description
================


public [LightFileLoggerListener::log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/log.md)(?$message, string $channel) : void




Writes the logger message to the file specified in the configuration,
and possibly rotates the file when the file size gets too big.
See more in the class description.


Sends a the log $message to the given $channel.




Parameters
================


- message

    

- channel

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightFileLoggerListener::log](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/LightFileLoggerListener.php#L155-L186)


See Also
================

The [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) class.

Previous method: [configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/configure.md)<br>Next method: [getFileFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/getFileFormat.md)<br>

