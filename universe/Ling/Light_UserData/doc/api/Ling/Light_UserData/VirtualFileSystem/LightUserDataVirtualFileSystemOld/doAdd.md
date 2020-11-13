[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\VirtualFileSystem\LightUserDataVirtualFileSystemOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md)


LightUserDataVirtualFileSystemOld::doAdd
================



LightUserDataVirtualFileSystemOld::doAdd — Like the add method, but with extra options.




Description
================


private [LightUserDataVirtualFileSystemOld::doAdd](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/doAdd.md)(array $params, ?array $options = []) : string




Like the add method, but with extra options.

Available options are:
- resourceId: the resourceId to use. If not specified, one will be generated automatically.
- section: string=to_add, the name of the section to update.
- dry: bool=false. If true, the file variations will not be created, but the paths in the commit file will be updated (and point to non existing files).




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
See the source code for method [LightUserDataVirtualFileSystemOld::doAdd](https://github.com/lingtalfi/Light_UserData/blob/master/VirtualFileSystem/LightUserDataVirtualFileSystemOld.php#L268-L357)


See Also
================

The [LightUserDataVirtualFileSystemOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld.md) class.

Previous method: [add](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/add.md)<br>Next method: [update](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/VirtualFileSystem/LightUserDataVirtualFileSystemOld/update.md)<br>

