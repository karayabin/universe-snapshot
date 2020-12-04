[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)<br>
[Back to the Ling\Light_Mailer\Service\LightMailerService class](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md)


LightMailerService::sendMessage
================



LightMailerService::sendMessage — Sends the given message, using the given mailer, and returns the number of emails sent.




Description
================


protected [LightMailerService::sendMessage](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/sendMessage.md)(Swift_Mailer $mailer, Swift_Message $message, $recipientList, string $templateId, ?array $options = []) : int




Sends the given message, using the given mailer, and returns the number of emails sent.

If an error occurs, the behaviour is defined by the throwEx option.


Available options are:


- throwEx: bool=false. Whether to throw an exception if the sending fails.




Parameters
================


- mailer

    

- message

    

- recipientList

    

- templateId

    

- options

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [LightMailerService::sendMessage](https://github.com/lingtalfi/Light_Mailer/blob/master/Service/LightMailerService.php#L374-L427)


See Also
================

The [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md) class.

Previous method: [debugLog](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/debugLog.md)<br>Next method: [getTemplateContent](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTemplateContent.md)<br>

