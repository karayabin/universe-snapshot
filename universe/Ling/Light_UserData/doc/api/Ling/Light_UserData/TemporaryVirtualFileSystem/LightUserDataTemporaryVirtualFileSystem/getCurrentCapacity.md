[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)


LightUserDataTemporaryVirtualFileSystem::getCurrentCapacity
================



LightUserDataTemporaryVirtualFileSystem::getCurrentCapacity — Returns the size in bytes of all the files contained in the given context directory.




Description
================


public [LightUserDataTemporaryVirtualFileSystem::getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getCurrentCapacity.md)(string $contextId, ?array $options = []) : int




Returns the size in bytes of all the files contained in the given context directory.

This includes the original files if any by default.




Parameters
================


- contextId

    

- options

    - add: bool=false.
     If true, will only return the size of the files referenced by the add operations.


Return values
================

Returns int.








Source Code
===========
See the source code for method [LightUserDataTemporaryVirtualFileSystem::getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.php#L129-L170)


See Also
================

The [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md) class.

Previous method: [commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/commit.md)<br>Next method: [getFileId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getFileId.md)<br>

