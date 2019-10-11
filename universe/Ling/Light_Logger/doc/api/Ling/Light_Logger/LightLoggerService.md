[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The LightLoggerService class
================
2019-08-01 --> 2019-09-24






Introduction
============

The LightLoggerService class provides a simple logging system for a light application.

With this logging system, messages are sent to channels.
The message and the channel are defined when the message is emitted.

This class will receive emitter message and channel and will make its own message (called logger message)
out of it, according to a format.

The default format is:
     [{channel}]: {dateTime} -- {message}

You can change the format using the setFormat method.


This logging system is a standard observer/notifier system, where subscribers/listeners subscribe to
certain channel(s).

Listeners decide which channel they want to subscribe to, and how to react if a message is sent on a channel
they are listening to (for instance: they can write the message to a file, or do send a mail to an admin, ...).


A channel is just any string. Traditional channels are:

- trace: when developing some complex objects, you might want to use this channel.
         It's the most low level detailed channel, it works as a tool for the developer.
- debug: helps having a linear overview of how the app thinks
- notice: message worth notifying
- warn: something not optimal just happened, it deserves your attention
- error: critical error, some measures need to be taken NOW
- fatal: the web application is not responding (uncaught exception), some measures need to be taken NOW!!!

But you can create any other channel. For instance:
- stats: use this channel to collect statistic oriented info (for instance the url, ip combo...)
- test_one
- ...


Note: at the moment, the time part of the logger message depends on the default timezone,
so be sure to set the timezone correctly before you run this logger (for instance add the following
statement

- date_default_timezone_set("Europe/Paris");

towards the beginning of your app).



Class synopsis
==============


class <span class="pl-k">LightLoggerService</span> implements [UniversalLoggerInterface](https://github.com/lingtalfi/UniversalLogger) {

- Properties
    - protected array [$listeners](#property-listeners) ;
    - private string [$format](#property-format) ;
    - private bool [$useExpandedArray](#property-useExpandedArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/__construct.md)() : void
    - public [addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/addListener.md)(?$channel, ?$listener) : void
    - public [setFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/setFormat.md)(string $format) : void
    - public [setUseExpandedArray](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/setUseExpandedArray.md)(bool $useExpandedArray) : void
    - public [log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/log.md)(?$message, string $channel) : void
    - protected [dispatch](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/dispatch.md)(string $channel, ?$msg) : void
    - public [trace](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/trace.md)(?$msg) : void
    - public [debug](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/debug.md)(?$msg) : void
    - public [notice](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/notice.md)(?$msg) : void
    - public [warn](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/warn.md)(?$msg) : void
    - public [error](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/error.md)(?$msg) : void
    - public [fatal](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/fatal.md)(?$msg) : void
    - protected [getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/getFormattedMessage.md)(string $channel, ?$msg) : string

}




Properties
=============

- <span id="property-listeners"><b>listeners</b></span>

    This property holds the listeners.
    It's an array of channel name => listeners.
    A listener can be either a callable or a LightLoggerListenerInterface instance.
    
    

- <span id="property-format"><b>format</b></span>

    This property holds the format used by this class to transform the emitter message into the
    actual logger message sent to the listeners.
    
    
    The following tags are available:
    
    - {channel}: the channel in uppercase
    - {dateTime}: the date time string (for instance: 2019-01-16 16:33:15)
    - {message}: the emitter (original) message
    
    

- <span id="property-useExpandedArray"><b>useExpandedArray</b></span>

    This property holds whether to use the useExpandedArray for this instance.
    With useExpandedArray on, the arrays will be indented with tab and return chars in the log file,
    whereas with useExpandedArray off, the array will fit on a single line.
    
    Default is true (as it's more readable).
    
    



Methods
==============

- [LightLoggerService::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/__construct.md) &ndash; Builds the LightLoggerService instance.
- [LightLoggerService::addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/addListener.md) &ndash; Registers a listener ($callable) for the given $channel(s).
- [LightLoggerService::setFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/setFormat.md) &ndash; Sets the format of the log messages passed to the listeners.
- [LightLoggerService::setUseExpandedArray](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/setUseExpandedArray.md) &ndash; Sets the useExpandedArray.
- [LightLoggerService::log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/log.md) &ndash; Sends a the log $message to the given $channel.
- [LightLoggerService::dispatch](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/dispatch.md) &ndash; 
- [LightLoggerService::trace](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/trace.md) &ndash; Dispatches a log message on the "trace" channel.
- [LightLoggerService::debug](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/debug.md) &ndash; Dispatches a log message on the "debug" channel.
- [LightLoggerService::notice](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/notice.md) &ndash; Dispatches a log message on the "notice" channel.
- [LightLoggerService::warn](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/warn.md) &ndash; Dispatches a log message on the "warn" channel.
- [LightLoggerService::error](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/error.md) &ndash; Dispatches a log message on the "error" channel.
- [LightLoggerService::fatal](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/fatal.md) &ndash; Dispatches a log message on the "fatal" channel.
- [LightLoggerService::getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService/getFormattedMessage.md) &ndash; Returns the formatted message to dispatch to the listeners.





Location
=============
Ling\Light_Logger\LightLoggerService<br>
See the source code of [Ling\Light_Logger\LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/LightLoggerService.php)



SeeAlso
==============
Next class: [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md)<br>
