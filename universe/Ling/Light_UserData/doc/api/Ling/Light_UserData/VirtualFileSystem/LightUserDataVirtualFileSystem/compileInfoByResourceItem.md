[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::compileInfoByResourceItem
================



LightUserDataVirtualFileSystem::compileInfoByResourceItem — Returns an array of information from the given resource item.




Description
================


private [LightUserDataVirtualFileSystem::compileInfoByResourceItem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/compileInfoByResourceItem.md)(string $resourceId, array $resourceItem, ?array $options = []) : array




Returns an array of information from the given resource item.
The information is described in the getSourceFileInfoByResourceId method's comment,
but all properties are optional and are returned only if found.

Also, the absolute path for a "default file", if it's not in changed by the user (and found on the vfs),
is the abs path from the real server.

Available options are:
- original: bool=false. Whether to return the original image in the absolute path.




Parameters
================


- resourceId

    

- resourceItem

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::compileInfoByResourceItem](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L731-L792)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [removeFileItemsFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/removeFileItemsFiles.md)<br>Next method: [getFilesDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getFilesDirectory.md)<br>

