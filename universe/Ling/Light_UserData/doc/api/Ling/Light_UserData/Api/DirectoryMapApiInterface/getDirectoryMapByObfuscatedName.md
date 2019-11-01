[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\DirectoryMapApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface.md)


DirectoryMapApiInterface::getDirectoryMapByObfuscatedName
================



DirectoryMapApiInterface::getDirectoryMapByObfuscatedName — Returns the directoryMap row identified by the given obfuscated_name.




Description
================


abstract public [DirectoryMapApiInterface::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/getDirectoryMapByObfuscatedName.md)(string $obfuscated_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the directoryMap row identified by the given obfuscated_name.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- obfuscated_name

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [DirectoryMapApiInterface::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/Api/DirectoryMapApiInterface.php#L49-L49)


See Also
================

The [DirectoryMapApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface.md) class.

Previous method: [insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/insertDirectoryMap.md)<br>Next method: [updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/updateDirectoryMapByObfuscatedName.md)<br>

