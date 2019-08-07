[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)


LightAjaxFileUploadManagerService::executeAction
================



LightAjaxFileUploadManagerService::executeAction — if the path is the chosen one (isReturnedPath=true), or null otherwise.




Description
================


protected [LightAjaxFileUploadManagerService::executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md)(array $action, array $phpFileItem, string $actionId) : string | null




Executes the action array on the file which path is given,
and returns either the url (absolute, relative or even starting with http:// or https://)
if the path is the chosen one (isReturnedPath=true), or null otherwise.

The action array is defined in more details in the [action list](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) page.




Parameters
================


- action

    

- phpFileItem

    A valid php $_FILES item.

- actionId

    The action id. This is used for debugging purposes.


Return values
================

Returns string | null.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxFileUploadManagerService::executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php#L347-L486)


See Also
================

The [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) class.

Previous method: [validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)<br>Next method: [transformImage](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/transformImage.md)<br>

