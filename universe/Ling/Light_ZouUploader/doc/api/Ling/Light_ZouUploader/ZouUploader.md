[Back to the Ling/Light_ZouUploader api](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader.md)



The ZouUploader class
================
2020-04-14 --> 2020-12-08






Introduction
============

The ZouUploader class.



Class synopsis
==============


class <span class="pl-k">ZouUploader</span>  {

- Properties
    - protected string [$destinationPath](#property-destinationPath) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/__construct.md)() : void
    - public [setDestinationPath](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/setDestinationPath.md)(string $destinationPath) : void
    - public [setOptions](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/setOptions.md)(array $options) : void
    - public [isUploaded](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/isUploaded.md)(Ling\Light\Http\HttpRequestInterface $request) : bool
    - private [error](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-destinationPath"><b>destinationPath</b></span>

    The path where to put the uploaded file.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    - override: bool=false
         If the uploaded file is going to override an existing file, the operation is rejected by default.
         Set this to true to allow file overrides.
    - move: bool=true
         Whether to copy the uploaded file to the destination, or to move it.
         This is done at the end of the upload, when the file is fully uploaded.
         By default, when the file is moved. Set this to false to make a copy instead.
    
    



Methods
==============

- [ZouUploader::__construct](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/__construct.md) &ndash; Builds the ZouUploader instance.
- [ZouUploader::setDestinationPath](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/setDestinationPath.md) &ndash; Sets the destinationPath.
- [ZouUploader::setOptions](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/setOptions.md) &ndash; Sets the options.
- [ZouUploader::isUploaded](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/isUploaded.md) &ndash; the corresponding file is fully uploaded on the file system.
- [ZouUploader::error](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/ZouUploader/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_ZouUploader\ZouUploader<br>
See the source code of [Ling\Light_ZouUploader\ZouUploader](https://github.com/lingtalfi/Light_ZouUploader/blob/master/ZouUploader.php)



SeeAlso
==============
Previous class: [LightZouUploaderException](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader/Exception/LightZouUploaderException.md)<br>
