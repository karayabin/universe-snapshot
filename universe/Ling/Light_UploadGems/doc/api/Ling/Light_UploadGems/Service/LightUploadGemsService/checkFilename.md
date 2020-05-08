[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\Service\LightUploadGemsService class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService.md)


LightUploadGemsService::checkFilename
================



LightUploadGemsService::checkFilename — Checks whether the given filename is valid (i.e.




Description
================


public [LightUploadGemsService::checkFilename](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkFilename.md)(string $filename) : void




Checks whether the given filename is valid (i.e. no "../" or "./" in it), and throws an exception if that's the case.




Parameters
================


- filename

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUploadGemsService::checkFilename](https://github.com/lingtalfi/Light_UploadGems/blob/master/Service/LightUploadGemsService.php#L130-L139)


See Also
================

The [LightUploadGemsService](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService.md) class.

Previous method: [checkPhpFile](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/Service/LightUploadGemsService/checkPhpFile.md)<br>

