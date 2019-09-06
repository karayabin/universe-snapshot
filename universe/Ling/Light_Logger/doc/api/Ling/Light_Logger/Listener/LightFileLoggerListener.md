[Back to the Ling/Light_Logger api](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger.md)



The LightFileLoggerListener class
================
2019-08-01 --> 2019-08-30






Introduction
============

The LightFileLoggerListener class is a simple logger listener which writes the log messages to a specified file.

When the file size get bigger than a certain threshold, the file is rotated (copied to an archive file,
and the original file is emptied so that we can log new messages into it again).

Note: the rotation system is optional and active by default with a default size of 2M.
Also, the rotation system by default zips all archives (rotated files).
This behaviour can be changed by using the configure method.

About the rotation system:
the rotation routine is executed after the message is written, which means the maxFileSize is not a strict limit,
but rather an indication AFTER WHICH the FileLoggerListener performs the rotation.
For instance, if your limit threshold is 2 Mb, your log file weights 1999 Kb and your message weights 3 Kb,
then the archive after the message is written will weight 2002 Kb (i.e. not 2000 Kb).




Rotated file format:
---------------------

The format of a rotated file is the following:
     <fileName>-<dateTime> (.<extension>)?  (.zip)?

With:
- fileName: the file name
- dateTime: the datetime (for instance 2019-08-01__08-40-14)
- extension: the extension of the rotated file, defined by the $rotatedFileExtension property.
         The default value is "log".
         Empty value is also accepted (note: this is independent of the zip extension being added after)


Note that if the file is zipped (see zipRotatedFiles property),
the ".zip" extension is being added at the end of this file format.



Class synopsis
==============


class <span class="pl-k">LightFileLoggerListener</span> implements [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md) {

- Properties
    - protected string [$file](#property-file) ;
    - protected bool [$isFileRotationEnabled](#property-isFileRotationEnabled) ;
    - protected string [$maxFileSize](#property-maxFileSize) ;
    - protected string|null [$rotatedFileExtension](#property-rotatedFileExtension) ;
    - protected bool [$zipRotatedFiles](#property-zipRotatedFiles) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/__construct.md)() : void
    - public [configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/configure.md)(array $options) : void
    - public [listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/listen.md)(string $msg, string $channel) : void
    - protected [getFileFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/getFileFormat.md)() : string

}




Properties
=============

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
    
    



Methods
==============

- [LightFileLoggerListener::__construct](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/__construct.md) &ndash; Builds the LightFileLoggerListener instance.
- [LightFileLoggerListener::configure](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/configure.md) &ndash; Configures this instance.
- [LightFileLoggerListener::listen](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/listen.md) &ndash; and possibly rotates the file when the file size gets too big.
- [LightFileLoggerListener::getFileFormat](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightFileLoggerListener/getFileFormat.md) &ndash; Returns the file format of the rotated file.


Examples
==========

Example 1: simple LightFileLoggerListener example
--------------


```php

$fileListener = new LightFileLoggerListener();
$fileListener->configure([
    "file" => __DIR__ . "/log/maurice.log",
    "isFileRotationEnabled" => true,
    "maxFileSize" => '7000',
    "zipRotatedFiles" => true,
    "rotatedFileExtension" => 'pom',
]);

$logger = new LightLoggerService();
$logger->addListener("debug", $fileListener);
$logger->debug("This is a debug message");
```





Location
=============
Ling\Light_Logger\Listener\LightFileLoggerListener<br>
See the source code of [Ling\Light_Logger\Listener\LightFileLoggerListener](https://github.com/lingtalfi/Light_Logger/blob/master/Listener/LightFileLoggerListener.php)



SeeAlso
==============
Previous class: [LightLoggerService](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/LightLoggerService.md)<br>Next class: [LightLoggerListenerInterface](https://github.com/lingtalfi/Light_Logger/blob/master/doc/api/Ling/Light_Logger/Listener/LightLoggerListenerInterface.md)<br>
