[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The BaseLoggerListener class
================
2019-08-01 --> 2020-11-30






Introduction
============

The BaseLoggerListener class.



Class synopsis
==============


abstract class <span class="pl-k">BaseLoggerListener</span> implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected string [$format](#property-format) ;
    - protected bool [$expandArray](#property-expandArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/__construct.md)() : void
    - public [configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/configure.md)(array $options) : void
    - protected [getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md)(string $channel, $msg) : string

- Inherited methods
    - abstract public [LightLoggerListenerInterface::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface/listen.md)($msg, string $channel) : void

}




Properties
=============

- <span id="property-format"><b>format</b></span>

    This property holds the format used by this class to transform the emitter message into the actual logger message.
    
    
    The following tags are available:
    
    - {channel}: the channel in uppercase
    - {dateTime}: the date time string (for instance: 2019-01-16 16:33:15)
    - {message}: the emitter (original) message
    
    

- <span id="property-expandArray"><b>expandArray</b></span>

    This property holds whether to use expand the array (multi-line) or not (single line).
    Default is true (as it's more readable).
    
    



Methods
==============

- [BaseLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/__construct.md) &ndash; Builds the BaseLoggerListener instance.
- [BaseLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/configure.md) &ndash; Configures this instance.
- [BaseLoggerListener::getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md) &ndash; Returns the formatted message to dispatch to the listeners.
- [LightLoggerListenerInterface::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface/listen.md) &ndash; Reacts to the given logger message in a specific way.





Location
=============
Ling\Light_Logger\Listener\BaseLoggerListener<br>
See the source code of [Ling\Light_Logger\Listener\BaseLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/BaseLoggerListener.php)



SeeAlso
==============
Previous class: [LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService.md)<br>Next class: [LightCleanableFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener.md)<br>
