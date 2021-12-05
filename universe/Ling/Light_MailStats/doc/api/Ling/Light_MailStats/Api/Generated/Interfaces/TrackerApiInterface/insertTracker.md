[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Interfaces\TrackerApiInterface class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md)


TrackerApiInterface::insertTracker
================



TrackerApiInterface::insertTracker — Inserts the given tracker in the database.




Description
================


abstract public [TrackerApiInterface::insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/insertTracker.md)(array $tracker, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given tracker in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- tracker

    

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
See the source code for method [TrackerApiInterface::insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/TrackerApiInterface.php#L35-L35)


See Also
================

The [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md) class.

Next method: [insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/insertTrackers.md)<br>

