[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistBaseListActionHandler class
================
2019-08-12 --> 2021-04-09






Introduction
============

The LightRealistBaseListActionHandler class.



Class synopsis
==============


abstract class <span class="pl-k">LightRealistBaseListActionHandler</span> implements [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light_Realist\ListActionHandler\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$csrfTokenPrefix](#property-csrfTokenPrefix) ;
    - protected string [$pluginName](#property-pluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/decorateGenericActionItemByAssets.md)(string $actionName, array &$item, string $dir, ?array $options = []) : void
    - protected [getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getTableNameByRequestId.md)(string $requestId) : string
    - protected [getPlanetIdByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getPlanetIdByRequestId.md)(string $requestId) : string
    - protected [hasMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/hasMicroPermission.md)(string $microPermission) : bool
    - protected [checkMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/checkMicroPermission.md)(string $microPermission) : void
    - protected [getPluginName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getPluginName.md)() : string

- Inherited methods
    - abstract public [LightRealistListActionHandlerInterface::doWeShowTrigger](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/doWeShowTrigger.md)(string $actionId, string $requestId) : bool
    - abstract public [LightRealistListActionHandlerInterface::prepareListAction](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepareListAction.md)(string $actionId, string $requestId, array &$listAction) : void
    - abstract public [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md)(string $actionId, ?array $params = []) : array

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

- [LightRealistBaseListActionHandler::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/__construct.md) &ndash; Builds the LightRealistBaseListActionHandler instance.
- [LightRealistBaseListActionHandler::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/setContainer.md) &ndash; Sets the container.
- [LightRealistBaseListActionHandler::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/decorateGenericActionItemByAssets.md) &ndash; the calling class source file.
- [LightRealistBaseListActionHandler::getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getTableNameByRequestId.md) &ndash; Returns the table name associated with the given requestId.
- [LightRealistBaseListActionHandler::getPlanetIdByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getPlanetIdByRequestId.md) &ndash; Returns the planetId name associated with the given requestId.
- [LightRealistBaseListActionHandler::hasMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/hasMicroPermission.md) &ndash; Returns whether the current user is granted the given micro-permission.
- [LightRealistBaseListActionHandler::checkMicroPermission](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/checkMicroPermission.md) &ndash; Checks whether the current user has the given micro-permission, and if not throws an exception.
- [LightRealistBaseListActionHandler::getPluginName](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getPluginName.md) &ndash; Returns the plugin name for this instance.
- [LightRealistListActionHandlerInterface::doWeShowTrigger](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/doWeShowTrigger.md) &ndash; Returns whether we should display the trigger of the action identified by actionId to the current user.
- [LightRealistListActionHandlerInterface::prepareListAction](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepareListAction.md) &ndash; Prepares the given listAction for the given actionId.
- [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md) &ndash; Executes the list action (called via ajax) identified by the given action id and returns the ajax response in alcp format.





Location
=============
Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler<br>
See the source code of [Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistBaseListActionHandler.php)



SeeAlso
==============
Previous class: [RequestDeclarationHelper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper.md)<br>Next class: [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)<br>
