[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistAjaxServiceController class
================
2019-08-12 --> 2019-09-05






Introduction
============

The LightRealistAjaxServiceController class.



Class synopsis
==============


class <span class="pl-k">LightRealistAjaxServiceController</span> extends [LightController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [handleJsonRequest](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Controller/LightRealistAjaxServiceController/handleJsonRequest.md)() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Controller/LightRealistAjaxServiceController/error.md)(string $msg) : void
    - protected [prepareTags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Controller/LightRealistAjaxServiceController/prepareTags.md)(array $tags) : array

- Inherited methods
    - public LightController::__construct() : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightRealistAjaxServiceController::handleJsonRequest](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Controller/LightRealistAjaxServiceController/handleJsonRequest.md) &ndash; and returns the appropriate response.
- [LightRealistAjaxServiceController::error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Controller/LightRealistAjaxServiceController/error.md) &ndash; Throws an error message.
- [LightRealistAjaxServiceController::prepareTags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Controller/LightRealistAjaxServiceController/prepareTags.md) &ndash; Returns the tags in the format expected by the LightRealistService->executeRequestById method.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.





Location
=============
Ling\Light_Realist\Controller\LightRealistAjaxServiceController<br>
See the source code of [Ling\Light_Realist\Controller\LightRealistAjaxServiceController](https://github.com/lingtalfi/Light_Realist/blob/master/Controller/LightRealistAjaxServiceController.php)



SeeAlso
==============
Previous class: [LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md)<br>Next class: [LightRealistException](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Exception/LightRealistException.md)<br>
