[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistAjaxHandler class
================
2019-08-12 --> 2021-03-05






Introduction
============

The LightRealistAjaxHandler class.



Class synopsis
==============


class <span class="pl-k">LightRealistAjaxHandler</span> extends [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - protected [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/error.md)(string $msg) : void
    - protected [prepareTags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/prepareTags.md)(array $tags) : array

- Inherited methods
    - public ContainerAwareLightAjaxHandler::__construct() : void
    - public ContainerAwareLightAjaxHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected ContainerAwareLightAjaxHandler::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightRealistAjaxHandler::handle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/handle.md) &ndash; Process the given parameters, and returns the appropriate response.
- [LightRealistAjaxHandler::error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/error.md) &ndash; Throws an error message.
- [LightRealistAjaxHandler::prepareTags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/prepareTags.md) &ndash; Returns the tags in the format expected by the LightRealistService->executeRequestById method.
- ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- ContainerAwareLightAjaxHandler::getContainer &ndash; Returns the container instance.





Location
=============
Ling\Light_Realist\AjaxHandler\LightRealistAjaxHandler<br>
See the source code of [Ling\Light_Realist\AjaxHandler\LightRealistAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/AjaxHandler/LightRealistAjaxHandler.php)



SeeAlso
==============
Previous class: [LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md)<br>Next class: [DeveloperVariableProviderInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DeveloperVariableProvider/DeveloperVariableProviderInterface.md)<br>
