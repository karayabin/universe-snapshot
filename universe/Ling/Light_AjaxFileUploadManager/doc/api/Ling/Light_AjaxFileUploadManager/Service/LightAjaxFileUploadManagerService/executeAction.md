[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)


LightAjaxFileUploadManagerService::executeAction
================



LightAjaxFileUploadManagerService::executeAction — and returns an array of successful information in case of success.




Description
================


protected [LightAjaxFileUploadManagerService::executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/executeAction.md)(array $action, $phpFileItem, array $params, string $confItemId) : array | null




Executes the action array on the file which path is given,
and returns an array of successful information in case of success.

Usually, the returned array contains the url (absolute, relative or even starting with http:// or https://),
but it depends on the configuration of the given action.

In case of failure, this method throws an exception.


The action array is defined in more details in the [action list](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) page.




Parameters
================


- action

    

- phpFileItem

    A valid php $_FILES item.

- params

    

- confItemId

    The action id. This is used for debugging purposes.


Return values
================

Returns array | null.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxFileUploadManagerService::executeAction](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php#L521-L684)


See Also
================

The [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) class.

Previous method: [validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)<br>Next method: [extractFunctionInfo](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/extractFunctionInfo.md)<br>

