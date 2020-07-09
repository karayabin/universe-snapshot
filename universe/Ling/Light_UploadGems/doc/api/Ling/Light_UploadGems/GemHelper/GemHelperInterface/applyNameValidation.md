[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperInterface class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)


GemHelperInterface::applyNameValidation
================



GemHelperInterface::applyNameValidation — true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Description
================


abstract public [GemHelperInterface::applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameValidation.md)(string $filename) : true | string




Applies the defined validation constraints to the given filename, and returns
true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Parameters
================


- filename

    


Return values
================

Returns true | string.








Source Code
===========
See the source code for method [GemHelperInterface::applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php#L62-L62)


See Also
================

The [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) class.

Previous method: [applyNameTransform](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameTransform.md)<br>Next method: [applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyChunkValidation.md)<br>

