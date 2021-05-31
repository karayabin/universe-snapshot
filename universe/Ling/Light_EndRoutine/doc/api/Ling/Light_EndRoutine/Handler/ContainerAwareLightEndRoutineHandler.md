[Back to the Ling/Light_EndRoutine api](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine.md)



The ContainerAwareLightEndRoutineHandler class
================
2019-09-19 --> 2021-05-31






Introduction
============

The ContainerAwareLightEndRoutineHandler class.



Class synopsis
==============


abstract class <span class="pl-k">ContainerAwareLightEndRoutineHandler</span> implements [LightEndRoutineHandlerInterface](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/ContainerAwareLightEndRoutineHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/ContainerAwareLightEndRoutineHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - abstract public [LightEndRoutineHandlerInterface::handle](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface/handle.md)() : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [ContainerAwareLightEndRoutineHandler::__construct](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/ContainerAwareLightEndRoutineHandler/__construct.md) &ndash; Builds the ContainerAwareLightEndRoutineHandler instance.
- [ContainerAwareLightEndRoutineHandler::setContainer](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/ContainerAwareLightEndRoutineHandler/setContainer.md) &ndash; Sets the light service container interface.
- [LightEndRoutineHandlerInterface::handle](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface/handle.md) &ndash; Executes the end routine.





Location
=============
Ling\Light_EndRoutine\Handler\ContainerAwareLightEndRoutineHandler<br>
See the source code of [Ling\Light_EndRoutine\Handler\ContainerAwareLightEndRoutineHandler](https://github.com/lingtalfi/Light_EndRoutine/blob/master/Handler/ContainerAwareLightEndRoutineHandler.php)



SeeAlso
==============
Next class: [LightEndRoutineHandlerInterface](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md)<br>
