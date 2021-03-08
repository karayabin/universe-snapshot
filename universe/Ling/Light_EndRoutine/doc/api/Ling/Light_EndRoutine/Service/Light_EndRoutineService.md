[Back to the Ling/Light_EndRoutine api](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine.md)



The Light_EndRoutineService class
================
2019-09-19 --> 2021-03-05






Introduction
============

The Light_EndRoutineService class.



Class synopsis
==============


class <span class="pl-k">Light_EndRoutineService</span>  {

- Properties
    - protected [Ling\Light_EndRoutine\Handler\LightEndRoutineHandlerInterface[]](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md) [$handlers](#property-handlers) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/__construct.md)() : void
    - public [registerHandler](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/registerHandler.md)(string $identifier, [Ling\Light_EndRoutine\Handler\LightEndRoutineHandlerInterface](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md) $handler) : void
    - public [setContainer](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [executeEndRoutines](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/executeEndRoutines.md)(array $route) : void

}




Properties
=============

- <span id="property-handlers"><b>handlers</b></span>

    This property holds the handlers for this instance.
    It's an array of identifier => LightEndRoutineHandlerInterface
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [Light_EndRoutineService::__construct](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/__construct.md) &ndash; Builds the Light_EndRoutineService instance.
- [Light_EndRoutineService::registerHandler](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/registerHandler.md) &ndash; Registers an end routine handler.
- [Light_EndRoutineService::setContainer](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/setContainer.md) &ndash; Sets the container.
- [Light_EndRoutineService::executeEndRoutines](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Service/Light_EndRoutineService/executeEndRoutines.md) &ndash; Executes all registered end routines.





Location
=============
Ling\Light_EndRoutine\Service\Light_EndRoutineService<br>
See the source code of [Ling\Light_EndRoutine\Service\Light_EndRoutineService](https://github.com/lingtalfi/Light_EndRoutine/blob/master/Service/Light_EndRoutineService.php)



SeeAlso
==============
Previous class: [LightEndRoutineHandlerInterface](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md)<br>
