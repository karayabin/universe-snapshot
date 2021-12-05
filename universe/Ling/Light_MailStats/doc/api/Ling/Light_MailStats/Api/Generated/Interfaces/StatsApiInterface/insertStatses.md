[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Interfaces\StatsApiInterface class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md)


StatsApiInterface::insertStatses
================



StatsApiInterface::insertStatses — Inserts the given stats rows in the database.




Description
================


abstract public [StatsApiInterface::insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStatses.md)(array $statses, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given stats rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- statses

    

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
See the source code for method [StatsApiInterface::insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/StatsApiInterface.php#L57-L57)


See Also
================

The [StatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md) class.

Previous method: [insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStats.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/fetchAll.md)<br>

