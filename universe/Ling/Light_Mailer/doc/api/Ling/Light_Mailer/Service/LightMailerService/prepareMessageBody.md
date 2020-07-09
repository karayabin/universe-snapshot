[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)<br>
[Back to the Ling\Light_Mailer\Service\LightMailerService class](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md)


LightMailerService::prepareMessageBody
================



LightMailerService::prepareMessageBody — Prepares the message.




Description
================


private [LightMailerService::prepareMessageBody](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/prepareMessageBody.md)(Swift_Message $message, string $templateId, array $options, ?string $address = null) : void




Prepares the message.

Available options are explained in the send method comments:

- bcc
- cc
- senderFrom
- senderId
- attachedFiles
- embeddedFiles



The address parameter is only required if you're sending mail in batch mode.
It's used to get the recipientSpecific variables.




Parameters
================


- message

    

- templateId

    

- options

    

- address

    


Return values
================

Returns void.


Exceptions thrown
================

- [ArrayVariableResolverException](https://github.com/lingtalfi/ArrayVariableResolver/blob/master/doc/api/Ling/ArrayVariableResolver/Exception/ArrayVariableResolverException.md).&nbsp;







Source Code
===========
See the source code for method [LightMailerService::prepareMessageBody](https://github.com/lingtalfi/Light_Mailer/blob/master/Service/LightMailerService.php#L524-L686)


See Also
================

The [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md) class.

Previous method: [checkSubject](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/checkSubject.md)<br>Next method: [getSenderItem](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getSenderItem.md)<br>

