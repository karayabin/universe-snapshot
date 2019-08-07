[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)


LightAjaxFileUploadManagerService::transformImage
================



LightAjaxFileUploadManagerService::transformImage — and stores it in dstPath.




Description
================


protected [LightAjaxFileUploadManagerService::transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md)(string $srcPath, string $dstPath, string $imageTransformer, string $fileName) : bool




Transforms the srcPath image according to the given imageTransformer,
and stores it in dstPath.
Returns whether the creation of the copy was successful.

In case of errors throws exceptions.




Parameters
================


- srcPath

    The path to a supposedly valid image.

- dstPath

    

- imageTransformer

    

- fileName

    This is given for enhancing the error messages only.


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxFileUploadManagerService::transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php#L507-L525)


See Also
================

The [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) class.

Previous method: [executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md)<br>Next method: [getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md)<br>

