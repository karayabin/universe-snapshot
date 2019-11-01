[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\DataExtractor\NotificationsDataExtractor class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/NotificationsDataExtractor.md)


NotificationsDataExtractor::extractNewest
================



NotificationsDataExtractor::extractNewest — Extracts n new messages and format them for the header of the zeroadmin theme.




Description
================


public [NotificationsDataExtractor::extractNewest](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/NotificationsDataExtractor/extractNewest.md)(?int $limit = 5) : mixed




Extracts n new messages and format them for the header of the zeroadmin theme.
It returns an array with the following elements:


- nbMessages: int, the number of messages
- list: the list of elements, each of which being an array which looks like this:

         - route: "/pages/u-issue-tracker",
         - icon: "fas fa-envelope fa-fw",
         - text: "You have 10 messages",
         - datetime: "2019-07-11 10:43:00"




Parameters
================


- limit

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [NotificationsDataExtractor::extractNewest](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/DataExtractor/NotificationsDataExtractor.php#L31-L51)


See Also
================

The [NotificationsDataExtractor](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/NotificationsDataExtractor.md) class.



