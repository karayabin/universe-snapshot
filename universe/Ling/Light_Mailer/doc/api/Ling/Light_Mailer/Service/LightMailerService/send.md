[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)<br>
[Back to the Ling\Light_Mailer\Service\LightMailerService class](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md)


LightMailerService::send
================



LightMailerService::send — Sends the email which template id was given to the recipientList, and returns the number of successful emails sent, (including bcc and cc recipients if defined).




Description
================


public [LightMailerService::send](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/send.md)(string $templateId, $recipientList, ?array $options = []) : int




Sends the email which template id was given to the recipientList, and returns the number of successful emails sent, (including bcc and cc recipients if defined).

Note: if the dryTrace option is set to true, the message won't be sent.


The recipient list must be one of the following:

- plain string, string: a valid email address
- array: array of items, each of which can be either:
     - a valid email address
     - an array:
         - 0: a valid email address
         - 1: the name (if you want to personalize the email address)

     For more info, see the [syntax for addresses](https://swiftmailer.symfony.com/docs/messages.html#adding-recipients-to-your-message) in the swift documentation.



Available options are:

- transportId: string = "default", the id of the transport item to use
- senderId: string = "default", the id of the sender item to use
- senderFrom: string, to override the "sender.from" property on the fly (see the conception notes for more details)
- vars: array of variables to apply identically to every recipient in the list
- recipientVars: array of recipientEmailAddress => variables (array of key => value) to apply to this specific recipient
     This is only available in batch mode (i.e. when batch=true).
- subject: string=null, to override the subject on the fly
- batch: bool=true, whether to send a mail separately with their own address in the "To:" field.
     If false, then all the recipient list will show up in the "To:" field.
     For more info, see the [swift mailer documentation](https://swiftmailer.symfony.com/docs/sending.html#sending-emails-in-batch)
- attachedFiles: an array of items, each of which can be either:
     - path, string: the absolute path to the file to add
     - fileInfo, array: detailed information about the file to add, it has the following entries:
         - path, string, the file absolute path. You should specify either the path or the content, but not both.
         - content, string, the content of the file. You should specify either the path or the content, but not both.
         - fileName, string=null, the file name.
         - mimeType, string=null, the mime type.
         - isInline, bool=false, whether to make the attachment appear inline (if supported by the mail client).

         All properties are optional, except for the path/content which must be provided.

- embeddedFiles: an array of referenceId => items, each of which can be either:
     - path, string: the absolute path to the file to embed
     - fileInfo, array: detailed information about the file to embed, it has the following entries:
         - path, string, the file absolute path. You should specify either the path or the content, but not both.
         - content, string, the content of the file. You should specify either the path or the content, but not both.
         - fileName, string=null, the file name.
         - mimeType, string=null, the mime type.

         All properties are optional, except for the path/content which must be provided.

     The referenceId becomes available as a tag that you can use like a normal variable (see the vars property).
     Note: make sure your variable names don't conflict with your reference ids (otherwise results are unpredictable).



- bcc: an extra recipient list (i.e. same format), but those recipients receive a copy of the message without anybody else knowing it
- cc: an extra recipient list (i.e. same format), but those recipients are visible in the message headers and will be seen by the other recipients
- dryTrace: bool = false.
     If true, this method will print the trace of the first message on the screen and not send the message.
     This is useful for debug purposes.
- errMode: string=exc.
     Available error modes are:
     - exc: throws an exception if something goes wrong
     - log: catches the exception if something goes wrong, and send it to the log.
         This uses the Light_Logger service under the hood, with a channel of "error".
         See the [error logging convention](https://github.com/lingtalfi/TheBar/blob/master/discussions/error-logging-convention.md) document for more info.



See more details in the [Light_Mailer conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md).


Note: if the subject is not set (whether in the template or in the option), then an error will be thrown (and the email
won't be sent).




Parameters
================


- templateId

    

- recipientList

    

- options

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [LightMailerService::send](https://github.com/lingtalfi/Light_Mailer/blob/master/Service/LightMailerService.php#L260-L329)


See Also
================

The [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md) class.

Previous method: [registerTemplatePartsDirectory](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/registerTemplatePartsDirectory.md)<br>Next method: [debugLog](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/debugLog.md)<br>

