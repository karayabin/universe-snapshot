[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminRealistRowsRenderer class
================
2019-05-17 --> 2019-10-25






Introduction
============

The LightKitAdminRealistRowsRenderer class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminRealistRowsRenderer</span> extends [BaseRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [RealistRowsRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md) {

- Inherited properties
    - protected array [BaseRealistRowsRenderer::$types](#property-types) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [BaseRealistRowsRenderer::$container](#property-container) ;
    - protected array [BaseRealistRowsRenderer::$dynamicColumns](#property-dynamicColumns) ;
    - protected array [BaseRealistRowsRenderer::$ric](#property-ric) ;

- Methods
    - protected [renderColumnContent](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistRowsRenderer/renderColumnContent.md)($value, string $type, array $options, array $row) : string

- Inherited methods
    - public BaseRealistRowsRenderer::__construct() : void
    - public BaseRealistRowsRenderer::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public BaseRealistRowsRenderer::setColumnType(string $columnName, string $type, ?array $options = []) : void
    - public BaseRealistRowsRenderer::addDynamicColumn(string $columnName, string $label, ?$position = post) : void
    - public BaseRealistRowsRenderer::render(array $rows) : string
    - public BaseRealistRowsRenderer::setRic(array $ric) : mixed
    - protected BaseRealistRowsRenderer::getUrlByRoute(string $route, ?array $urlParameters = [], ?bool $useAbsolute = null) : string
    - protected BaseRealistRowsRenderer::extractRic(array $row) : array

}






Methods
==============

- [LightKitAdminRealistRowsRenderer::renderColumnContent](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistRowsRenderer/renderColumnContent.md) &ndash; Returns the html content of a column which value is given.
- BaseRealistRowsRenderer::__construct &ndash; Builds the BaseDuelistRowsRenderer instance.
- BaseRealistRowsRenderer::setContainer &ndash; Sets the light service container interface.
- BaseRealistRowsRenderer::setColumnType &ndash; Binds a type to the given column name.
- BaseRealistRowsRenderer::addDynamicColumn &ndash; Adds a dynamic column at the given position.
- BaseRealistRowsRenderer::render &ndash; 
- BaseRealistRowsRenderer::setRic &ndash; Sets the ric.
- BaseRealistRowsRenderer::getUrlByRoute &ndash; Returns the url corresponding to the given route, using the reverse_router service.
- BaseRealistRowsRenderer::extractRic &ndash; 





Location
=============
Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistRowsRenderer<br>
See the source code of [Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistRowsRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/Rendering/LightKitAdminRealistRowsRenderer.php)



SeeAlso
==============
Previous class: [LightKitAdminListGeneralActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.md)<br>Next class: [RightsHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md)<br>
