[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::getSourceFileInfoByResourceId
================



LightUserDataVirtualFileSystem::getSourceFileInfoByResourceId — Returns an array of information about the source file identified by the given resource id.




Description
================


public [LightUserDataVirtualFileSystem::getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getSourceFileInfoByResourceId.md)(string $resourceId, ?array $options = []) : array




Returns an array of information about the source file identified by the given resource id.
The array contains the following information:

- directory: string, relative directory path (relative to the user directory) of the source file.
- name: string, [filename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) of the source file.
- url: string, the url of the source file.
- is_private: bool, whether the source file is private.
- tags: array of tags used by the resource containing the source file.
- original_url: string|null, the url pointing to the original image if any, or null if non applicable.
- abs_path: string, absolute path to the source file.


Available options are:
- original: bool=false. Whether to use the original image of the given resourceId.




Parameters
================


- resourceId

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L433-L444)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/update.md)<br>Next method: [createCopy](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/createCopy.md)<br>

