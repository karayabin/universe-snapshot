[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The BaseRealistListItemRenderer class
================
2019-08-12 --> 2021-05-31






Introduction
============

The BaseRealistListItemRenderer class.



Class synopsis
==============


class <span class="pl-k">BaseRealistListItemRenderer</span> implements [RealistListItemRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [RequestIdAwareRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RequestIdAwareRendererInterface.md) {

- Properties
    - protected array [$types](#property-types) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$dynamicProperties](#property-dynamicProperties) ;
    - protected array [$propertiesToDisplay](#property-propertiesToDisplay) ;
    - protected array [$ric](#property-ric) ;
    - protected string [$requestId](#property-requestId) ;
    - private string [$_controllerHubRoute](#property-_controllerHubRoute) ;
    - private string [$_ajaxHandlerServiceUrl](#property-_ajaxHandlerServiceUrl) ;
    - private string [$_csrfSimpleToken](#property-_csrfSimpleToken) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setRequestId.md)(string $requestId) : mixed
    - public [setPropertyType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setPropertyType.md)(string $property, string $type, ?array $options = []) : void
    - public [setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setRic.md)(array $ric) : mixed
    - public [setPropertiesToDisplay](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setPropertiesToDisplay.md)(array $propertyNames) : mixed
    - public [addDynamicProperty](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/addDynamicProperty.md)(string $property) : void
    - public [render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/render.md)(array $rows) : string
    - protected [renderPropertyContent](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/renderPropertyContent.md)(string $value, string $type, array $options, array $row) : string
    - protected [getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getUrlByRoute.md)(string $route, ?array $urlParameters = [], ?bool $useAbsolute = null) : string
    - protected [extractRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/extractRic.md)(array $row) : array
    - protected [getControllerHubRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getControllerHubRoute.md)() : string
    - protected [getAjaxHandlerServiceUrl](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getAjaxHandlerServiceUrl.md)() : string
    - protected [getCsrfSimpleTokenValue](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getCsrfSimpleTokenValue.md)() : string

}




Properties
=============

- <span id="property-types"><b>types</b></span>

    This property holds the types for this instance.
    It's an array of columnName => [type, typeOptions]
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dynamicProperties"><b>dynamicProperties</b></span>

    This property holds the dynamicProperties for this instance.
    It's an array of position => columnNames.
    With columnNames being an array of column names.
    
    

- <span id="property-propertiesToDisplay"><b>propertiesToDisplay</b></span>

    This names of the properties to display, and in the order they should be displayed.
    
    

- <span id="property-ric"><b>ric</b></span>

    This property holds the ric for this instance.
    See [the realist conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md) for more details, the model part.
    Also see the [open admin table helper implementation notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md).
    
    

- <span id="property-requestId"><b>requestId</b></span>

    This property holds the requestId for this instance.
    
    

- <span id="property-_controllerHubRoute"><b>_controllerHubRoute</b></span>

    This property holds the controllerHubRoute for this instance.
    
    

- <span id="property-_ajaxHandlerServiceUrl"><b>_ajaxHandlerServiceUrl</b></span>

    This property holds the _ajaxHandlerServiceUrl for this instance.
    
    

- <span id="property-_csrfSimpleToken"><b>_csrfSimpleToken</b></span>

    This property holds the _csrfSimpleToken for this instance.
    
    



Methods
==============

- [BaseRealistListItemRenderer::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/__construct.md) &ndash; Builds the BaseDuelistRowsRenderer instance.
- [BaseRealistListItemRenderer::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setContainer.md) &ndash; Sets the light service container interface.
- [BaseRealistListItemRenderer::setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setRequestId.md) &ndash; Sets the request id for the current instance.
- [BaseRealistListItemRenderer::setPropertyType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setPropertyType.md) &ndash; Binds a type to the given property name.
- [BaseRealistListItemRenderer::setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setRic.md) &ndash; Sets the ric.
- [BaseRealistListItemRenderer::setPropertiesToDisplay](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/setPropertiesToDisplay.md) &ndash; Sets the property to display.
- [BaseRealistListItemRenderer::addDynamicProperty](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/addDynamicProperty.md) &ndash; Adds a dynamic column.
- [BaseRealistListItemRenderer::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/render.md) &ndash; 
- [BaseRealistListItemRenderer::renderPropertyContent](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/renderPropertyContent.md) &ndash; Returns the html content of a column which value is given.
- [BaseRealistListItemRenderer::getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getUrlByRoute.md) &ndash; Returns the url corresponding to the given route, using the reverse_router service.
- [BaseRealistListItemRenderer::extractRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/extractRic.md) &ndash; 
- [BaseRealistListItemRenderer::getControllerHubRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getControllerHubRoute.md) &ndash; Returns the name of the route to the [controller hub service](https://github.com/lingtalfi/Light_ControllerHub).
- [BaseRealistListItemRenderer::getAjaxHandlerServiceUrl](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getAjaxHandlerServiceUrl.md) &ndash; Returns the url of the [ajax handler service](https://github.com/lingtalfi/Light_AjaxHandler).
- [BaseRealistListItemRenderer::getCsrfSimpleTokenValue](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getCsrfSimpleTokenValue.md) &ndash; Returns the csrf simple token value.





Location
=============
Ling\Light_Realist\Rendering\BaseRealistListItemRenderer<br>
See the source code of [Ling\Light_Realist\Rendering\BaseRealistListItemRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/BaseRealistListItemRenderer.php)



SeeAlso
==============
Previous class: [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)<br>Next class: [OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer.md)<br>
