[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistService class
================
2019-08-12 --> 2021-03-05






Introduction
============

The LightRealistService class.

More information in the [realist conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md).


This class uses babyYaml files as the main storage.
Note: if you need another storage, you might want to extend this class, or create a similar service.





Conception notes
------------------

So basically, I plan to implement three different methods to call sql requests.
This service could be the only service you use for handling ALL the sql requests of your app,
if so you wanted (at least that's my goal to provide such a tool with this service).


The three methods will be distribute amongst two php methods:

- executeRequestById
- executeRequest

The executeRequest is for common and/or free requests.
The executeRequestById splits internally in two different methods:

- one to execute parametrized requests stored in the babyYaml files. This is the main use of this method.
- the other will let us go even more dynamic (more php code), in case babyYaml static style isn't enough to handle
     every situations.

Now at the moment you're reading this the class might just a work in progress.
I like to implement the features only when there is a concrete need for it, and so for I didn't need
the dynamic side, nor the free requests.



Class synopsis
==============


class <span class="pl-k">LightRealistService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$baseDir](#property-baseDir) ;
    - protected [Ling\ParametrizedSqlQuery\ParametrizedSqlQueryUtil](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery/ParametrizedSqlQueryUtil.md) [$parametrizedSqlQuery](#property-parametrizedSqlQuery) ;
    - protected [Ling\Light_Realist\Rendering\RealistListItemRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface.md) [$listItemRenderer](#property-listItemRenderer) ;
    - protected [Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md) [$actionHandlers](#property-actionHandlers) ;
    - protected [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) [$listActionHandler](#property-listActionHandler) ;
    - protected [Ling\Light_Realist\Rendering\RealistListRendererInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md) [$listRenderers](#property-listRenderers) ;
    - protected [Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md) [$dynamicInjectionHandlers](#property-dynamicInjectionHandlers) ;
    - private array [$_requestDeclarationCache](#property-_requestDeclarationCache) ;
    - private array [$lateRegistered](#property-lateRegistered) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/__construct.md)() : void
    - public [executeRequestById](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/executeRequestById.md)(string $requestId, ?array $params = [], ?array $options = []) : array
    - public [getStandardDeveloperVariables](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getStandardDeveloperVariables.md)() : array
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setBaseDir](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setBaseDir.md)(string $baseDir) : void
    - public [registerListItemRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListItemRenderer.md)(string $identifier, [Ling\Light_Realist\Rendering\RealistListItemRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface.md) $renderer) : void
    - public [registerListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListRenderer.md)(string $identifier, [Ling\Light_Realist\Rendering\RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md) $renderer) : void
    - public [setListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setListActionHandler.md)([Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) $handler) : void
    - public [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerDynamicInjectionHandler.md)(string $identifier, [Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md) $handler) : void
    - public [getActionHandlerByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getActionHandlerByRequestId.md)(string $requestId) : [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)
    - public [getListRendererByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListRendererByRequestId.md)(string $requestId) : [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md)
    - public [prepareListItemGroupActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActionsByRequestId.md)(string $requestId, ?string $format = null) : array
    - public [prepareListGeneralActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListGeneralActionsByRequestId.md)($requestId) : void
    - public [getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md)(string $requestId) : array
    - public [isAvailableActionByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/isAvailableActionByRequestId.md)(string $actionId, string $requestId) : bool
    - public [checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfTokenByGenericActionItem.md)(array $item, array $params) : void
    - public [getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getSqlColumnsByRequestDeclaration.md)(array $requestDeclaration) : array
    - protected [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md)(string $message) : void
    - protected [getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getDynamicInjectionHandler.md)(string $identifier) : [RealistDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md)
    - protected [checkCsrfToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfToken.md)(string $token) : void
    - private [prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareGenericActionItem.md)(array &$item, [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) $actionHandler, string $requestId) : false | null
    - private [prepareListItemGroupActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActions.md)(array &$items, [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) $actionHandler, string $requestId) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-baseDir"><b>baseDir</b></span>

    This property holds the base directory for this instance.
    It should be set to the application directory.
    
    

- <span id="property-parametrizedSqlQuery"><b>parametrizedSqlQuery</b></span>

    This property holds the parametrizedSqlQuery for this instance.
    
    

- <span id="property-listItemRenderer"><b>listItemRenderer</b></span>

    The list item renderer.
    See more details in the [list item renderer page](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-item-renderer.md).
    
    

- <span id="property-actionHandlers"><b>actionHandlers</b></span>

    This property holds the (ric/ajax) actionHandlers for this instance.
    It's an array of LightRealistActionHandlerInterface instances.
    
    

- <span id="property-listActionHandler"><b>listActionHandler</b></span>

    The LightRealistListActionHandlerInterface instance used to handle the list actions.
    See the [realist list actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md) document for more details.
    
    

- <span id="property-listRenderers"><b>listRenderers</b></span>

    This property holds the listRenderers for this instance.
    It's an array of identifier => RealistListRendererInterface instance
    
    

- <span id="property-dynamicInjectionHandlers"><b>dynamicInjectionHandlers</b></span>

    This property holds the dynamicInjectionHandlers for this instance.
    It's an array of identifier => RealistDynamicInjectionHandlerInterface
    
    Usually the identifier is a plugin name.
    
    

- <span id="property-_requestDeclarationCache"><b>_requestDeclarationCache</b></span>

    This property holds the _requestDeclarationCache for this instance.
    An array of requestId => requestDeclaration array
    
    

- <span id="property-lateRegistered"><b>lateRegistered</b></span>

    This property holds the lateRegistered for this instance.
    
    An array of already registered requestId.
    
    



Methods
==============

- [LightRealistService::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/__construct.md) &ndash; Builds the LightRealistService instance.
- [LightRealistService::executeRequestById](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/executeRequestById.md) &ndash;      the .byml extension.
- [LightRealistService::getStandardDeveloperVariables](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getStandardDeveloperVariables.md) &ndash; Returns an array of standard developer variables.
- [LightRealistService::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setContainer.md) &ndash; Sets the container.
- [LightRealistService::setBaseDir](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setBaseDir.md) &ndash; Sets the baseDir.
- [LightRealistService::registerListItemRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListItemRenderer.md) &ndash; Registers a RealistListRendererInterface.
- [LightRealistService::registerListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListRenderer.md) &ndash; Registers a list renderer.
- [LightRealistService::setListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setListActionHandler.md) &ndash; Sets the list action handler.
- [LightRealistService::registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerDynamicInjectionHandler.md) &ndash; Registers a [dynamic injection handler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md#dynamic-injection).
- [LightRealistService::getActionHandlerByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getActionHandlerByRequestId.md) &ndash; Returns the action handler for the given request id.
- [LightRealistService::getListRendererByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListRendererByRequestId.md) &ndash; Returns a configured list renderer.
- [LightRealistService::prepareListItemGroupActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActionsByRequestId.md) &ndash; Returns the prepared "action items" array representing the "list item group actions" for the list identified by the given requestId.
- [LightRealistService::prepareListGeneralActionsByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListGeneralActionsByRequestId.md) &ndash; Returns the prepared "action items" array representing the "general actions" for the list identified by the given requestId.
- [LightRealistService::getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md) &ndash; Returns the configuration array corresponding to the given request id.
- [LightRealistService::isAvailableActionByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/isAvailableActionByRequestId.md) &ndash; Returns the given action is allowed for the given requestId.
- [LightRealistService::checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfTokenByGenericActionItem.md) &ndash; Performs the csrf validation if necessary (i.e.
- [LightRealistService::getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getSqlColumnsByRequestDeclaration.md) &ndash; Returns the columns used in the sql query by parsing the given request declaration.
- [LightRealistService::error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md) &ndash; Throws the given error message as an exception.
- [LightRealistService::getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getDynamicInjectionHandler.md) &ndash; or throws an exception if it's not there.
- [LightRealistService::checkCsrfToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfToken.md) &ndash; Checks whether the csrf token is valid, throws an exception if that's not the case.
- [LightRealistService::prepareGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareGenericActionItem.md) &ndash; Converts the given item into a [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md) in expanded form.
- [LightRealistService::prepareListItemGroupActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/prepareListItemGroupActions.md) &ndash; Parses the given list action items (aka [toolbar items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item)) and turns them into [generic action items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md).





Location
=============
Ling\Light_Realist\Service\LightRealistService<br>
See the source code of [Ling\Light_Realist\Service\LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php)



SeeAlso
==============
Previous class: [LightRealistCustomServiceInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md)<br>Next class: [LightRealistTool](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool.md)<br>
