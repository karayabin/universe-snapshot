[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\TemporaryVirtualFileSystem\LightUserDataTemporaryVirtualFileSystem class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md)


LightUserDataTemporaryVirtualFileSystem::commit
================



LightUserDataTemporaryVirtualFileSystem::commit — Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.




Description
================


public [LightUserDataTemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/commit.md)(string $contextId, ?array $options = []) : array




Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
See the [TemporaryVirtualFileSystem conception notes](https://github.com/lingtalfi/TemporaryVirtualFileSystem/blob/master/doc/pages/conception-notes.md) for more details.

By default, it also resets the context directory (i.e. remove the directory and its content).
This behaviour can be changed with the options:

- reset: bool=true




Parameters
================


- contextId

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightUserDataTemporaryVirtualFileSystem::commit](https://github.com/lingtalfi/Light_UserData/blob/master/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.php#L66-L112)


See Also
================

The [LightUserDataTemporaryVirtualFileSystem](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/setContainer.md)<br>Next method: [getCurrentCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/TemporaryVirtualFileSystem/LightUserDataTemporaryVirtualFileSystem/getCurrentCapacity.md)<br>

