[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The BaseRealistRowsRenderer class
================
2019-08-12 --> 2020-03-10






Introduction
============

The BaseRealistRowsRenderer interface.



Class synopsis
==============


class <span class="pl-k">BaseRealistRowsRenderer</span> implements [RealistRowsRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [RequestIdAwareRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RequestIdAwareRendererInterface.md) {

- Properties
    - protected array [$types](#property-types) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$dynamicColumns](#property-dynamicColumns) ;
    - protected array [$hiddenColumns](#property-hiddenColumns) ;
    - protected array [$ric](#property-ric) ;
    - protected string [$requestId](#property-requestId) ;
    - private string [$_controllerHubRoute](#property-_controllerHubRoute) ;
    - private string [$_ajaxHandlerServiceUrl](#property-_ajaxHandlerServiceUrl) ;
    - private string [$_csrfSimpleToken](#property-_csrfSimpleToken) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setColumnType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setColumnType.md)(string $columnName, string $type, ?array $options = []) : void
    - public [addDynamicColumn](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/addDynamicColumn.md)(string $columnName, ?$position = post) : void
    - public [setHiddenColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setHiddenColumns.md)(array $hiddenColumns) : mixed
    - public [setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setRequestId.md)(string $requestId) : mixed
    - public [render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/render.md)(array $rows) : string
    - public [setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setRic.md)(array $ric) : mixed
    - protected [renderColumnContent](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/renderColumnContent.md)(string $value, string $type, array $options, array $row) : string
    - protected [getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getUrlByRoute.md)(string $route, ?array $urlParameters = [], ?bool $useAbsolute = null) : string
    - protected [extractRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/extractRic.md)(array $row) : array
    - protected [getControllerHubRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getControllerHubRoute.md)() : string
    - protected [getAjaxHandlerServiceUrl](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getAjaxHandlerServiceUrl.md)() : string
    - protected [getCsrfSimpleTokenValue](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getCsrfSimpleTokenValue.md)() : string

}




Properties
=============

- <span id="property-types"><b>types</b></span>

    This property holds the types for this instance.
    It's an array of columnName => [type, typeOptions]
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dynamicColumns"><b>dynamicColumns</b></span>

    This property holds the dynamicColumns for this instance.
    It's an array of position => columnNames.
    With columnNames being an array of column names.
    
    

- <span id="property-hiddenColumns"><b>hiddenColumns</b></span>

    This property holds the hiddenColumns for this instance.
    It's an array of column names.
    
    

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

- [BaseRealistRowsRenderer::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/__construct.md) &ndash; Builds the BaseDuelistRowsRenderer instance.
- [BaseRealistRowsRenderer::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setContainer.md) &ndash; Sets the light service container interface.
- [BaseRealistRowsRenderer::setColumnType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setColumnType.md) &ndash; Binds a type to the given column name.
- [BaseRealistRowsRenderer::addDynamicColumn](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/addDynamicColumn.md) &ndash; Adds a dynamic column at the given position.
- [BaseRealistRowsRenderer::setHiddenColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setHiddenColumns.md) &ndash; Sets the hidden columns.
- [BaseRealistRowsRenderer::setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setRequestId.md) &ndash; Sets the request id for the current instance.
- [BaseRealistRowsRenderer::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/render.md) &ndash; 
- [BaseRealistRowsRenderer::setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/setRic.md) &ndash; Sets the ric.
- [BaseRealistRowsRenderer::renderColumnContent](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/renderColumnContent.md) &ndash; Returns the html content of a column which value is given.
- [BaseRealistRowsRenderer::getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getUrlByRoute.md) &ndash; Returns the url corresponding to the given route, using the reverse_router service.
- [BaseRealistRowsRenderer::extractRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/extractRic.md) &ndash; 
- [BaseRealistRowsRenderer::getControllerHubRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getControllerHubRoute.md) &ndash; Returns the name of the route to the [controller hub service](https://github.com/lingtalfi/Light_ControllerHub).
- [BaseRealistRowsRenderer::getAjaxHandlerServiceUrl](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getAjaxHandlerServiceUrl.md) &ndash; Returns the url of the [ajax handler service](https://github.com/lingtalfi/Light_AjaxHandler).
- [BaseRealistRowsRenderer::getCsrfSimpleTokenValue](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getCsrfSimpleTokenValue.md) &ndash; Returns the csrf simple token value.





Location
=============
Ling\Light_Realist\Rendering\BaseRealistRowsRenderer<br>
See the source code of [Ling\Light_Realist\Rendering\BaseRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/BaseRealistRowsRenderer.php)



SeeAlso
==============
Previous class: [LightRealistListGeneralActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.md)<br>Next class: [OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer.md)<br>
