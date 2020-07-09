[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The OpenAdminTableBaseRealistListRenderer class
================
2019-08-12 --> 2020-07-06






Introduction
============

The OpenAdminTableBaseRealistListRenderer class.
Helps implementing the "Open Admin Table One" protocol.
See more details in the [open admin table helper implementation notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md).



Class synopsis
==============


abstract class <span class="pl-k">OpenAdminTableBaseRealistListRenderer</span> implements [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md) {

- Properties
    - protected array [$dataTypes](#property-dataTypes) ;
    - protected array [$labels](#property-labels) ;
    - protected array [$hiddenColumns](#property-hiddenColumns) ;
    - protected bool[] [$useWidgets](#property-useWidgets) ;
    - protected string [$requestId](#property-requestId) ;
    - protected string [$csrfToken](#property-csrfToken) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array|string [$collapsibleColumnIndexes](#property-collapsibleColumnIndexes) ;
    - protected array [$listActionGroups](#property-listActionGroups) ;
    - protected array [$listGeneralActions](#property-listGeneralActions) ;
    - protected string [$containerCssId](#property-containerCssId) ;
    - protected array [$sqlColumns](#property-sqlColumns) ;
    - protected array [$relatedLinks](#property-relatedLinks) ;
    - protected string|null [$title](#property-title) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/__construct.md)() : void
    - public [prepareByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/prepareByRequestDeclaration.md)(string $requestId, array $requestDeclaration, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setContainerCssId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setContainerCssId.md)(string $cssId) : mixed
    - public [renderTitle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/renderTitle.md)() : void
    - public [setDataTypes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setDataTypes.md)(array $array) : void
    - public [setLabels](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setLabels.md)(array $labels) : void
    - public [setHiddenColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setHiddenColumns.md)(array $hiddenColumns) : void
    - public [setWidgetStatuses](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setWidgetStatuses.md)(array $widgetStatuses) : void
    - public [setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setRequestId.md)(string $requestId) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setCollapsibleColumnIndexes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setCollapsibleColumnIndexes.md)($collapsibleColumnIndexes) : void
    - public [setListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setListActionGroups.md)(array $listActionGroups) : void
    - public [setListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setListGeneralActions.md)(array $listGeneralActions) : void
    - public [setCsrfToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setCsrfToken.md)(string $csrfToken) : void
    - public [setSqlColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setSqlColumns.md)(array $sqlColumns) : void
    - public [setRelatedLinks](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setRelatedLinks.md)(array $relatedLinks) : void
    - public [setTitle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setTitle.md)(string $title) : void
    - protected [getDataType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getDataType.md)(string $columnName) : string
    - protected [isWidgetEnabled](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/isWidgetEnabled.md)(string $identifier) : bool
    - protected [getListActionGroupLeafItems](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getListActionGroupLeafItems.md)() : array

- Inherited methods
    - abstract public [RealistListRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/render.md)() : void
    - abstract public [RealistListRendererInterface::renderListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/renderListGeneralActions.md)() : void

}




Properties
=============

- <span id="property-dataTypes"><b>dataTypes</b></span>

    This property holds the data types for this instance.
    It's an array of columnName => dataTypeIdentifier.
    More info in the [open admin table protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md).
    
    

- <span id="property-labels"><b>labels</b></span>

    This property holds the labels for this instance.
    It's an array of columnName => label.
    The label is displayed in the header columns.
    
    

- <span id="property-hiddenColumns"><b>hiddenColumns</b></span>

    This property holds the hiddenColumns for this instance.
    The hidden columns are not displayed (but their data is still accessible).
    
    

- <span id="property-useWidgets"><b>useWidgets</b></span>

    This property holds an array of booleans representing whether or not to use the renderer widgets.
    It's an array of widget identifier => bool.
    
    Note: a widget shall be registered before it can be used (unless it's hardcoded inside this class, like
    the checkbox widget for instance).
    
    If a widget identifier is not found, this means false (i.e. we don't use the widget).
    
    

- <span id="property-requestId"><b>requestId</b></span>

    This property holds the requestId for this instance.
    
    

- <span id="property-csrfToken"><b>csrfToken</b></span>

    This property holds the csrfToken for this instance.
    The csrf token value.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-collapsibleColumnIndexes"><b>collapsibleColumnIndexes</b></span>

    This property holds the collapsibleColumnIndexes for this instance.
    
    This is a property specific to the [responsive table helper tool](https://github.com/lingtalfi/JResponsiveTableHelper).
    
    

- <span id="property-listActionGroups"><b>listActionGroups</b></span>

    This property holds the listActionGroups for this instance.
    More details in the [list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md).
    
    

- <span id="property-listGeneralActions"><b>listGeneralActions</b></span>

    This property holds the listGeneralActions for this instance.
    
    

- <span id="property-containerCssId"><b>containerCssId</b></span>

    This property holds the containerCssId for this instance.
    
    

- <span id="property-sqlColumns"><b>sqlColumns</b></span>

    This property holds the sqlColumns for this instance.
    
    

- <span id="property-relatedLinks"><b>relatedLinks</b></span>

    This property holds the relatedLinks for this instance.
    Each link is an array:
    - text: the label of the link
    - url: the url of the link
    - ?icon: the css class of the icon if any
    
    

- <span id="property-title"><b>title</b></span>

    This property holds the title for this instance.
    
    



Methods
==============

- [OpenAdminTableBaseRealistListRenderer::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/__construct.md) &ndash; Builds the OpenAdminTableBaseRealistListRenderer instance.
- [OpenAdminTableBaseRealistListRenderer::prepareByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/prepareByRequestDeclaration.md) &ndash; Prepares the list renderer with the given request declaration.
- [OpenAdminTableBaseRealistListRenderer::setContainerCssId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setContainerCssId.md) &ndash; Sets the container css id.
- [OpenAdminTableBaseRealistListRenderer::renderTitle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/renderTitle.md) &ndash; Prints the list title.
- [OpenAdminTableBaseRealistListRenderer::setDataTypes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setDataTypes.md) &ndash; Sets the data types.
- [OpenAdminTableBaseRealistListRenderer::setLabels](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setLabels.md) &ndash; Sets the labels.
- [OpenAdminTableBaseRealistListRenderer::setHiddenColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setHiddenColumns.md) &ndash; Sets the hiddenColumns.
- [OpenAdminTableBaseRealistListRenderer::setWidgetStatuses](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setWidgetStatuses.md) &ndash; Sets the widget statuses.
- [OpenAdminTableBaseRealistListRenderer::setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setRequestId.md) &ndash; Sets the requestId.
- [OpenAdminTableBaseRealistListRenderer::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setContainer.md) &ndash; Sets the container.
- [OpenAdminTableBaseRealistListRenderer::setCollapsibleColumnIndexes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setCollapsibleColumnIndexes.md) &ndash; Sets the collapsibleColumnIndexes.
- [OpenAdminTableBaseRealistListRenderer::setListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setListActionGroups.md) &ndash; Sets the listActionGroups.
- [OpenAdminTableBaseRealistListRenderer::setListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setListGeneralActions.md) &ndash; Sets the listGeneralActions.
- [OpenAdminTableBaseRealistListRenderer::setCsrfToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setCsrfToken.md) &ndash; Sets the csrfToken value.
- [OpenAdminTableBaseRealistListRenderer::setSqlColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setSqlColumns.md) &ndash; Sets the sqlColumns.
- [OpenAdminTableBaseRealistListRenderer::setRelatedLinks](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setRelatedLinks.md) &ndash; Sets the relatedLinks.
- [OpenAdminTableBaseRealistListRenderer::setTitle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setTitle.md) &ndash; Sets the title.
- [OpenAdminTableBaseRealistListRenderer::getDataType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getDataType.md) &ndash; Returns the data type of the column.
- [OpenAdminTableBaseRealistListRenderer::isWidgetEnabled](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/isWidgetEnabled.md) &ndash; Returns whether the widget identified by $identifier is enabled.
- [OpenAdminTableBaseRealistListRenderer::getListActionGroupLeafItems](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getListActionGroupLeafItems.md) &ndash; Returns the array of leaf items (i.e.
- [RealistListRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/render.md) &ndash; Prints the html list.
- [RealistListRendererInterface::renderListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/renderListGeneralActions.md) &ndash; Prints the list general actions.





Location
=============
Ling\Light_Realist\Rendering\OpenAdminTableBaseRealistListRenderer<br>
See the source code of [Ling\Light_Realist\Rendering\OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/OpenAdminTableBaseRealistListRenderer.php)



SeeAlso
==============
Previous class: [BaseRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md)<br>Next class: [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md)<br>
