[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperTool class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperTool.md)


GemHelperTool::transformImage
================



GemHelperTool::transformImage — Transforms the srcPath image according to the given imageTransformer, and stores it in dstPath.




Description
================


public static [GemHelperTool::transformImage](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperTool/transformImage.md)(string $srcPath, string $dstPath, string $imageTransformer) : bool




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
See the source code for method [GemHelperTool::transformImage](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperTool.php#L61-L89)


See Also
================

The [GemHelperTool](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperTool.md) class.

Previous method: [extractFunctionInfo](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperTool/extractFunctionInfo.md)<br>

