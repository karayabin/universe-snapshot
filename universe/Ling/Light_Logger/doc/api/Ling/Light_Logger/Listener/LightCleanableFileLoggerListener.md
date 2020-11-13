[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The LightCleanableFileLoggerListener class
================
2019-08-01 --> 2020-11-06






Introduction
============

The LightCleanableFileLoggerListener class.


The idea behind this class is that you can clean the log at any moment (meaning emptying the log file).

In order to do so, set the message of the log to --clean-- (this is a special string that signals
the logger to clean the current file).



Class synopsis
==============


class <span class="pl-k">LightCleanableFileLoggerListener</span> extends [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected string [$file](#property-file) ;

- Inherited properties
    - protected bool [LightFileLoggerListener::$isFileRotationEnabled](#property-isFileRotationEnabled) ;
    - protected string [LightFileLoggerListener::$maxFileSize](#property-maxFileSize) ;
    - protected string|null [LightFileLoggerListener::$rotatedFileExtension](#property-rotatedFileExtension) ;
    - protected bool [LightFileLoggerListener::$zipRotatedFiles](#property-zipRotatedFiles) ;
    - protected array [LightFileLoggerListener::$channel2Formatting](#property-channel2Formatting) ;
    - protected string [BaseLoggerListener::$format](#property-format) ;
    - protected bool [BaseLoggerListener::$expandArray](#property-expandArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/__construct.md)() : void
    - public [setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/setFile.md)(string $file) : void
    - public [configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/configure.md)(array $options) : void
    - public [listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/listen.md)($msg, string $channel) : void

- Inherited methods
    - protected [LightFileLoggerListener::getFileFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/getFileFormat.md)(string $filePath) : string
    - protected [BaseLoggerListener::getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md)(string $channel, $msg) : string

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file for this instance.
    
    

- <span id="property-isFileRotationEnabled"><b>isFileRotationEnabled</b></span>

    This property holds whether the file rotation system should be used.
    
    

- <span id="property-maxFileSize"><b>maxFileSize</b></span>

    This property holds the maximum file size beyond which the rotation is triggered (only if the rotation
    system is active).
    
    The default value is 2M.
    
    The syntax allowed here is defined in the [Bat\ConvertTool::convertHumanSizeToBytes](https://github.com/lingtalfi/Bat/blob/master/ConvertTool.md#converthumansizetobytes) method.
    
    

- <span id="property-rotatedFileExtension"><b>rotatedFileExtension</b></span>

    This property holds the file extension of the rotated files.
             The default value is "log".
             If set to null or an empty string, then the extension will not be appended to the log file.
    
    

- <span id="property-zipRotatedFiles"><b>zipRotatedFiles</b></span>

    This property holds whether the rotated files should be zipped.
    If true, then the rotated files are zipped.
    
    

- <span id="property-channel2Formatting"><b>channel2Formatting</b></span>

    This property holds the channel2Formatting for this instance.
    Array of channel to [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) formatting
    
    

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

- [LightCleanableFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/__construct.md) &ndash; Builds the LightCleanableFileLoggerListener instance.
- [LightCleanableFileLoggerListener::setFile](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/setFile.md) &ndash; Sets the file.
- [LightCleanableFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/configure.md) &ndash; Configures this instance.
- [LightCleanableFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightCleanableFileLoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [LightFileLoggerListener::getFileFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/getFileFormat.md) &ndash; Returns the file format of the rotated file.
- [BaseLoggerListener::getFormattedMessage](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener/getFormattedMessage.md) &ndash; Returns the formatted message to dispatch to the listeners.





Location
=============
Ling\Light_Logger\Listener\LightCleanableFileLoggerListener<br>
See the source code of [Ling\Light_Logger\Listener\LightCleanableFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/LightCleanableFileLoggerListener.php)



SeeAlso
==============
Previous class: [BaseLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/BaseLoggerListener.md)<br>Next class: [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md)<br>
