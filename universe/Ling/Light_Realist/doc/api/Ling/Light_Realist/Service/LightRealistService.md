[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The LightRealistService class
================
2019-08-12 --> 2019-09-19






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
    - protected [Ling\Light_Realist\Rendering\RealistRowsRendererInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md) [$realistRowsRenderers](#property-realistRowsRenderers) ;
    - protected [Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md) [$actionHandlers](#property-actionHandlers) ;
    - protected [Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) [$listActionHandlers](#property-listActionHandlers) ;
    - protected [Ling\Light_Realist\Rendering\RealistListRendererInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md) [$listRenderers](#property-listRenderers) ;
    - protected [Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface[]](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md) [$dynamicInjectionHandlers](#property-dynamicInjectionHandlers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/__construct.md)() : void
    - public [executeRequestById](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/executeRequestById.md)(string $requestId, array $params = []) : array
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setBaseDir](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setBaseDir.md)(string $baseDir) : void
    - public [registerRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerRealistRowsRenderer.md)(string $identifier, [Ling\Light_Realist\Rendering\RealistRowsRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md) $realistRowsRenderer) : void
    - public [registerListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListRenderer.md)(string $identifier, [Ling\Light_Realist\Rendering\RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md) $renderer) : void
    - public [registerActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerActionHandler.md)([Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md) $handler) : void
    - public [registerListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListActionHandler.md)([Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) $handler) : void
    - public [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerDynamicInjectionHandler.md)(string $identifier, [Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md) $handler) : void
    - public [getActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getActionHandler.md)(string $id) : [LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md)
    - public [getListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListActionHandler.md)(string $id) : [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)
    - public [getListRendererByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListRendererByRequestId.md)(string $requestId) : [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md)
    - public [decorateListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/decorateListActionGroups.md)(array &$groups) : void
    - protected [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md)(string $message) : void
    - protected [getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getDynamicInjectionHandler.md)(string $identifier) : [RealistDynamicInjectionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/RealistDynamicInjectionHandlerInterface.md)
    - protected [getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md)(string $requestId) : array

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
    
    

- <span id="property-realistRowsRenderers"><b>realistRowsRenderers</b></span>

    This property holds the array of realistRowsRenderer instances.
    It's an array of str:identifier => instance:realistRowsRenderer.
    
    

- <span id="property-actionHandlers"><b>actionHandlers</b></span>

    This property holds the (ric/ajax) actionHandlers for this instance.
    It's an array of LightRealistActionHandlerInterface instances.
    
    

- <span id="property-listActionHandlers"><b>listActionHandlers</b></span>

    This property holds the listActionHandlers for this instance.
    It's an array of LightRealistListActionHandlerInterface instances.
    
    

- <span id="property-listRenderers"><b>listRenderers</b></span>

    This property holds the listRenderers for this instance.
    It's an array of identifier => RealistListRendererInterface instance
    
    

- <span id="property-dynamicInjectionHandlers"><b>dynamicInjectionHandlers</b></span>

    This property holds the dynamicInjectionHandlers for this instance.
    It's an array of identifier => RealistDynamicInjectionHandlerInterface
    
    Usually the identifier is a plugin name.
    
    



Methods
==============

- [LightRealistService::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/__construct.md) &ndash; Builds the LightRealistService instance.
- [LightRealistService::executeRequestById](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/executeRequestById.md) &ndash; - nb_rows: int, the number of returned rows (i.e.
- [LightRealistService::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setContainer.md) &ndash; Sets the container.
- [LightRealistService::setBaseDir](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/setBaseDir.md) &ndash; Sets the baseDir.
- [LightRealistService::registerRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerRealistRowsRenderer.md) &ndash; Registers a duelistRowsRenderer.
- [LightRealistService::registerListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListRenderer.md) &ndash; Registers a list renderer.
- [LightRealistService::registerActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerActionHandler.md) &ndash; Registers an action handler.
- [LightRealistService::registerListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListActionHandler.md) &ndash; Registers a list action handler.
- [LightRealistService::registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerDynamicInjectionHandler.md) &ndash; Registers a [dynamic injection handler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md#dynamic-injection).
- [LightRealistService::getActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getActionHandler.md) &ndash; Returns the action handler identified by the given id.
- [LightRealistService::getListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListActionHandler.md) &ndash; Returns the list action handler identified by the given id.
- [LightRealistService::getListRendererByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getListRendererByRequestId.md) &ndash; Returns a configured list renderer.
- [LightRealistService::decorateListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/decorateListActionGroups.md) &ndash; Decorates the given list action group array.
- [LightRealistService::error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md) &ndash; Throws the given error message as an exception.
- [LightRealistService::getDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getDynamicInjectionHandler.md) &ndash; or throws an exception if it's not there.
- [LightRealistService::getConfigurationArrayByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getConfigurationArrayByRequestId.md) &ndash; Returns the configuration array corresponding to the given request id.





Location
=============
Ling\Light_Realist\Service\LightRealistService<br>
See the source code of [Ling\Light_Realist\Service\LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php)



SeeAlso
==============
Previous class: [RealistRowsRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md)<br>
