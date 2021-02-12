[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::createFileItems
================



LightUserDataService::createFileItems — Creates the given file items on the real server, using the given sourcePath as the source.




Description
================


private [LightUserDataService::createFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createFileItems.md)(string $sourcePath, array $fileItems, ?array $options = []) : void




Creates the given file items on the real server, using the given sourcePath as the source.
See the files property of [the upload file configuration of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more details.

Available options are:
- original: bool=false. Whether to create an original copy of the source file.
     See the [source file section of our Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-source-file) for more details about the source file.
     See the [original image section of our Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#original-image) for more details about the "original" concept.




Parameters
================


- sourcePath

    

- fileItems

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataService::createFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L1232-L1255)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [storeTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/storeTagsByResourceId.md)<br>Next method: [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/error.md)<br>

