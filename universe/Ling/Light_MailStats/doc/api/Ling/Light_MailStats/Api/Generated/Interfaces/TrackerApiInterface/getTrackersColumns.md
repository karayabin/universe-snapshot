[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)<br>
[Back to the Ling\Light_MailStats\Api\Generated\Interfaces\TrackerApiInterface class](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md)


TrackerApiInterface::getTrackersColumns
================



TrackerApiInterface::getTrackersColumns — Returns a subset of the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [TrackerApiInterface::getTrackersColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the tracker rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TrackerApiInterface::getTrackersColumns](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/Interfaces/TrackerApiInterface.php#L159-L159)


See Also
================

The [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md) class.

Previous method: [getTrackersColumn](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersColumn.md)<br>Next method: [getTrackersKey2Value](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface/getTrackersKey2Value.md)<br>

