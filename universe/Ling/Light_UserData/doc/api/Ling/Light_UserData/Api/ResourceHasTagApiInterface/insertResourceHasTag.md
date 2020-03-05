[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\ResourceHasTagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceHasTagApiInterface.md)


ResourceHasTagApiInterface::insertResourceHasTag
================



ResourceHasTagApiInterface::insertResourceHasTag — Inserts the given resourceHasTag in the database.




Description
================


abstract public [ResourceHasTagApiInterface::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceHasTagApiInterface/insertResourceHasTag.md)(array $resourceHasTag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given resourceHasTag in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- resourceHasTag

    

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
See the source code for method [ResourceHasTagApiInterface::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/Api/ResourceHasTagApiInterface.php#L34-L34)


See Also
================

The [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceHasTagApiInterface.md) class.

Next method: [getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceHasTagApiInterface/getResourceHasTagByResourceIdAndTagId.md)<br>

