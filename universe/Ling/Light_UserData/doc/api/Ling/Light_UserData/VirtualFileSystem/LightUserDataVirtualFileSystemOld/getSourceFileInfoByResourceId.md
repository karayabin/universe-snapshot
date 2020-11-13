[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::getSourceFileInfoByResourceId
================



LightUserDataVirtualFileSystemOld::getSourceFileInfoByResourceId — Returns an array of information about the source file identified by the given resource id.




Description
================


public [LightUserDataVirtualFileSystemOld::getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getSourceFileInfoByResourceId.md)(string $resourceId) : array




Returns an array of information about the source file identified by the given resource id.
The array contains the following information:

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
See the source code for method [LightUserDataVirtualFileSystemOld::getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L484-L522)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/update.md)<br>Next method: [getUpdateInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getUpdateInfoByResourceId.md)<br>

