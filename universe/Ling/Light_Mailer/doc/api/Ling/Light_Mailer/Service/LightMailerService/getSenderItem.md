[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)<br>
[Back to the Ling\Light_Mailer\Service\LightMailerService class](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md)


LightMailerService::getSenderItem
================



LightMailerService::getSenderItem — Returns the sender item for the given id.




Description
================


private [LightMailerService::getSenderItem](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getSenderItem.md)(string $senderId) : [Swift_Transport](https://github.com/swiftmailer/swiftmailer/blob/master/lib/classes/Swift/Transport.php)




Returns the sender item for the given id.

See the [multi-sender section of the conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md#multi-sender) for more details.




Parameters
================


- senderId

    


Return values
================

Returns [Swift_Transport](https://github.com/swiftmailer/swiftmailer/blob/master/lib/classes/Swift/Transport.php).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightMailerService::getSenderItem](https://github.com/lingtalfi/Light_Mailer/blob/master/Service/LightMailerService.php#L724-L733)


See Also
================

The [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md) class.

Previous method: [prepareMessageBody](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/prepareMessageBody.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/error.md)<br>

