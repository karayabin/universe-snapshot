[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::storeEntry
================



LightUserDataVirtualFileSystem::storeEntry — Stores an entry in the commit file, either in the to_add section or the to_update section, depending on the given params and options.




Description
================


private [LightUserDataVirtualFileSystem::storeEntry](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/storeEntry.md)(array $params, ?array $options = []) : string




Stores an entry in the commit file, either in the to_add section or the to_update section, depending on the given params and options.

The params are:
- src_path: string|null, the absolute path of the source file to store,  or null if you don't need to store a file.
- user_rel_path: string, the base relative path, relative to the user dir, as provided by the user.
     This is used as a suggestion while processing the "files" property.
     This is also the expression which we extract the "Upload file" tags from (i.e. NOT the tags property below).
     See the ["Upload file configuration" section of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more info about "upload file" tags.
- tags: array of tag names to attach to the source file
- is_private: bool, whether the source file is considered private
- files: array, where to really put the file and related. It can use the filename as a reference/helper.
     See the ["Upload file configuration" section of the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
- keep_original: bool=false. Whether to keep the original. This will work only with images. The source file will be used
     as the source of the copy.




Available options are:
- resourceId: the resourceId to use. If not specified, one will be generated automatically.
- section: string=to_add, the name of the section to update. It can be one of:
     - to_add
     - to_update
- dry: bool=false. If true, the file variations will not be created, but the paths in the commit file will be updated (and point to non existing files).



See the [source file section of our conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-source-file) for more details
about the source file.




Parameters
================


- params

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::storeEntry](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L254-L344)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/add.md)<br>Next method: [update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/update.md)<br>

