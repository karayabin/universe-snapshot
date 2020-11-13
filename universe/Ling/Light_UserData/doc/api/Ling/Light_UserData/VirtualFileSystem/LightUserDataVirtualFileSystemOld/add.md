[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::add
================



LightUserDataVirtualFileSystemOld::add — Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.




Description
================


public [LightUserDataVirtualFileSystemOld::add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/add.md)(array $params) : string




Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.

Params are:
- src_path: the absolute path of the source file to add.
- user_rel_path: the base relative path, relative to the user dir, as provided by the user.
     This is used as a suggestion while processing the "files" property.
- tags: array of tag names to attach to the source file
- is_private: bool, whether the source file is considered private
- files: array, where to really put the file and related. It can use the filename as a reference/helper.
     See the ["Upload file configuration" section of the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
- keep_original: bool=false. Whether to keep the original. This will work only with images. The source file will be used
     as the source of the copy.




See the [source file section of our conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-source-file) for more details
about the source file.




Parameters
================


- params

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystemOld::add](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L248-L251)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/getCurrentCapacity.md)<br>Next method: [doAdd](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/doAdd.md)<br>

