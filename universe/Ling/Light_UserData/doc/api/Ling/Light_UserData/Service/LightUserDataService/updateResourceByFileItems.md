[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::updateResourceByFileItems
================



LightUserDataService::updateResourceByFileItems — Updates the resource (in the database) which identifier is given, and which is described by the given fileItems.




Description
================


public [LightUserDataService::updateResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/updateResourceByFileItems.md)(string $resourceIdentifier, array $fileItems, ?array $options = []) : void




Updates the resource (in the database) which identifier is given, and which is described by the given fileItems.


Note: the file items path must be already resolved.

Available options are:
- tags: array of tags to attach to the resource.
- is_private: bool=false. Whether the resource is private or public.
- ?source_path: string. The path to the new file.
     If defined, this file will replace the old ones on the filesystem, and the db info is updated.
     If not defined, we just update the db info and (potentially) rename the old files on the filesystem.
- keep_original: bool=false, whether to create an original copy for this file.


See the [files property of the upload file section of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more details about the fileItems.




Parameters
================


- resourceIdentifier

    

- fileItems

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataService::updateResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L884-L1078)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [createResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileItems.md)<br>Next method: [getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md)<br>

