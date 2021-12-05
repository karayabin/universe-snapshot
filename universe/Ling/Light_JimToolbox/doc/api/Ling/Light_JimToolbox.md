Ling/Light_JimToolbox
================
2021-07-08 --> 2021-07-27




Table of contents
===========

- [JimToolboxController](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Controller/JimToolboxController.md) &ndash; The LkaJimToolboxController class.
    - [JimToolboxController::render](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Controller/JimToolboxController/render.md) &ndash; Renders an [acp response](https://github.com/lingtalfi/AjaxCommunicationProtocol#the-ajax-communication-protocol) containing the pane body and title information.
    - LightController::__construct &ndash; Builds the LightController instance.
    - LightController::setLight &ndash; Sets the light instance.
- [LightJimToolboxException](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Exception/LightJimToolboxException.md) &ndash; The LightJimToolboxException class.
- [JimToolboxItemBaseHandler](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler.md) &ndash; The JimToolboxItemBaseHandler class.
    - [JimToolboxItemBaseHandler::__construct](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler/__construct.md) &ndash; Builds the JimToolboxItemBaseHandler instance.
    - [JimToolboxItemBaseHandler::setContainer](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler/setContainer.md) &ndash; Sets the light service container interface.
    - [JimToolboxItemHandlerInterface::getPaneBody](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneBody.md) &ndash; Returns the pane body.
    - [JimToolboxItemHandlerInterface::getPaneTitle](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneTitle.md) &ndash; Returns the title or the pane.
- [JimToolboxItemHandlerInterface](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md) &ndash; The JimToolboxItemHandler interface.
    - [JimToolboxItemHandlerInterface::getPaneBody](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneBody.md) &ndash; Returns the pane body.
    - [JimToolboxItemHandlerInterface::getPaneTitle](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneTitle.md) &ndash; Returns the title or the pane.
- [LightJimToolboxService](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService.md) &ndash; The LightJimToolboxService class.
    - [LightJimToolboxService::__construct](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/__construct.md) &ndash; Builds the LightJimToolboxService instance.
    - [LightJimToolboxService::setContainer](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setContainer.md) &ndash; Sets the container.
    - [LightJimToolboxService::setOptions](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setOptions.md) &ndash; Sets the options.
    - [LightJimToolboxService::getOption](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getOption.md) &ndash; Returns the option value corresponding to the given key.
    - [LightJimToolboxService::getJimToolboxItems](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItems.md) &ndash; Returns the array of jim toolbox items.
    - [LightJimToolboxService::getTemplatePath](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getTemplatePath.md) &ndash; Returns the location of our default template.
    - [LightJimToolboxService::getTemplateFlavours](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getTemplateFlavours.md) &ndash; Returns an array of the template names (to use with the getTemplatePath method) available to the user.
    - [LightJimToolboxService::getJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItem.md) &ndash; Returns the information about the jimtoolbox item identified by the given key, or false otherwise.
    - [LightJimToolboxService::registerJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/registerJimToolboxItem.md) &ndash; Registers a jim toolbox item.
    - [LightJimToolboxService::unregisterJimToolboxItem](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/unregisterJimToolboxItem.md) &ndash; Unregisters a jim toolbox item, and returns whether the given key was actually registered.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [JimToolbox](https://github.com/lingtalfi/JimToolbox)
- [Light](https://github.com/lingtalfi/Light)
- [Light_ControllerHub](https://github.com/lingtalfi/Light_ControllerHub)
- [Light_ReverseRouter](https://github.com/lingtalfi/Light_ReverseRouter)
- [UrlSmuggler](https://github.com/lingtalfi/UrlSmuggler)


