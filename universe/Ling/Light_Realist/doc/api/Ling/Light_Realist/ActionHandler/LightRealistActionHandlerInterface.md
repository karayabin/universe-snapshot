[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistActionHandlerInterface class
================
2019-08-12 --> 2021-05-31






Introduction
============

The LightRealistActionHandlerInterface interface.
This tool is used by the LightRealistAjaxServiceController.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistActionHandlerInterface</span>  {

- Methods
    - abstract public [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/getHandledIds.md)() : array
    - abstract public [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/execute.md)(string $actionId, ?array $params = []) : mixed

}






Methods
==============

- [LightRealistActionHandlerInterface::getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/getHandledIds.md) &ndash; Returns the array of handled action ids.
- [LightRealistActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/execute.md) &ndash; Executes the action identified by the given action id.





Location
=============
Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface<br>
See the source code of [Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/ActionHandler/LightRealistActionHandlerInterface.php)



SeeAlso
==============
Previous class: [LightRealistAbstractActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistAbstractActionHandler.md)<br>Next class: [LightRealistAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md)<br>
