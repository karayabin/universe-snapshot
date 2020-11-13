[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::createCopy
================



LightUserDataVirtualFileSystemOld::createCopy — Creates a copy of the file which source and dest are given, on the virtual server, and returns the resolved relative path (i.e.




Description
================


private [LightUserDataVirtualFileSystemOld::createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/createCopy.md)(string $relativePath, string $userRelPath, ?string $fileSrc = null, ?array $options = []) : void




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
See the source code for method [LightUserDataVirtualFileSystemOld::createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L570-L587)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [getUpdateInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getUpdateInfoByResourceId.md)<br>Next method: [resolveFilePath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/resolveFilePath.md)<br>

