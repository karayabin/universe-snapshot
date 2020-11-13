[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataDirectFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler.md)


LightUserDataDirectFileManagerHandler::storeUserFile
================



LightUserDataDirectFileManagerHandler::storeUserFile — Stores the file described in the given params, and returns the corresponding resourceId.




Description
================


protected [LightUserDataDirectFileManagerHandler::storeUserFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/storeUserFile.md)(array $params) : string




Stores the file described in the given params, and returns the corresponding resourceId.
The file will be stored on the real server, both on the file system and in the database.

Parameters are:

- ?resource_identifier: string.
     If null, it's an "add" operation.
     If set, it's an "update" operation.
- src_path: string|null, the absolute path of the source file.
     If null, it means the user hasn't provided a file (i.e. he just wants to update the meta data).
- user_rel_path: string, the relative path where the user wants to store the file.
     It's relative to the user dir.
     This is used as a suggestion while processing the "files" property.
     This is also the expression which we extract the "Upload file" tags from (i.e. NOT the tags property below).
     See the ["Upload file configuration" section of the user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md#upload-file-configuration) for more info about "upload file" tags.
- tags: array of tag names to attach to the source file
- is_private: bool, whether the source file is considered private
- files: array of file items.
     See the files property of the ["Upload file configuration" section in the user-data-file-manager.md document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md) for more details.
- keep_original: bool=false. Whether to keep the original. This will work only with images. The source file will be used
     as the source of the copy.
- canonical_name: string|null. The canonical name of this resource. It's used with the "add" operation only.




Parameters
================


- params

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightUserDataDirectFileManagerHandler::storeUserFile](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataDirectFileManagerHandler.php#L334-L378)


See Also
================

The [LightUserDataDirectFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler.md) class.

Previous method: [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/handle.md)<br>Next method: [resolveFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler/resolveFileItems.md)<br>

