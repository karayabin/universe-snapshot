[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The OpenAdminTableBaseRealistListRenderer class
================
2019-08-12 --> 2019-09-19






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
    - protected bool[] [$useWidgets](#property-useWidgets) ;
    - protected string [$requestId](#property-requestId) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array|string [$collapsibleColumnIndexes](#property-collapsibleColumnIndexes) ;
    - protected array [$listActionGroups](#property-listActionGroups) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/__construct.md)() : void
    - public [prepareByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/prepareByRequestDeclaration.md)(string $requestId, array $requestDeclaration, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setDataTypes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setDataTypes.md)(array $array) : void
    - public [setLabels](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setLabels.md)(array $labels) : void
    - public [setWidgetStatuses](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setWidgetStatuses.md)(array $widgetStatuses) : void
    - public [setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setRequestId.md)(string $requestId) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setCollapsibleColumnIndexes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setCollapsibleColumnIndexes.md)(?$collapsibleColumnIndexes) : void
    - public [setListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setListActionGroups.md)(array $listActionGroups) : void
    - protected [getDataType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getDataType.md)(string $columnName) : string
    - protected [isWidgetEnabled](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/isWidgetEnabled.md)(string $identifier) : bool
    - protected [getListActionGroupLeafItems](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getListActionGroupLeafItems.md)() : array

- Inherited methods
    - abstract public [RealistListRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/render.md)() : void

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
    
    

- <span id="property-useWidgets"><b>useWidgets</b></span>

    This property holds an array of booleans representing whether or not to use the renderer widgets.
    It's an array of widget identifier => bool.
    
    Note: a widget shall be registered before it can be used (unless it's hardcoded inside this class, like
    the checkbox widget for instance).
    
    If a widget identifier is not found, this means false (i.e. we don't use the widget).
    
    

- <span id="property-requestId"><b>requestId</b></span>

    This property holds the requestId for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-collapsibleColumnIndexes"><b>collapsibleColumnIndexes</b></span>

    This property holds the collapsibleColumnIndexes for this instance.
    
    This is a property specific to the [responsive table helper tool](https://github.com/lingtalfi/JResponsiveTableHelper).
    
    

- <span id="property-listActionGroups"><b>listActionGroups</b></span>

    This property holds the listActionGroups for this instance.
    More details in the [list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md).
    
    



Methods
==============

- [OpenAdminTableBaseRealistListRenderer::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/__construct.md) &ndash; Builds the OpenAdminTableBaseRealistListRenderer instance.
- [OpenAdminTableBaseRealistListRenderer::prepareByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/prepareByRequestDeclaration.md) &ndash; Prepares the list renderer with the given request declaration.
- [OpenAdminTableBaseRealistListRenderer::setDataTypes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setDataTypes.md) &ndash; Sets the data types.
- [OpenAdminTableBaseRealistListRenderer::setLabels](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setLabels.md) &ndash; Sets the labels.
- [OpenAdminTableBaseRealistListRenderer::setWidgetStatuses](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setWidgetStatuses.md) &ndash; Sets the widget statuses.
- [OpenAdminTableBaseRealistListRenderer::setRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setRequestId.md) &ndash; Sets the requestId.
- [OpenAdminTableBaseRealistListRenderer::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setContainer.md) &ndash; Sets the container.
- [OpenAdminTableBaseRealistListRenderer::setCollapsibleColumnIndexes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setCollapsibleColumnIndexes.md) &ndash; Sets the collapsibleColumnIndexes.
- [OpenAdminTableBaseRealistListRenderer::setListActionGroups](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/setListActionGroups.md) &ndash; Sets the listActionGroups.
- [OpenAdminTableBaseRealistListRenderer::getDataType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getDataType.md) &ndash; Returns the data type of the column.
- [OpenAdminTableBaseRealistListRenderer::isWidgetEnabled](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/isWidgetEnabled.md) &ndash; Returns whether the widget identified by $identifier is enabled.
- [OpenAdminTableBaseRealistListRenderer::getListActionGroupLeafItems](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer/getListActionGroupLeafItems.md) &ndash; Returns the array of leaf items (i.e.
- [RealistListRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/render.md) &ndash; Prints the list.





Location
=============
Ling\Light_Realist\Rendering\OpenAdminTableBaseRealistListRenderer<br>
See the source code of [Ling\Light_Realist\Rendering\OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/OpenAdminTableBaseRealistListRenderer.php)



SeeAlso
==============
Previous class: [BaseRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md)<br>Next class: [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md)<br>
