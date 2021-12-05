[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserRatesItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md)


UserRatesItemApiInterface::insertUserRatesItems
================



UserRatesItemApiInterface::insertUserRatesItems — Inserts the given user rates item rows in the database.




Description
================


abstract public [UserRatesItemApiInterface::insertUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/insertUserRatesItems.md)(array $userRatesItems, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given user rates item rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userRatesItems

    

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
See the source code for method [UserRatesItemApiInterface::insertUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserRatesItemApiInterface.php#L57-L57)


See Also
================

The [UserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md) class.

Previous method: [insertUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/insertUserRatesItem.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/fetchAll.md)<br>

