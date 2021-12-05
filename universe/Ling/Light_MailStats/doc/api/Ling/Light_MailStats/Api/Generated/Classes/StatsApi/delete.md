[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Classes\StatsApi class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi.md)


StatsApi::delete
================



StatsApi::delete — Deletes the stats rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [StatsApi::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the stats rows matching the given where conditions, and returns the number of deleted rows.
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
See the source code for method [StatsApi::delete](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Classes/StatsApi.php#L277-L281)


See Also
================

The [StatsApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi.md) class.

Previous method: [updateStats](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/updateStats.md)<br>Next method: [deleteStatsById](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Classes/StatsApi/deleteStatsById.md)<br>

