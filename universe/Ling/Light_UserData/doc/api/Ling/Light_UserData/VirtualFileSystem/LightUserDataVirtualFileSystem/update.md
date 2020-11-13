[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::update
================



LightUserDataVirtualFileSystem::update — Updates the information of the virtual file identified by the given resourceId in the commit file.




Description
================


public [LightUserDataVirtualFileSystem::update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/update.md)(string $resourceId, array $params) : void




Updates the information of the virtual file identified by the given resourceId in the commit file.
If the file is also modified, it will update the file and all its variations in the virtual file system.


Params are:
- src_path: string|null. The absolute path of the source file to add.
     This is null when the user/client doesn't provide a file.

- user_rel_path: the base relative path, relative to the user dir, as provided by the user.
     This is used as a suggestion while processing the "files" property.
- tags: array of tag names to attach to the source file
- is_private: bool, whether the source file is considered private
- files: array, where to really put the file and related. It can use the filename as a reference/helper.
     See the ["Upload file configuration" section of the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
- keep_original: bool=false. Whether to keep the given file as the (new) original. This will work only with images. The source file will be used
     as the source of the copy.




Parameters
================


- resourceId

    

- params

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::update](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L370-L409)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [storeEntry](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/storeEntry.md)<br>Next method: [getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getSourceFileInfoByResourceId.md)<br>

