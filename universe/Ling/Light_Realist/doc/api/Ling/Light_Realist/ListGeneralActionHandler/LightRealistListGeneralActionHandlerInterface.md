[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistListGeneralActionHandlerInterface class
================
2019-08-12 --> 2019-11-01






Introduction
============

The LightRealistListGeneralActionHandlerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistListGeneralActionHandlerInterface</span>  {

- Methods
    - abstract public [prepare](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false
    - abstract public [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/execute.md)(string $actionName, array $params) : array

}






Methods
==============

- [LightRealistListGeneralActionHandlerInterface::prepare](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/prepare.md) &ndash; by a renderer to display that item in the gui).
- [LightRealistListGeneralActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/execute.md) &ndash; Executes the list general action (called via ajax) identified by the given action name and returns the ajax response.





Location
=============
Ling\Light_Realist\ListGeneralActionHandler\LightRealistListGeneralActionHandlerInterface<br>
See the source code of [Ling\Light_Realist\ListGeneralActionHandler\LightRealistListGeneralActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.php)



SeeAlso
==============
Previous class: [LightRealistBaseListGeneralActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler.md)<br>Next class: [BaseRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md)<br>
