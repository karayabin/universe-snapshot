[Back to the Ling/Light_EndRoutine_CsrfPageCleaner api](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner.md)



The LightEndRoutineCsrfPageCleanerHandler class
================
2019-09-19 --> 2019-09-20






Introduction
============

The LightEndRoutineCsrfPageCleanerHandler class.
We just implement the [csrf tool page cleaning system](https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/page-security-conception-notes.md).



Class synopsis
==============


class <span class="pl-k">LightEndRoutineCsrfPageCleanerHandler</span> extends [ContainerAwareLightEndRoutineHandler](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/ContainerAwareLightEndRoutineHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightEndRoutineHandlerInterface](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightEndRoutineHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/handle.md)() : void

- Inherited methods
    - public ContainerAwareLightEndRoutineHandler::__construct() : void
    - public ContainerAwareLightEndRoutineHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightEndRoutineCsrfPageCleanerHandler::handle](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/handle.md) &ndash; Executes the end routine.
- ContainerAwareLightEndRoutineHandler::__construct &ndash; Builds the ContainerAwareLightEndRoutineHandler instance.
- ContainerAwareLightEndRoutineHandler::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_EndRoutine_CsrfPageCleaner\Handler\LightEndRoutineCsrfPageCleanerHandler<br>
See the source code of [Ling\Light_EndRoutine_CsrfPageCleaner\Handler\LightEndRoutineCsrfPageCleanerHandler](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/Handler/LightEndRoutineCsrfPageCleanerHandler.php)



