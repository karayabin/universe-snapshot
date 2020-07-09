[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)<br>
[Back to the Ling\Light_Mailer\Service\LightMailerService class](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md)


LightMailerService::getTemplateContent
================



LightMailerService::getTemplateContent — Returns the raw template content(s) corresponding to the given template id.




Description
================


protected [LightMailerService::getTemplateContent](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTemplateContent.md)(string $templateId) : array




Returns the raw template content(s) corresponding to the given template id.
The return is an array containing:

0: html, string|null: the html content (or null if not defined)
1: plain, string: the plain content (always defined)
2: subject string|null, the subject of the email (or null if not defined)


Security warning: for now we trust the templateId provider, which means you can use path escalation
to call unexpected files out of the mailer root dir.


Note: raw means no variable is interpreted yet.




Parameters
================


- templateId

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightMailerService::getTemplateContent](https://github.com/lingtalfi/Light_Mailer/blob/master/Service/LightMailerService.php#L378-L415)


See Also
================

The [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md) class.

Previous method: [sendMessage](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/sendMessage.md)<br>Next method: [getTransport](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTransport.md)<br>

