[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md)


LightUserDataVirtualFileSystem::add
================



LightUserDataVirtualFileSystem::add — Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.




Description
================


public [LightUserDataVirtualFileSystem::add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/add.md)(array $params) : string




Adds a file to the virtual server, updates the commit file accordingly, and returns the resourceId.

Params are the same as the storeEntry method, with the following differences:
- src_path: is mandatory (i.e. not null)




Parameters
================


- params

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightUserDataVirtualFileSystem::add](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystem.php#L211-L214)


See Also
================

The [LightUserDataVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem.md) class.

Previous method: [getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/getCurrentCapacity.md)<br>Next method: [storeEntry](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystem/storeEntry.md)<br>

