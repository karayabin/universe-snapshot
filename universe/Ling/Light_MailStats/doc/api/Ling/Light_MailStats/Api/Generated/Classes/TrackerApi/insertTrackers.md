[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Classes\TrackerApi class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi.md)


TrackerApi::insertTrackers
================



TrackerApi::insertTrackers — Inserts the given tracker rows in the database.




Description
================


public [TrackerApi::insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/insertTrackers.md)(array $trackers, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given tracker rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- trackers

    

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
See the source code for method [TrackerApi::insertTrackers](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Classes/TrackerApi.php#L98-L109)


See Also
================

The [TrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi.md) class.

Previous method: [insertTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/insertTracker.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/TrackerApi/fetchAll.md)<br>

