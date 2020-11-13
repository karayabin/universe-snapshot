[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelper class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)


GemHelper::transformImage
================



GemHelper::transformImage — Transforms the srcPath image according to the given imageTransformer, and stores it in dstPath.




Description
================


public [GemHelper::transformImage](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/transformImage.md)(string $srcPath, string $dstPath, string $imageTransformer) : bool




Transforms the srcPath image according to the given imageTransformer, and stores it in dstPath.
Returns whether the creation of the copy was successful.

In case of errors throws exceptions.




Parameters
================


- srcPath

    The path to a supposedly valid image.

- dstPath

    

- imageTransformer

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [GemHelper::transformImage](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php#L435-L463)


See Also
================

The [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) class.

Previous method: [getCustomConfigValue](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfigValue.md)<br>Next method: [executeNameValidationRule](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/executeNameValidationRule.md)<br>

