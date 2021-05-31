[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistTool class
================
2019-08-12 --> 2021-05-31






Introduction
============

The LightRealistTool class.



Class synopsis
==============


class <span class="pl-k">LightRealistTool</span>  {

- Methods
    - public static [getToolbarItemByActionId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/getToolbarItemByActionId.md)(string $actionId, array $requestDeclaration) : array
    - public static [getListGeneralActionItemByActionId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/getListGeneralActionItemByActionId.md)(string $actionId, array $requestDeclaration) : array
    - public static [checkAjaxToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/checkAjaxToken.md)(string $token, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public static [ricsToIntegersOnlyInString](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/ricsToIntegersOnlyInString.md)(array $rics) : string

}






Methods
==============

- [LightRealistTool::getToolbarItemByActionId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/getToolbarItemByActionId.md) &ndash; Returns the [toolbar item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item) identified by the given actionId.
- [LightRealistTool::getListGeneralActionItemByActionId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/getListGeneralActionItemByActionId.md) &ndash; Returns the [list general action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md#list-general-actions) identified by the given actionId.
- [LightRealistTool::checkAjaxToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/checkAjaxToken.md) &ndash; Checks whether the given token is valid and throws an exception if it's not the case.
- [LightRealistTool::ricsToIntegersOnlyInString](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/ricsToIntegersOnlyInString.md) &ndash; Returns a comma separated list of integers, based on the given rics.





Location
=============
Ling\Light_Realist\Tool\LightRealistTool<br>
See the source code of [Ling\Light_Realist\Tool\LightRealistTool](https://github.com/lingtalfi/Light_Realist/blob/master/Tool/LightRealistTool.php)



SeeAlso
==============
Previous class: [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)<br>Next class: [RealistRowsPrinterUtil](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Util/RealistRowsPrinterUtil.md)<br>
