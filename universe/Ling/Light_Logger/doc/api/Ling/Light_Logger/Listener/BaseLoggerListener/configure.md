[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)<br>
[Back to the Ling\Light_Logger\Listener\BaseLoggerListener class](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener.md)


BaseLoggerListener::configure
================



BaseLoggerListener::configure — Configures this instance.




Description
================


public [BaseLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/configure.md)(array $options) : void




Configures this instance.
The available options are:

- format: string. Default to:

                 [{channel}]: {dateTime} -- {message}

         The format to use to convert the logger message into its formatted form.
         For more details, see the format property of this class.

- expand_array: bool=true. If an array is passed, whether to convert into a one line array (false)
             or a multi-line string (true).




Parameters
================


- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [BaseLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/BaseLoggerListener.php#L69-L77)


See Also
================

The [BaseLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/__construct.md)<br>Next method: [getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md)<br>

