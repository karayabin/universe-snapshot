[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The RealistListItemRendererInterface class
================
2019-08-12 --> 2021-05-31






Introduction
============

The RealistListItemRendererInterface interface.
See [the realist conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md) for more details.



Class synopsis
==============


abstract class <span class="pl-k">RealistListItemRendererInterface</span>  {

- Methods
    - abstract public [setPropertyType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/setPropertyType.md)(string $property, string $type, ?array $options = []) : void
    - abstract public [setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/setRic.md)(array $ric) : mixed
    - abstract public [setPropertiesToDisplay](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/setPropertiesToDisplay.md)(array $propertyNames) : mixed
    - abstract public [addDynamicProperty](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/addDynamicProperty.md)(string $property) : void
    - abstract public [render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/render.md)(array $rows) : string

}






Methods
==============

- [RealistListItemRendererInterface::setPropertyType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/setPropertyType.md) &ndash; Binds a type to the given property name.
- [RealistListItemRendererInterface::setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/setRic.md) &ndash; Sets the ric.
- [RealistListItemRendererInterface::setPropertiesToDisplay](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/setPropertiesToDisplay.md) &ndash; Sets the property to display.
- [RealistListItemRendererInterface::addDynamicProperty](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/addDynamicProperty.md) &ndash; Adds a dynamic column.
- [RealistListItemRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListItemRendererInterface/render.md) &ndash; 





Location
=============
Ling\Light_Realist\Rendering\RealistListItemRendererInterface<br>
See the source code of [Ling\Light_Realist\Rendering\RealistListItemRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/RealistListItemRendererInterface.php)



SeeAlso
==============
Previous class: [OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer.md)<br>Next class: [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md)<br>
