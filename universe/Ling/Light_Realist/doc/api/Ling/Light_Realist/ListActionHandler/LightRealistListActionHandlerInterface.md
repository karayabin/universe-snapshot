[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistListActionHandlerInterface class
================
2019-08-12 --> 2020-07-21






Introduction
============

The LightRealistListActionHandlerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistListActionHandlerInterface</span>  {

- Methods
    - abstract public [prepare](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false
    - abstract public [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md)(string $actionName, array $params) : array

}






Methods
==============

- [LightRealistListActionHandlerInterface::prepare](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepare.md) &ndash; by a renderer to display that item in the gui).
- [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md) &ndash; Executes the list action (called via ajax) identified by the given action name and returns the ajax response.





Location
=============
Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface<br>
See the source code of [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistListActionHandlerInterface.php)



SeeAlso
==============
Previous class: [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)<br>Next class: [LightRealistBaseListGeneralActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler.md)<br>
