[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Interfaces\StatsApiInterface class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md)


StatsApiInterface::insertStats
================



StatsApiInterface::insertStats — Inserts the given stats in the database.




Description
================


abstract public [StatsApiInterface::insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStats.md)(array $stats, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given stats in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- stats

    

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
See the source code for method [StatsApiInterface::insertStats](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/StatsApiInterface.php#L35-L35)


See Also
================

The [StatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface.md) class.

Next method: [insertStatses](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/StatsApiInterface/insertStatses.md)<br>

