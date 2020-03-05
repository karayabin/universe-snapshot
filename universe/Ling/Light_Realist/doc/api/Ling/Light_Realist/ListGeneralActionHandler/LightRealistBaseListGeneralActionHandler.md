[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistBaseListGeneralActionHandler class
================
2019-08-12 --> 2020-03-05






Introduction
============

The LightRealistBaseListGeneralActionHandler class.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistBaseListGeneralActionHandler</span> implements [LightRealistListGeneralActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light_Realist\ListGeneralActionHandler\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$csrfTokenPrefix](#property-csrfTokenPrefix) ;
    - protected string [$pluginName](#property-pluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/decorateGenericActionItemByAssets.md)(string $actionName, array &$item, string $requestId, string $dir, ?array $options = []) : void
    - protected [getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/getTableNameByRequestId.md)(string $requestId) : string
    - protected [hasMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/hasMicroPermission.md)(string $microPermission) : bool
    - protected [checkMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/checkMicroPermission.md)(string $microPermission) : void
    - protected [getPluginName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/getPluginName.md)() : string

- Inherited methods
    - abstract public [LightRealistListGeneralActionHandlerInterface::prepare](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/prepare.md)(string $actionName, array &$genericActionItem, string $requestId) : null | false
    - abstract public [LightRealistListGeneralActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/execute.md)(string $actionName, array $params) : array

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-csrfTokenPrefix"><b>csrfTokenPrefix</b></span>

    This property holds the csrfTokenPrefix for this instance.
    The csrf token prefix to use when csrf tokens needs to be created.
    
    

- <span id="property-pluginName"><b>pluginName</b></span>

    This property holds the pluginName for this instance.
    
    



Methods
==============

- [LightRealistBaseListGeneralActionHandler::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/__construct.md) &ndash; Builds the LightRealistBaseListActionHandler instance.
- [LightRealistBaseListGeneralActionHandler::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/setContainer.md) &ndash; Sets the container.
- [LightRealistBaseListGeneralActionHandler::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/decorateGenericActionItemByAssets.md) &ndash; the calling class source file.
- [LightRealistBaseListGeneralActionHandler::getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/getTableNameByRequestId.md) &ndash; Returns the table name associated with the given requestId.
- [LightRealistBaseListGeneralActionHandler::hasMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/hasMicroPermission.md) &ndash; Returns whether the current user is granted the given micro-permission.
- [LightRealistBaseListGeneralActionHandler::checkMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/checkMicroPermission.md) &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- [LightRealistBaseListGeneralActionHandler::getPluginName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler/getPluginName.md) &ndash; Returns the plugin name for this instance.
- [LightRealistListGeneralActionHandlerInterface::prepare](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/prepare.md) &ndash; by a renderer to display that item in the gui).
- [LightRealistListGeneralActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface/execute.md) &ndash; Executes the list general action (called via ajax) identified by the given action name and returns the ajax response.





Location
=============
Ling\Light_Realist\ListGeneralActionHandler\LightRealistBaseListGeneralActionHandler<br>
See the source code of [Ling\Light_Realist\ListGeneralActionHandler\LightRealistBaseListGeneralActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/ListGeneralActionHandler/LightRealistBaseListGeneralActionHandler.php)



SeeAlso
==============
Previous class: [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)<br>Next class: [LightRealistListGeneralActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.md)<br>
