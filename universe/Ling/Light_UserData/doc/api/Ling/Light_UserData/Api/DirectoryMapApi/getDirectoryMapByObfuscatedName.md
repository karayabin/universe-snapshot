[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\DirectoryMapApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi.md)


DirectoryMapApi::getDirectoryMapByObfuscatedName
================



DirectoryMapApi::getDirectoryMapByObfuscatedName — Returns the directoryMap row identified by the given obfuscated_name.




Description
================


public [DirectoryMapApi::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getDirectoryMapByObfuscatedName.md)(string $obfuscated_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [DirectoryMapApi::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/Api/DirectoryMapApi.php#L62-L66)


See Also
================

The [DirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi.md) class.

Previous method: [insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/insertDirectoryMap.md)<br>Next method: [updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/updateDirectoryMapByObfuscatedName.md)<br>

