[Back to the Ling/Light_ErrorHandler api](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler.md)



The LightLoggerErrorHandlerListener class
================
2020-06-01 --> 2021-05-31






Introduction
============

The LightLoggerErrorHandlerListener class.



Class synopsis
==============


class <span class="pl-k">LightLoggerErrorHandlerListener</span> extends [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected string [LightFileLoggerListener::$file](#property-file) ;
    - protected bool [LightFileLoggerListener::$isFileRotationEnabled](#property-isFileRotationEnabled) ;
    - protected string [LightFileLoggerListener::$maxFileSize](#property-maxFileSize) ;
    - protected string|null [LightFileLoggerListener::$rotatedFileExtension](#property-rotatedFileExtension) ;
    - protected bool [LightFileLoggerListener::$zipRotatedFiles](#property-zipRotatedFiles) ;
    - protected array [LightFileLoggerListener::$channel2Formatting](#property-channel2Formatting) ;
    - protected string [BaseLoggerListener::$format](#property-format) ;
    - protected bool [BaseLoggerListener::$expandArray](#property-expandArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [listen](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/listen.md)($msg, string $channel) : void

- Inherited methods
    - public LightFileLoggerListener::configure(array $options) : void
    - protected LightFileLoggerListener::getFileFormat(string $filePath) : string
    - protected BaseLoggerListener::getFormattedMessage(string $channel, $msg) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-file"><b>file</b></span>

    This property holds the path to the log file.
    This class will attempt to create it if it does not exist.
    
    

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

- [LightLoggerErrorHandlerListener::__construct](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/__construct.md) &ndash; Builds the LightFileLoggerListener instance.
- [LightLoggerErrorHandlerListener::setContainer](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/setContainer.md) &ndash; Sets the container.
- [LightLoggerErrorHandlerListener::listen](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener/listen.md) &ndash; and possibly rotates the file when the file size gets too big.
- LightFileLoggerListener::configure &ndash; Configures this instance.
- LightFileLoggerListener::getFileFormat &ndash; Returns the file format of the rotated file.
- BaseLoggerListener::getFormattedMessage &ndash; Returns the formatted message to dispatch to the listeners.





Location
=============
Ling\Light_ErrorHandler\Light_Logger\LightLoggerErrorHandlerListener<br>
See the source code of [Ling\Light_ErrorHandler\Light_Logger\LightLoggerErrorHandlerListener](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/Light_Logger/LightLoggerErrorHandlerListener.php)



SeeAlso
==============
Next class: [LightErrorHandlerService](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService.md)<br>
