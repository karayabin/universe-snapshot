[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminRealistListItemRenderer class
================
2019-05-17 --> 2021-03-05






Introduction
============

The LightKitAdminRealistRowsRenderer class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminRealistListItemRenderer</span> extends [BaseRealistListItemRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer.md) implements [RequestIdAwareRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RequestIdAwareRendererInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [RealistListItemRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface.md) {

- Inherited properties
    - protected array [BaseRealistListItemRenderer::$types](#property-types) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseRealistListItemRenderer::$container](#property-container) ;
    - protected array [BaseRealistListItemRenderer::$dynamicProperties](#property-dynamicProperties) ;
    - protected array [BaseRealistListItemRenderer::$propertiesToDisplay](#property-propertiesToDisplay) ;
    - protected array [BaseRealistListItemRenderer::$ric](#property-ric) ;
    - protected string [BaseRealistListItemRenderer::$requestId](#property-requestId) ;

- Methods
    - protected [renderPropertyContent](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListItemRenderer/renderPropertyContent.md)(string $value, string $type, array $options, array $row) : string

- Inherited methods
    - public BaseRealistListItemRenderer::__construct() : void
    - public BaseRealistListItemRenderer::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public BaseRealistListItemRenderer::setRequestId(string $requestId) : mixed
    - public BaseRealistListItemRenderer::setPropertyType(string $property, string $type, ?array $options = []) : void
    - public BaseRealistListItemRenderer::setRic(array $ric) : mixed
    - public BaseRealistListItemRenderer::setPropertiesToDisplay(array $propertyNames) : mixed
    - public BaseRealistListItemRenderer::addDynamicProperty(string $property) : void
    - public BaseRealistListItemRenderer::render(array $rows) : string
    - protected BaseRealistListItemRenderer::getUrlByRoute(string $route, ?array $urlParameters = [], ?bool $useAbsolute = null) : string
    - protected BaseRealistListItemRenderer::extractRic(array $row) : array
    - protected BaseRealistListItemRenderer::getControllerHubRoute() : string
    - protected BaseRealistListItemRenderer::getAjaxHandlerServiceUrl() : string
    - protected BaseRealistListItemRenderer::getCsrfSimpleTokenValue() : string

}






Methods
==============

- [LightKitAdminRealistListItemRenderer::renderPropertyContent](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListItemRenderer/renderPropertyContent.md) &ndash; Returns the html content of a column which value is given.
- BaseRealistListItemRenderer::__construct &ndash; Builds the BaseDuelistRowsRenderer instance.
- BaseRealistListItemRenderer::setContainer &ndash; Sets the light service container interface.
- BaseRealistListItemRenderer::setRequestId &ndash; Sets the request id for the current instance.
- BaseRealistListItemRenderer::setPropertyType &ndash; Binds a type to the given property name.
- BaseRealistListItemRenderer::setRic &ndash; Sets the ric.
- BaseRealistListItemRenderer::setPropertiesToDisplay &ndash; Sets the property to display.
- BaseRealistListItemRenderer::addDynamicProperty &ndash; Adds a dynamic column.
- BaseRealistListItemRenderer::render &ndash; 
- BaseRealistListItemRenderer::getUrlByRoute &ndash; Returns the url corresponding to the given route, using the reverse_router service.
- BaseRealistListItemRenderer::extractRic &ndash; 
- BaseRealistListItemRenderer::getControllerHubRoute &ndash; Returns the name of the route to the [controller hub service](https://github.com/lingtalfi/Light_ControllerHub).
- BaseRealistListItemRenderer::getAjaxHandlerServiceUrl &ndash; Returns the url of the [ajax handler service](https://github.com/lingtalfi/Light_AjaxHandler).
- BaseRealistListItemRenderer::getCsrfSimpleTokenValue &ndash; Returns the csrf simple token value.





Location
=============
Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListItemRenderer<br>
See the source code of [Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListItemRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/Rendering/LightKitAdminRealistListItemRenderer.php)



SeeAlso
==============
Previous class: [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)<br>Next class: [LightKitAdminRealistListRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListRenderer.md)<br>
