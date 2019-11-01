[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The DirectoryMapApiInterface class
================
2019-09-27 --> 2019-10-31






Introduction
============

The DirectoryMapApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">DirectoryMapApiInterface</span>  {

- Methods
    - abstract public [insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/insertDirectoryMap.md)(array $directoryMap, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/getDirectoryMapByObfuscatedName.md)(string $obfuscated_name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/updateDirectoryMapByObfuscatedName.md)(string $obfuscated_name, array $directoryMap) : void
    - abstract public [deleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/deleteDirectoryMapByObfuscatedName.md)(string $obfuscated_name) : void

}






Methods
==============

- [DirectoryMapApiInterface::insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/insertDirectoryMap.md) &ndash; Inserts the given directoryMap in the database.
- [DirectoryMapApiInterface::getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/getDirectoryMapByObfuscatedName.md) &ndash; Returns the directoryMap row identified by the given obfuscated_name.
- [DirectoryMapApiInterface::updateDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/updateDirectoryMapByObfuscatedName.md) &ndash; Updates the directoryMap row identified by the given obfuscated_name.
- [DirectoryMapApiInterface::deleteDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApiInterface/deleteDirectoryMapByObfuscatedName.md) &ndash; Deletes the directoryMap identified by the given obfuscated_name.





Location
=============
Ling\Light_UserData\Api\DirectoryMapApiInterface<br>
See the source code of [Ling\Light_UserData\Api\DirectoryMapApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/DirectoryMapApiInterface.php)



SeeAlso
==============
Previous class: [DirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi.md)<br>Next class: [LightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataApiFactory.md)<br>
