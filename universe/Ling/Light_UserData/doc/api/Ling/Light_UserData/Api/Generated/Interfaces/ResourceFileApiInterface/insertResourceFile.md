[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceFileApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface.md)


ResourceFileApiInterface::insertResourceFile
================



ResourceFileApiInterface::insertResourceFile — Inserts the given resource file in the database.




Description
================


abstract public [ResourceFileApiInterface::insertResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/insertResourceFile.md)(array $resourceFile, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given resource file in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- resourceFile

    

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
See the source code for method [ResourceFileApiInterface::insertResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceFileApiInterface.php#L35-L35)


See Also
================

The [ResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface.md) class.

Next method: [insertResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/insertResourceFiles.md)<br>

