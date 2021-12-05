[Back to the Ling/Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md)



The Light404LoggerListener class
================
2019-12-12 --> 2021-06-28






Introduction
============

The Light404LoggerListener class.
See more details in the [Light_404Logger conception notes](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/pages/conception-notes.md).



Class synopsis
==============


class <span class="pl-k">Light404LoggerListener</span> extends [LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener.md) implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected array [$keepOnlyIf](#property-keepOnlyIf) ;
    - protected array [$excludeIf](#property-excludeIf) ;
    - protected string [$httpRequestFormat](#property-httpRequestFormat) ;

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
    - public [__construct](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/__construct.md)() : void
    - public [configure](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/configure.md)(array $options) : void
    - public [listen](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/listen.md)($msg, string $channel) : void
    - protected [executeFilters](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/executeFilters.md)(Ling\Light\Http\HttpRequestInterface $request) : bool
    - protected [formatHttpRequestMessage](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/formatHttpRequestMessage.md)(Ling\Light\Http\HttpRequestInterface $request) : string

- Inherited methods
    - protected LightFileLoggerListener::getFileFormat(string $filePath) : string
    - protected BaseLoggerListener::getFormattedMessage(string $channel, $msg) : string

}




Properties
=============

- <span id="property-keepOnlyIf"><b>keepOnlyIf</b></span>

    This property holds the keepOnlyIf for this instance.
    
    

- <span id="property-excludeIf"><b>excludeIf</b></span>

    This property holds the excludeIf for this instance.
    
    

- <span id="property-httpRequestFormat"><b>httpRequestFormat</b></span>

    This property holds the httpRequestFormat for this instance.
    
    

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

- [Light404LoggerListener::__construct](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/__construct.md) &ndash; Builds the Light404LoggerListener instance.
- [Light404LoggerListener::configure](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/configure.md) &ndash; Configures this instance.
- [Light404LoggerListener::listen](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/listen.md) &ndash; Reacts to the given logger message in a specific way.
- [Light404LoggerListener::executeFilters](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/executeFilters.md) &ndash; whether the given http request passes the filters or is discarded.
- [Light404LoggerListener::formatHttpRequestMessage](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Logger/Light404LoggerListener/formatHttpRequestMessage.md) &ndash; Formats the given http request according to the configuration.
- LightFileLoggerListener::getFileFormat &ndash; Returns the file format of the rotated file.
- BaseLoggerListener::getFormattedMessage &ndash; Returns the formatted message to dispatch to the listeners.





Location
=============
Ling\Light_404Logger\Logger\Light404LoggerListener<br>
See the source code of [Ling\Light_404Logger\Logger\Light404LoggerListener](https://github.com/lingtalfi/Light_404Logger/blob/master/Logger/Light404LoggerListener.php)



SeeAlso
==============
Previous class: [Light404LoggerPlanetInstaller](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Light_PlanetInstaller/Light404LoggerPlanetInstaller.md)<br>Next class: [Light404LoggerService](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger/Service/Light404LoggerService.md)<br>
