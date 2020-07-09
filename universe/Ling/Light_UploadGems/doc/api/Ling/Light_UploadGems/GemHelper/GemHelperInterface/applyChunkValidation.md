[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperInterface class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)


GemHelperInterface::applyChunkValidation
================



GemHelperInterface::applyChunkValidation — true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Description
================


abstract public [GemHelperInterface::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyChunkValidation.md)(string $path) : true | string




Applies the defined validation constraints to the chunk which path is given, and returns
true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Parameters
================


- path

    The absolute path to the chunk to validate.


Return values
================

Returns true | string.








Source Code
===========
See the source code for method [GemHelperInterface::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php#L75-L75)


See Also
================

The [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) class.

Previous method: [applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameValidation.md)<br>Next method: [applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyValidation.md)<br>

