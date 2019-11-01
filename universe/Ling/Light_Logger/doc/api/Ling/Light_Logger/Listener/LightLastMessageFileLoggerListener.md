[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The LightLastMessageFileLoggerListener class
================
2019-08-01 --> 2019-10-17






Introduction
============

The LightLastMessageFileLoggerListener class.

This class just writes the last message to a file.
The file is re-written entirely every time, so that the file
just contains the last message, which is sometimes easier to read than a long list of logs.



Class synopsis
==============


class <span class="pl-k">LightLastMessageFileLoggerListener</span> implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected string [$file](#property-file) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/setFile.md)(string $file) : void
    - public [listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/listen.md)(string $msg, string $channel) : void

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file for this instance.
    
    



Methods
==============

- [LightLastMessageFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/__construct.md) &ndash; Builds the LightLastMessageFileLoggerListener instance.
- [LightLastMessageFileLoggerListener::setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/setFile.md) &ndash; Sets the file.
- [LightLastMessageFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLastMessageFileLoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.





Location
=============
Ling\Light_Logger\Listener\LightLastMessageFileLoggerListener<br>
See the source code of [Ling\Light_Logger\Listener\LightLastMessageFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/LightLastMessageFileLoggerListener.php)



SeeAlso
==============
Previous class: [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md)<br>Next class: [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md)<br>
