[Back to the Ling/Light_ErrorHandler api](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler.md)<br>
[Back to the Ling\Light_ErrorHandler\Light_Logger\LightLoggerErrorHandlerListener class](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener.md)


LightLoggerErrorHandlerListener::listen
================



LightLoggerErrorHandlerListener::listen — and possibly rotates the file when the file size gets too big.




Description
================


public [LightLoggerErrorHandlerListener::listen](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/listen.md)($msg, string $channel) : void




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
See the source code for method [LightLoggerErrorHandlerListener::listen](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/Light_Logger/LightLoggerErrorHandlerListener.php#L46-L57)


See Also
================

The [LightLoggerErrorHandlerListener](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/setContainer.md)<br>

