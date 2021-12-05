[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The LightLoggerService class
================
2019-08-01 --> 2021-08-05






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
    - private [Ling\Light_Logger\Service\?LightServiceContainerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/?LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$listeners](#property-listeners) ;
    - private array [$openListeners](#property-openListeners) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/setContainer.md)(Ling\Light\ServiceContainer\LightServiceContainerInterface $container) : void
    - public [addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/addListener.md)($channel, $listener, ?array $minus = []) : void
    - public [log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/log.md)($message, string $channel) : void
    - protected [dispatch](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/dispatch.md)(string $channel, $msg) : void
    - public [trace](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/trace.md)($msg) : void
    - public [debug](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/debug.md)($msg) : void
    - public [notice](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/notice.md)($msg) : void
    - public [warn](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/warn.md)($msg) : void
    - public [error](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/error.md)($msg) : void
    - public [fatal](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/fatal.md)($msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-listeners"><b>listeners</b></span>

    This property holds the listeners.
    It's an array of channel name => listeners.
    A listener can be either a callable or a LightLoggerListenerInterface instance.
    
    

- <span id="property-openListeners"><b>openListeners</b></span>

    This property holds the listeners registered with the open registration system.
    
    



Methods
==============

- [LightLoggerService::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/__construct.md) &ndash; Builds the LightLoggerService instance.
- [LightLoggerService::setContainer](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/setContainer.md) &ndash; Sets the container.
- [LightLoggerService::addListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/addListener.md) &ndash; Registers a listener (callable) for the given $channel(s).
- [LightLoggerService::log](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/log.md) &ndash; Sends a the log $message to the given $channel.
- [LightLoggerService::dispatch](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/dispatch.md) &ndash; 
- [LightLoggerService::trace](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/trace.md) &ndash; Dispatches a log message on the "trace" channel.
- [LightLoggerService::debug](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/debug.md) &ndash; Dispatches a log message on the "debug" channel.
- [LightLoggerService::notice](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/notice.md) &ndash; Dispatches a log message on the "notice" channel.
- [LightLoggerService::warn](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/warn.md) &ndash; Dispatches a log message on the "warn" channel.
- [LightLoggerService::error](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/error.md) &ndash; Dispatches a log message on the "error" channel.
- [LightLoggerService::fatal](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Service/LightLoggerService/fatal.md) &ndash; Dispatches a log message on the "fatal" channel.





Location
=============
Ling\Light_Logger\Service\LightLoggerService<br>
See the source code of [Ling\Light_Logger\Service\LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/Service/LightLoggerService.php)



SeeAlso
==============
Previous class: [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md)<br>
