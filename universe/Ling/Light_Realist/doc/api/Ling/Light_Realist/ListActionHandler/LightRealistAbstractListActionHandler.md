[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistAbstractListActionHandler class
================
2019-08-12 --> 2019-09-19






Introduction
============

The LightRealistAbstractListActionHandler class.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistAbstractListActionHandler</span> implements [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) {

- Properties
    - protected array [$handledIds](#property-handledIds) ;

- Methods
    - abstract protected [doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/doExecute.md)(string $actionId, array $params = []) : array
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/__construct.md)() : void
    - public [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/getHandledIds.md)() : array
    - public [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/execute.md)(string $actionId, array $params = []) : array
    - public [setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/setHandledIds.md)(array $handledIds) : void

- Inherited methods
    - abstract public [LightRealistListActionHandlerInterface::getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md)(string $actionId) : string
    - abstract public [LightRealistListActionHandlerInterface::getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getJsActionCode.md)(string $actionId) : string

}




Properties
=============

- <span id="property-handledIds"><b>handledIds</b></span>

    This property holds the handledIds for this instance.
    
    



Methods
==============

- [LightRealistAbstractListActionHandler::doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/doExecute.md) &ndash; Executes the list action identified by the given action id.
- [LightRealistAbstractListActionHandler::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/__construct.md) &ndash; Builds the LightRealistAbstractActionHandler instance.
- [LightRealistAbstractListActionHandler::getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/getHandledIds.md) &ndash; Returns the array of handled list action ids.
- [LightRealistAbstractListActionHandler::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/execute.md) &ndash; Executes the list action identified by the given action id.
- [LightRealistAbstractListActionHandler::setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/setHandledIds.md) &ndash; Sets the handledIds.
- [LightRealistListActionHandlerInterface::getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md) &ndash; Returns the html code for the (list action) button.
- [LightRealistListActionHandlerInterface::getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getJsActionCode.md) &ndash; Returns the js action code for this list action.





Location
=============
Ling\Light_Realist\ListActionHandler\LightRealistAbstractListActionHandler<br>
See the source code of [Ling\Light_Realist\ListActionHandler\LightRealistAbstractListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistAbstractListActionHandler.php)



SeeAlso
==============
Previous class: [LightRealistException](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Exception/LightRealistException.md)<br>Next class: [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)<br>
