[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistListActionHandlerInterface class
================
2019-08-12 --> 2020-11-17






Introduction
============

The LightRealistListActionHandlerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistListActionHandlerInterface</span>  {

- Methods
    - abstract public [doWeShowTrigger](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/doWeShowTrigger.md)(string $actionId, string $requestId) : bool
    - abstract public [prepareListAction](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepareListAction.md)(string $actionId, string $requestId, array &$listAction) : void
    - abstract public [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md)(string $actionId, ?array $params = []) : array

}






Methods
==============

- [LightRealistListActionHandlerInterface::doWeShowTrigger](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/doWeShowTrigger.md) &ndash; Returns whether we should display the trigger of the action identified by actionId to the current user.
- [LightRealistListActionHandlerInterface::prepareListAction](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepareListAction.md) &ndash; Prepares the given listAction for the given actionId.
- [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md) &ndash; Executes the list action (called via ajax) identified by the given action id and returns the ajax response in alcp format.





Location
=============
Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface<br>
See the source code of [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistListActionHandlerInterface.php)



SeeAlso
==============
Previous class: [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)<br>Next class: [BaseRealistListItemRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer.md)<br>
