[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminRealistListRenderer class
================
2019-05-17 --> 2020-08-21






Introduction
============

The LightKitAdminRealistListRenderer class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminRealistListRenderer</span> extends [StandardBootstrap4AdminTableRenderer](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/Renderer/StandardBootstrap4AdminTableRenderer.md) implements [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md) {

- Inherited properties
    - protected [Ling\Bootstrap4AdminTable\RendererWidget\RendererWidgetInterface[]](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/RendererWidgetInterface.md) [Bootstrap4AdminTableRenderer::$widgets](#property-widgets) ;
    - protected bool [Bootstrap4AdminTableRenderer::$useSpinKitService](#property-useSpinKitService) ;
    - protected array [Bootstrap4AdminTableRenderer::$jsSnippets](#property-jsSnippets) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$dataTypes](#property-dataTypes) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$labels](#property-labels) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$hiddenColumns](#property-hiddenColumns) ;
    - protected bool[] [OpenAdminTableBaseRealistListRenderer::$useWidgets](#property-useWidgets) ;
    - protected string [OpenAdminTableBaseRealistListRenderer::$requestId](#property-requestId) ;
    - protected string [OpenAdminTableBaseRealistListRenderer::$csrfToken](#property-csrfToken) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [OpenAdminTableBaseRealistListRenderer::$container](#property-container) ;
    - protected array|string [OpenAdminTableBaseRealistListRenderer::$collapsibleColumnIndexes](#property-collapsibleColumnIndexes) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$listActionGroups](#property-listActionGroups) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$listGeneralActions](#property-listGeneralActions) ;
    - protected string [OpenAdminTableBaseRealistListRenderer::$containerCssId](#property-containerCssId) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$sqlColumns](#property-sqlColumns) ;
    - protected array [OpenAdminTableBaseRealistListRenderer::$relatedLinks](#property-relatedLinks) ;
    - protected string|null [OpenAdminTableBaseRealistListRenderer::$title](#property-title) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListRenderer/__construct.md)() : void

- Inherited methods
    - public Bootstrap4AdminTableRenderer::registerWidget(string $identifier, [Ling\Bootstrap4AdminTable\RendererWidget\RendererWidgetInterface](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/RendererWidgetInterface.md) $rendererWidget) : void
    - public Bootstrap4AdminTableRenderer::setUseSpinKitService(bool $useSpinKitService) : void
    - public Bootstrap4AdminTableRenderer::renderListGeneralActions() : void
    - public Bootstrap4AdminTableRenderer::render() : void
    - public Bootstrap4AdminTableRenderer::getWidget(string $identifier) : [RendererWidgetInterface](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/RendererWidgetInterface.md) | null
    - protected Bootstrap4AdminTableRenderer::printWidgetIfExists(string $identifier) : void
    - protected Bootstrap4AdminTableRenderer::printSearchWidgets() : void
    - protected Bootstrap4AdminTableRenderer::callAssets() : void
    - protected Bootstrap4AdminTableRenderer::printJavascript() : void
    - public OpenAdminTableBaseRealistListRenderer::prepareByRequestDeclaration(string $requestId, array $requestDeclaration, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public OpenAdminTableBaseRealistListRenderer::setContainerCssId(string $cssId) : mixed
    - public OpenAdminTableBaseRealistListRenderer::renderTitle() : void
    - public OpenAdminTableBaseRealistListRenderer::setDataTypes(array $array) : void
    - public OpenAdminTableBaseRealistListRenderer::setLabels(array $labels) : void
    - public OpenAdminTableBaseRealistListRenderer::setHiddenColumns(array $hiddenColumns) : void
    - public OpenAdminTableBaseRealistListRenderer::setWidgetStatuses(array $widgetStatuses) : void
    - public OpenAdminTableBaseRealistListRenderer::setRequestId(string $requestId) : void
    - public OpenAdminTableBaseRealistListRenderer::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public OpenAdminTableBaseRealistListRenderer::setCollapsibleColumnIndexes($collapsibleColumnIndexes) : void
    - public OpenAdminTableBaseRealistListRenderer::setListActionGroups(array $listActionGroups) : void
    - public OpenAdminTableBaseRealistListRenderer::setListGeneralActions(array $listGeneralActions) : void
    - public OpenAdminTableBaseRealistListRenderer::setCsrfToken(string $csrfToken) : void
    - public OpenAdminTableBaseRealistListRenderer::setSqlColumns(array $sqlColumns) : void
    - public OpenAdminTableBaseRealistListRenderer::setRelatedLinks(array $relatedLinks) : void
    - public OpenAdminTableBaseRealistListRenderer::setTitle(string $title) : void
    - protected OpenAdminTableBaseRealistListRenderer::getDataType(string $columnName) : string
    - protected OpenAdminTableBaseRealistListRenderer::isWidgetEnabled(string $identifier) : bool
    - protected OpenAdminTableBaseRealistListRenderer::getListActionGroupLeafItems() : array

}






Methods
==============

- [LightKitAdminRealistListRenderer::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistListRenderer/__construct.md) &ndash; Builds the Bootstrap4AdminTableRenderer instance.
- Bootstrap4AdminTableRenderer::registerWidget &ndash; Registers a widget.
- Bootstrap4AdminTableRenderer::setUseSpinKitService &ndash; Sets the useSpinKitService.
- Bootstrap4AdminTableRenderer::renderListGeneralActions &ndash; Prints the list general actions.
- Bootstrap4AdminTableRenderer::render &ndash; Prints the html list.
- Bootstrap4AdminTableRenderer::getWidget &ndash; Returns the RendererWidget instance identified by $identifier, or null if it doesn't exist.
- Bootstrap4AdminTableRenderer::printWidgetIfExists &ndash; Prints the widget identified by $identifier if it has been registered.
- Bootstrap4AdminTableRenderer::printSearchWidgets &ndash; Prints the search widgets.
- Bootstrap4AdminTableRenderer::callAssets &ndash; Calls the necessary assets to display the list correctly.
- Bootstrap4AdminTableRenderer::printJavascript &ndash; Prints the necessary javascript.
- OpenAdminTableBaseRealistListRenderer::prepareByRequestDeclaration &ndash; Prepares the list renderer with the given request declaration.
- OpenAdminTableBaseRealistListRenderer::setContainerCssId &ndash; Sets the container css id.
- OpenAdminTableBaseRealistListRenderer::renderTitle &ndash; Prints the list title.
- OpenAdminTableBaseRealistListRenderer::setDataTypes &ndash; Sets the data types.
- OpenAdminTableBaseRealistListRenderer::setLabels &ndash; Sets the labels.
- OpenAdminTableBaseRealistListRenderer::setHiddenColumns &ndash; Sets the hiddenColumns.
- OpenAdminTableBaseRealistListRenderer::setWidgetStatuses &ndash; Sets the widget statuses.
- OpenAdminTableBaseRealistListRenderer::setRequestId &ndash; Sets the requestId.
- OpenAdminTableBaseRealistListRenderer::setContainer &ndash; Sets the container.
- OpenAdminTableBaseRealistListRenderer::setCollapsibleColumnIndexes &ndash; Sets the collapsibleColumnIndexes.
- OpenAdminTableBaseRealistListRenderer::setListActionGroups &ndash; Sets the listActionGroups.
- OpenAdminTableBaseRealistListRenderer::setListGeneralActions &ndash; Sets the listGeneralActions.
- OpenAdminTableBaseRealistListRenderer::setCsrfToken &ndash; Sets the csrfToken value.
- OpenAdminTableBaseRealistListRenderer::setSqlColumns &ndash; Sets the sqlColumns.
- OpenAdminTableBaseRealistListRenderer::setRelatedLinks &ndash; Sets the relatedLinks.
- OpenAdminTableBaseRealistListRenderer::setTitle &ndash; Sets the title.
- OpenAdminTableBaseRealistListRenderer::getDataType &ndash; Returns the data type of the column.
- OpenAdminTableBaseRealistListRenderer::isWidgetEnabled &ndash; Returns whether the widget identified by $identifier is enabled.
- OpenAdminTableBaseRealistListRenderer::getListActionGroupLeafItems &ndash; Returns the array of leaf items (i.e.





Location
=============
Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer<br>
See the source code of [Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/Rendering/LightKitAdminRealistListRenderer.php)



SeeAlso
==============
Previous class: [LightKitAdminListGeneralActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListGeneralActionHandler/LightKitAdminListGeneralActionHandler.md)<br>Next class: [LightKitAdminRealistRowsRenderer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/Rendering/LightKitAdminRealistRowsRenderer.md)<br>
