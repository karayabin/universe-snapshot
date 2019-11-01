[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\DataExtractor\MessagesDataExtractor class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/MessagesDataExtractor.md)


MessagesDataExtractor::extractNewest
================



MessagesDataExtractor::extractNewest — Extracts n new messages and format them for the header of the zeroadmin theme.




Description
================


public [MessagesDataExtractor::extractNewest](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/MessagesDataExtractor/extractNewest.md)(?int $limit = 5) : mixed




Extracts n new messages and format them for the header of the zeroadmin theme.
It returns an array with the following elements:


- nbMessages: int, the number of messages
- list: the list of elements, each of which being an array which looks like this:

     - thumb_src: "/plugins/LightKitAdmin/zeroadmin/img/avatars/photo-1.jpg",
     - sender: "Shankar Madrid",
     - recipient: "Athena Morris",
     - datetime: "2019-05-31 07:55:00",
     - text: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quo?",
     - route: "/pages/u-profile"




Parameters
================


- limit

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [MessagesDataExtractor::extractNewest](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/DataExtractor/MessagesDataExtractor.php#L33-L45)


See Also
================

The [MessagesDataExtractor](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/MessagesDataExtractor.md) class.



