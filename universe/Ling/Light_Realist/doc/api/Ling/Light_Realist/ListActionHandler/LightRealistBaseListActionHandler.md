[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistBaseListActionHandler class
================
2019-08-12 --> 2019-09-19






Introduction
============

The LightRealistBaseListActionHandler class.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistBaseListActionHandler</span> extends [LightRealistAbstractListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler.md) implements [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) {

- Inherited properties
    - protected array [LightRealistAbstractListActionHandler::$handledIds](#property-handledIds) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/__construct.md)() : void
    - public [doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/doExecute.md)(string $actionId, array $params = []) : array
    - public [getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getJsActionCode.md)(string $actionId) : string
    - protected [getJsCodeByFileName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getJsCodeByFileName.md)(string $fileName) : string

- Inherited methods
    - public [LightRealistAbstractListActionHandler::getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/getHandledIds.md)() : array
    - public [LightRealistAbstractListActionHandler::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/execute.md)(string $actionId, array $params = []) : array
    - public [LightRealistAbstractListActionHandler::setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/setHandledIds.md)(array $handledIds) : void
    - abstract public [LightRealistListActionHandlerInterface::getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md)(string $actionId) : string

}






Methods
==============

- [LightRealistBaseListActionHandler::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/__construct.md) &ndash; Builds the LightRealistBaseListActionHandler instance.
- [LightRealistBaseListActionHandler::doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/doExecute.md) &ndash; Executes the list action identified by the given action id.
- [LightRealistBaseListActionHandler::getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getJsActionCode.md) &ndash; Returns the js action code for this list action.
- [LightRealistBaseListActionHandler::getJsCodeByFileName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getJsCodeByFileName.md) &ndash; Returns the js code found in the file identified by the given fileName.
- [LightRealistAbstractListActionHandler::getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/getHandledIds.md) &ndash; Returns the array of handled list action ids.
- [LightRealistAbstractListActionHandler::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/execute.md) &ndash; Executes the list action identified by the given action id.
- [LightRealistAbstractListActionHandler::setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/setHandledIds.md) &ndash; Sets the handledIds.
- [LightRealistListActionHandlerInterface::getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md) &ndash; Returns the html code for the (list action) button.





Location
=============
Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler<br>
See the source code of [Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistBaseListActionHandler.php)



SeeAlso
==============
Previous class: [LightRealistAbstractListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler.md)<br>Next class: [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)<br>
