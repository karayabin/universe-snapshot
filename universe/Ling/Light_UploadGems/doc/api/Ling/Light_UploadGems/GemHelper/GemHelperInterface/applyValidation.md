[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperInterface class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)


GemHelperInterface::applyValidation
================



GemHelperInterface::applyValidation — true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Description
================


abstract public [GemHelperInterface::applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyValidation.md)(string $path) : true | string




Applies the defined validation constraints to the file which path is given, and returns
true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Parameters
================


- path

    The absolute path to the file to validate.


Return values
================

Returns true | string.








Source Code
===========
See the source code for method [GemHelperInterface::applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php#L75-L75)


See Also
================

The [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) class.

Previous method: [applyNameValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyNameValidation.md)<br>Next method: [applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyCopies.md)<br>

