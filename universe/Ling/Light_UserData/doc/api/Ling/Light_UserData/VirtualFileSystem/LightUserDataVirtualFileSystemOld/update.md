[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::update
================



LightUserDataVirtualFileSystemOld::update — Updates the information of the virtual file identified by the given resourceIdentifier in the commit file.




Description
================


public [LightUserDataVirtualFileSystemOld::update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/update.md)(string $resourceIdentifier, array $params) : void




Updates the information of the virtual file identified by the given resourceIdentifier in the commit file.
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


- resourceIdentifier

    

- params

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystemOld::update](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L383-L465)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [doAdd](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/doAdd.md)<br>Next method: [getSourceFileInfoByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getSourceFileInfoByResourceId.md)<br>

