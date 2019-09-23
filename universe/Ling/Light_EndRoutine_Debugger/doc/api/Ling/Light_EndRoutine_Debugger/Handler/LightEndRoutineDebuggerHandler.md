[Back to the Ling/Light_EndRoutine_Debugger api](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger.md)



The LightEndRoutineDebuggerHandler class
================
2019-09-20 --> 2019-09-23






Introduction
============

The LightEndRoutineDebuggerHandler class.



Class synopsis
==============


class <span class="pl-k">LightEndRoutineDebuggerHandler</span> extends [ContainerAwareLightEndRoutineHandler](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/ContainerAwareLightEndRoutineHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightEndRoutineHandlerInterface](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine/Handler/LightEndRoutineHandlerInterface.md) {

- Properties
    - protected array [$options](#property-options) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightEndRoutineHandler::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger/Handler/LightEndRoutineDebuggerHandler/__construct.md)() : void
    - public [handle](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger/Handler/LightEndRoutineDebuggerHandler/handle.md)() : void
    - public [setOptions](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger/Handler/LightEndRoutineDebuggerHandler/setOptions.md)(array $options) : void

- Inherited methods
    - public ContainerAwareLightEndRoutineHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    Options for this class.
    
    The  available options are:
    
    - showSession: bool=false, whether to add the session variables into the debug output
    - sessionVars: array|null=null, what session vars to show in particular. If null, all session vars
                     are shown.
    - path: string=null. The path where to write the debug output. If null,
             the [logger](https://github.com/lingtalfi/Light_Logger) service will be used with the method "debug".
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightEndRoutineDebuggerHandler::__construct](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger/Handler/LightEndRoutineDebuggerHandler/__construct.md) &ndash; Builds the ContainerAwareLightEndRoutineHandler instance.
- [LightEndRoutineDebuggerHandler::handle](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger/Handler/LightEndRoutineDebuggerHandler/handle.md) &ndash; Executes the end routine.
- [LightEndRoutineDebuggerHandler::setOptions](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger/Handler/LightEndRoutineDebuggerHandler/setOptions.md) &ndash; Sets the options.
- ContainerAwareLightEndRoutineHandler::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_EndRoutine_Debugger\Handler\LightEndRoutineDebuggerHandler<br>
See the source code of [Ling\Light_EndRoutine_Debugger\Handler\LightEndRoutineDebuggerHandler](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/Handler/LightEndRoutineDebuggerHandler.php)



