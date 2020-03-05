[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\DirectoryMapApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi.md)


DirectoryMapApi::insertDirectoryMap
================



DirectoryMapApi::insertDirectoryMap — Inserts the given directoryMap in the database.




Description
================


public [DirectoryMapApi::insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/insertDirectoryMap.md)(array $directoryMap, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given directoryMap in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- directoryMap

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [DirectoryMapApi::insertDirectoryMap](https://github.com/lingtalfi/Light_UserData/blob/master/Api/DirectoryMapApi.php#L31-L68)


See Also
================

The [DirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/__construct.md)<br>Next method: [getDirectoryMapByObfuscatedName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/DirectoryMapApi/getDirectoryMapByObfuscatedName.md)<br>

