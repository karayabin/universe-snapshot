[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataAjaxHandler class
================
2019-09-27 --> 2021-03-05






Introduction
============

The LightUserDataAjaxHandler class.



Class synopsis
==============


class <span class="pl-k">LightUserDataAjaxHandler</span> extends [BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md) implements [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - protected [doHandle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/AjaxHandler/LightUserDataAjaxHandler/doHandle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - private [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/AjaxHandler/LightUserDataAjaxHandler/error.md)(string $msg) : void

- Inherited methods
    - public BaseLightAjaxHandler::handle(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - public ContainerAwareLightAjaxHandler::__construct() : void
    - public ContainerAwareLightAjaxHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected ContainerAwareLightAjaxHandler::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightUserDataAjaxHandler::doHandle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/AjaxHandler/LightUserDataAjaxHandler/doHandle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- [LightUserDataAjaxHandler::error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/AjaxHandler/LightUserDataAjaxHandler/error.md) &ndash; Throws an error message.
- BaseLightAjaxHandler::handle &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- ContainerAwareLightAjaxHandler::getContainer &ndash; Returns the container instance.





Location
=============
Ling\Light_UserData\AjaxHandler\LightUserDataAjaxHandler<br>
See the source code of [Ling\Light_UserData\AjaxHandler\LightUserDataAjaxHandler](https://github.com/lingtalfi/Light_UserData/blob/master/AjaxHandler/LightUserDataAjaxHandler.php)



SeeAlso
==============
Next class: [CustomLightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomLightUserDataBaseApi.md)<br>
