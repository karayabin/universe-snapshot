[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md)


ResourceApiInterface::insertResource
================



ResourceApiInterface::insertResource — Inserts the given resource in the database.




Description
================


abstract public [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given resource in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- resource

    

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
See the source code for method [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceApiInterface.php#L34-L34)


See Also
================

The [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) class.

Next method: [getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md)<br>

