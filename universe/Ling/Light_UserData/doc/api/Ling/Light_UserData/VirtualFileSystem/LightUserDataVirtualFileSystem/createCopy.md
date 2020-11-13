[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::createCopy
================



LightUserDataVirtualFileSystem::createCopy — Creates a copy of the file which source and dest are given, on the virtual server, and returns the resolved relative path (i.e.




Description
================


private [LightUserDataVirtualFileSystem::createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/createCopy.md)(string $relativePath, string $userRelPath, ?string $fileSrc = null, ?array $options = []) : void




Creates a copy of the file which source and dest are given, on the virtual server, and returns the resolved relative path (i.e. after the tags have been injected into it).



The userRelPath variable is the relative path suggested by the user.
We will extract tags from it, and replace those tags in the given relativePath.
The extracted tags are defined in [the "upload file configuration" section of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration).


Available options are:
- imageTransformer: string=null, defines how to transform the image.
     See the [Light_UploadGems planet documentation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/pages/conception-notes.md) for more info.
- dry: bool=false, if true, the concrete file will not be created/copied.




Parameters
================


- relativePath

    

- userRelPath

    

- fileSrc

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L473-L490)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getSourceFileInfoByResourceId.md)<br>Next method: [resolveFilePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/resolveFilePath.md)<br>

