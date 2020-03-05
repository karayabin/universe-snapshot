[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)


LightAjaxFileUploadManagerService::processItem
================



LightAjaxFileUploadManagerService::processItem — and return the json array in the form of a php array.




Description
================


public [LightAjaxFileUploadManagerService::processItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/processItem.md)(string $id, ?array $phpFileItem = null, ?array $params = []) : array




This method implements step 1 and 2 of the [ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md)
and tries to upload the given phpFileItem to the backend server,
and return the json array in the form of a php array.

The phpFileItem is either a regular php $_FILES item with the following structure:
- name
- type
- tmp_name
- error
- size
Or phpFileItem can be null, if it's not used by the action defined by the given id.


The id is the identifier of an [action list](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) to execute on the uploaded file.

The params array contains the following parameters (all of which are optional):
- csrf_token: string, the csrf token to match with


Note: if the service is poorly configured, it will return an error response with
a bad configuration error message.

The philosophy of this method is to catch all exceptions and convert them to an error message.
This means the regular way of creating an error from inside the method is to throw an exception.




Parameters
================


- id

    

- phpFileItem

    

- params

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxFileUploadManagerService::processItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php#L148-L289)


See Also
================

The [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) class.

Previous method: [addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md)<br>Next method: [validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)<br>

