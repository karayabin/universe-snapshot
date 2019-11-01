[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)


LightAjaxFileUploadManagerService::uploadItem
================



LightAjaxFileUploadManagerService::uploadItem — and return the json array in the form of a php array.




Description
================


public [LightAjaxFileUploadManagerService::uploadItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/uploadItem.md)(string $id, array $phpFileItem, ?array $params = []) : array




This method implements step 1 and 2 of the [ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md)
and tries to upload the given phpFileItem to the backend server,
and return the json array in the form of a php array.

The phpFileItem is a regular php $_FILES item with the following structure:
- name
- type
- tmp_name
- error
- size


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








Source Code
===========
See the source code for method [LightAjaxFileUploadManagerService::uploadItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Service/LightAjaxFileUploadManagerService.php#L178-L302)


See Also
================

The [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md) class.

Previous method: [addConfigurationItemsByFile](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/addConfigurationItemsByFile.md)<br>Next method: [validatePhpFileItem](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService/validatePhpFileItem.md)<br>

