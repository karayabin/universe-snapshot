[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::createResourceByFileItems
================



LightUserDataService::createResourceByFileItems — Creates the resource described by the given fileItems in the database, and returns an info array.




Description
================


public [LightUserDataService::createResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileItems.md)(array $fileItems, ?array $options = []) : void




Creates the resource described by the given fileItems in the database, and returns an info array.
The info array contains the following:

- resource_identifier: string, the resource identifier of the created resource.


Note: the file items path must be already resolved.

Available options are:
- tags: array of tags to attach to the resource.
- is_private: bool=false. Whether the resource is private or public.
- source_path: string, path to the binary file to add.
- keep_original: bool=false, whether to create an original copy for this file.
- canonical_name: string|null, the canonical name of this resource.
- user_id: int|null, the id of the user owning the resource. If null, the current user id will be used.



See the [files property of the upload file section](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more details about the fileItems.




Parameters
================


- fileItems

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataService::createResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L766-L859)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [createResourceByFileContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileContent.md)<br>Next method: [updateResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateResourceByFileItems.md)<br>

