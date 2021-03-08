[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The LightLastMessageFileLoggerListener class
================
2019-08-01 --> 2021-03-05






Introduction
============

The LightLastMessageFileLoggerListener class.

This class just writes the last message to a file.
The file is re-written entirely every time, so that the file
just contains the last message, which is sometimes easier to read than a long list of logs.



Class synopsis
==============


class <span class="pl-k">LightLastMessageFileLoggerListener</span> extends [BaseLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener.md) implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected string [$file](#property-file) ;

- Inherited properties
    - protected string [BaseLoggerListener::$format](#property-format) ;
    - protected bool [BaseLoggerListener::$expandArray](#property-expandArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/setFile.md)(string $file) : void
    - public [configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/configure.md)(array $options) : void
    - public [listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/listen.md)($msg, string $channel) : void

- Inherited methods
    - protected [BaseLoggerListener::getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md)(string $channel, $msg) : string

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file for this instance.
    
    

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

- [LightLastMessageFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/__construct.md) &ndash; Builds the LightLastMessageFileLoggerListener instance.
- [LightLastMessageFileLoggerListener::setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/setFile.md) &ndash; Sets the file.
- [LightLastMessageFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/configure.md) &ndash; Configures this instance.
- [LightLastMessageFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [BaseLoggerListener::getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md) &ndash; Returns the formatted message to dispatch to the listeners.





Location
=============
Ling\Light_Logger\Listener\LightLastMessageFileLoggerListener<br>
See the source code of [Ling\Light_Logger\Listener\LightLastMessageFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/LightLastMessageFileLoggerListener.php)



SeeAlso
==============
Previous class: [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md)<br>Next class: [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md)<br>
