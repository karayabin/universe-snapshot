[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)


LightAjaxFileUploadManagerService::validatePhpFileItem
================



LightAjaxFileUploadManagerService::validatePhpFileItem — and return a boolean result.




Description
================


protected [LightAjaxFileUploadManagerService::validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)(string $validationRuleName, $parameter, array $phpFileItem, ?string &$errorMessage = null) : bool




Check whether the given phpFileItem is valid according to the given rule name and parameter,
and return a boolean result.
If the file item is not valid, the error message is set to explain the cause of the validation problem.




Parameters
================


- validationRuleName

    

- parameter

    

- phpFileItem

    A valid php $_FILES item.

- errorMessage

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxFileUploadManagerService::validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php#L435-L495)


See Also
================

The [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) class.

Previous method: [getTransformedName](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/getTransformedName.md)<br>Next method: [executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md)<br>

