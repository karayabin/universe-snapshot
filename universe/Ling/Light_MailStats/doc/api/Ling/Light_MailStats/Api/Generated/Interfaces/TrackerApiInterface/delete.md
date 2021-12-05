[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Interfaces\TrackerApiInterface class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md)


TrackerApiInterface::delete
================



TrackerApiInterface::delete — Deletes the tracker rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [TrackerApiInterface::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the tracker rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [TrackerApiInterface::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/TrackerApiInterface.php#L232-L232)


See Also
================

The [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md) class.

Previous method: [updateTracker](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/updateTracker.md)<br>Next method: [deleteTrackerById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/deleteTrackerById.md)<br>

