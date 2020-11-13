[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::hasResource
================



LightUserDataVirtualFileSystemOld::hasResource — Returns whether this contains the resource identified by the given id.




Description
================


public [LightUserDataVirtualFileSystemOld::hasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/hasResource.md)(string $resourceId, ?array $options = []) : bool




Returns whether this contains the resource identified by the given id.

Available options are:

- useAdd: bool=true, whether to look in the to_add section
- useUpdate: bool=true, whether to look in the to_update section

See more details in the [user data file manager document](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/user-data-file-manager.md).




Parameters
================


- resourceId

    

- options

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystemOld::hasResource](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L120-L137)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/setContainer.md)<br>Next method: [removeResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/removeResourceById.md)<br>

