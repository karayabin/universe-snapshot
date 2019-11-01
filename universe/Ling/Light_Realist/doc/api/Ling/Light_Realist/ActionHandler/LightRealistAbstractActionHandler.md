[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistAbstractActionHandler class
================
2019-08-12 --> 2019-11-01






Introduction
============

The LightRealistAbstractActionHandler class.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistAbstractActionHandler</span> implements [LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md) {

- Properties
    - protected array [$handledIds](#property-handledIds) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler/__construct.md)() : void
    - public [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler/getHandledIds.md)() : array
    - public [setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler/setHandledIds.md)(array $handledIds) : void

- Inherited methods
    - abstract public [LightRealistActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/execute.md)(string $actionId, ?array $params = []) : mixed

}




Properties
=============

- <span id="property-handledIds"><b>handledIds</b></span>

    This property holds the handledIds for this instance.
    
    



Methods
==============

- [LightRealistAbstractActionHandler::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler/__construct.md) &ndash; Builds the LightRealistAbstractActionHandler instance.
- [LightRealistAbstractActionHandler::getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler/getHandledIds.md) &ndash; Returns the array of handled action ids.
- [LightRealistAbstractActionHandler::setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler/setHandledIds.md) &ndash; Sets the handledIds.
- [LightRealistActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/execute.md) &ndash; Executes the action identified by the given action id.





Location
=============
Ling\Light_Realist\ActionHandler\LightRealistAbstractActionHandler<br>
See the source code of [Ling\Light_Realist\ActionHandler\LightRealistAbstractActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/ActionHandler/LightRealistAbstractActionHandler.php)



SeeAlso
==============
Next class: [LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md)<br>
