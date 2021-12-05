Ling/Light_Mailer
================
2020-06-29 --> 2021-06-28




Table of contents
===========

- [LightMailerException](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Exception/LightMailerException.md) &ndash; The LightMailerException class.
- [LightMailerPlanetInstaller](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller.md) &ndash; The LightMailerPlanetInstaller class.
    - [LightMailerPlanetInstaller::init2](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightMailerPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Light_PlanetInstaller/LightMailerPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightMailerService](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService.md) &ndash; The LightMailerService class.
    - [LightMailerService::__construct](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/__construct.md) &ndash; Builds the LightMailerService instance.
    - [LightMailerService::setContainer](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setContainer.md) &ndash; Sets the container.
    - [LightMailerService::setTransport](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setTransport.md) &ndash; Sets a transport.
    - [LightMailerService::setTransports](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setTransports.md) &ndash; Sets the transports.
    - [LightMailerService::setSender](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setSender.md) &ndash; Sets a sender.
    - [LightMailerService::setSenders](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setSenders.md) &ndash; Sets the senders.
    - [LightMailerService::setOptions](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/setOptions.md) &ndash; Sets the options.
    - [LightMailerService::registerTemplatePartsDirectory](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/registerTemplatePartsDirectory.md) &ndash; Registers a template parts directory with the given $alias.
    - [LightMailerService::send](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer/Service/LightMailerService/send.md) &ndash; Sends the email which template id was given to the recipientList, and returns the number of successful emails sent, (including bcc and cc recipients if defined).


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [ArrayVariableResolver](https://github.com/lingtalfi/ArrayVariableResolver)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)


