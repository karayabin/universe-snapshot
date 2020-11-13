[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelper class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)


GemHelper::applyChunkValidation
================



GemHelper::applyChunkValidation — true if they all pass, or returns the error message returned by the first failing constraint otherwise.




Description
================


public [GemHelper::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyChunkValidation.md)(string $path) : true | string




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
See the source code for method [GemHelper::applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php#L190-L209)


See Also
================

The [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) class.

Previous method: [applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyValidation.md)<br>Next method: [applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyCopies.md)<br>

