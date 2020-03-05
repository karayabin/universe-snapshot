[Back to the Ling/Light_EndRoutine_CsrfPageCleaner api](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner.md)



The LightEndRoutineCsrfPageCleanerHandler class
================
2019-09-19 --> 2019-12-19






Introduction
============

The LightEndRoutineCsrfPageCleanerHandler class.
We just implement the [csrf tool page cleaning system](https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/page-security-conception-notes.md).



Class synopsis
==============


class <span class="pl-k">LightEndRoutineCsrfPageCleanerHandler</span> implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [handle](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/handle.md)() : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightEndRoutineCsrfPageCleanerHandler::__construct](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/__construct.md) &ndash; Builds the LightEndRoutineCsrfPageCleanerHandler instance.
- [LightEndRoutineCsrfPageCleanerHandler::setContainer](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/setContainer.md) &ndash; Sets the light service container interface.
- [LightEndRoutineCsrfPageCleanerHandler::handle](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner/Handler/LightEndRoutineCsrfPageCleanerHandler/handle.md) &ndash; Listener for the [Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).





Location
=============
Ling\Light_EndRoutine_CsrfPageCleaner\Handler\LightEndRoutineCsrfPageCleanerHandler<br>
See the source code of [Ling\Light_EndRoutine_CsrfPageCleaner\Handler\LightEndRoutineCsrfPageCleanerHandler](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/Handler/LightEndRoutineCsrfPageCleanerHandler.php)



