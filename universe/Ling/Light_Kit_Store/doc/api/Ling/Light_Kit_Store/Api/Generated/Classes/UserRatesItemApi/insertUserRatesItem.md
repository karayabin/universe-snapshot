[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserRatesItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi.md)


UserRatesItemApi::insertUserRatesItem
================



UserRatesItemApi::insertUserRatesItem — Inserts the given user rates item in the database.




Description
================


public [UserRatesItemApi::insertUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi/insertUserRatesItem.md)(array $userRatesItem, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given user rates item in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userRatesItem

    

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
See the source code for method [UserRatesItemApi::insertUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserRatesItemApi.php#L43-L94)


See Also
================

The [UserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi/__construct.md)<br>Next method: [insertUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi/insertUserRatesItems.md)<br>

