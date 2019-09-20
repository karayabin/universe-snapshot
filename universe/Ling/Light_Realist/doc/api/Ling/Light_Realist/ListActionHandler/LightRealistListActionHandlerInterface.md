[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistListActionHandlerInterface class
================
2019-08-12 --> 2019-09-19






Introduction
============

The LightRealistListActionHandlerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistListActionHandlerInterface</span>  {

- Methods
    - abstract public [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getHandledIds.md)() : array
    - abstract public [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md)(string $actionId, array $params = []) : array
    - abstract public [getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md)(string $actionId) : string
    - abstract public [getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getJsActionCode.md)(string $actionId) : string

}






Methods
==============

- [LightRealistListActionHandlerInterface::getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getHandledIds.md) &ndash; Returns the array of handled list action ids.
- [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md) &ndash; Executes the list action identified by the given action id.
- [LightRealistListActionHandlerInterface::getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md) &ndash; Returns the html code for the (list action) button.
- [LightRealistListActionHandlerInterface::getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getJsActionCode.md) &ndash; Returns the js action code for this list action.





Location
=============
Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface<br>
See the source code of [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistListActionHandlerInterface.php)



SeeAlso
==============
Previous class: [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)<br>Next class: [LightRealistListActionToolbarRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/ToolbarRenderer/LightRealistListActionToolbarRendererInterface.md)<br>
