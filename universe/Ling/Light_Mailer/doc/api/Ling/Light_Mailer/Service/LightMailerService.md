[Back to the Ling/Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md)



The LightMailerService class
================
2020-06-29 --> 2020-12-08






Introduction
============

The LightMailerService class.



Class synopsis
==============


class <span class="pl-k">LightMailerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$transports](#property-transports) ;
    - protected array [$senders](#property-senders) ;
    - protected array [$options](#property-options) ;
    - protected string [$tagOpening](#property-tagOpening) ;
    - protected string [$tagClosing](#property-tagClosing) ;
    - protected array [$templatePartsAlias2Directories](#property-templatePartsAlias2Directories) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTransport](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setTransport.md)(string $id, array $transport) : void
    - public [setTransports](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setTransports.md)(array $transports) : void
    - public [setSender](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setSender.md)(string $id, array $sender) : void
    - public [setSenders](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setSenders.md)(array $senders) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setOptions.md)(array $options) : void
    - public [registerTemplatePartsDirectory](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/registerTemplatePartsDirectory.md)(string $alias, string $path) : void
    - public [send](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/send.md)(string $templateId, $recipientList, ?array $options = []) : int
    - protected [debugLog](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/debugLog.md)(string $msg) : void
    - protected [sendMessage](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/sendMessage.md)(Swift_Mailer $mailer, Swift_Message $message, $recipientList, string $templateId, ?array $options = []) : int
    - protected [getTemplateContent](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTemplateContent.md)(string $templateId) : array
    - protected [resolveTemplatePartsReferences](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/resolveTemplatePartsReferences.md)(string &$content, string $templateId) : void
    - protected [getTransport](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTransport.md)(string $transportId) : [Swift_Transport](https://github.com/swiftmailer/swiftmailer/blob/master/lib/classes/Swift/Transport.php)
    - private [getMailerRootDir](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getMailerRootDir.md)() : string
    - private [checkSubject](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/checkSubject.md)($subject, string $templateId) : void
    - private [prepareMessageBody](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/prepareMessageBody.md)(Swift_Message $message, string $templateId, array $options, ?string $address = null) : void
    - private [getSenderItem](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getSenderItem.md)(string $senderId) : [Swift_Transport](https://github.com/swiftmailer/swiftmailer/blob/master/lib/classes/Swift/Transport.php)
    - private [error](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-transports"><b>transports</b></span>

    This property holds the transports for this instance.
    It's an array of id => transport.
    See the multi-transports section in the [Light_Mailer conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-senders"><b>senders</b></span>

    This property holds the senders for this instance.
    It's an array of id => sender.
    See the multi-senders section in the [Light_Mailer conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    - useDebug: bool = false.
         If true, we send logs via the mailer.debug channel.
    
    See the [Light_Mailer conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-tagOpening"><b>tagOpening</b></span>

    This property holds the tagOpening for this instance.
    
    

- <span id="property-tagClosing"><b>tagClosing</b></span>

    This property holds the tagClosing for this instance.
    
    

- <span id="property-templatePartsAlias2Directories"><b>templatePartsAlias2Directories</b></span>

    This property holds the templatePartsAlias2Directories for this instance.
    
    



Methods
==============

- [LightMailerService::__construct](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/__construct.md) &ndash; Builds the LightMailerService instance.
- [LightMailerService::setContainer](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setContainer.md) &ndash; Sets the container.
- [LightMailerService::setTransport](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setTransport.md) &ndash; Sets a transport.
- [LightMailerService::setTransports](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setTransports.md) &ndash; Sets the transports.
- [LightMailerService::setSender](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setSender.md) &ndash; Sets a sender.
- [LightMailerService::setSenders](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setSenders.md) &ndash; Sets the senders.
- [LightMailerService::setOptions](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setOptions.md) &ndash; Sets the options.
- [LightMailerService::registerTemplatePartsDirectory](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/registerTemplatePartsDirectory.md) &ndash; Registers a template parts directory with the given $alias.
- [LightMailerService::send](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/send.md) &ndash; Sends the email which template id was given to the recipientList, and returns the number of successful emails sent, (including bcc and cc recipients if defined).
- [LightMailerService::debugLog](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/debugLog.md) &ndash; Sends a message to the log (if the useDebug option is true).
- [LightMailerService::sendMessage](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/sendMessage.md) &ndash; Sends the given message, using the given mailer, and returns the number of emails sent.
- [LightMailerService::getTemplateContent](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTemplateContent.md) &ndash; Returns the raw template content(s) corresponding to the given template id.
- [LightMailerService::resolveTemplatePartsReferences](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/resolveTemplatePartsReferences.md) &ndash; Resolves in place the template parts references from the given $content.
- [LightMailerService::getTransport](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getTransport.md) &ndash; Returns the transport for the given id.
- [LightMailerService::getMailerRootDir](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getMailerRootDir.md) &ndash; Returns the absolute path to the mailer root dir, which contains all the templates.
- [LightMailerService::checkSubject](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/checkSubject.md) &ndash; Check that the subject is set, and if not throws an exception.
- [LightMailerService::prepareMessageBody](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/prepareMessageBody.md) &ndash; Prepares the message.
- [LightMailerService::getSenderItem](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/getSenderItem.md) &ndash; Returns the sender item for the given id.
- [LightMailerService::error](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Mailer\Service\LightMailerService<br>
See the source code of [Ling\Light_Mailer\Service\LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/Service/LightMailerService.php)



SeeAlso
==============
Previous class: [LightMailerException](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Exception/LightMailerException.md)<br>
