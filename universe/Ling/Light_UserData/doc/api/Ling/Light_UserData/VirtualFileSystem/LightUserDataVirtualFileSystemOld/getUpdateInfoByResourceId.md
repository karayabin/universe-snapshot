[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::getUpdateInfoByResourceId
================



LightUserDataVirtualFileSystemOld::getUpdateInfoByResourceId — Returns information about the to_update resource identified by the given resource id.




Description
================


public [LightUserDataVirtualFileSystemOld::getUpdateInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getUpdateInfoByResourceId.md)(string $resourceId) : array




Returns information about the to_update resource identified by the given resource id.
The returned array contains the following:

- directory: string, relative directory path (relative to the user directory) of the source file.
- name: string, [filename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) of the source file.
- url: string, the url of the source file.
- is_private: bool, whether the source file is private.
- tags: array of tags used by the resource containing the source file.
- original_url: string|null, the url pointing to the original image if any, or null if non applicable.
- abs_path: string, absolute path to the source file.




Parameters
================


- resourceId

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystemOld::getUpdateInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L541-L544)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getSourceFileInfoByResourceId.md)<br>Next method: [createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/createCopy.md)<br>

