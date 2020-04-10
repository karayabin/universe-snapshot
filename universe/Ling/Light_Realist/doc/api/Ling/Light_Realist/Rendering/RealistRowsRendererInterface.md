[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The RealistRowsRendererInterface class
================
2019-08-12 --> 2020-03-10






Introduction
============

The RealistRowsRendererInterface interface.
See [the realist conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md) for more details.



Class synopsis
==============


abstract class <span class="pl-k">RealistRowsRendererInterface</span>  {

- Methods
    - abstract public [setColumnType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/setColumnType.md)(string $columnName, string $type, ?array $options = []) : void
    - abstract public [setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/setRic.md)(array $ric) : mixed
    - abstract public [setHiddenColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/setHiddenColumns.md)(array $hiddenColumns) : mixed
    - abstract public [addDynamicColumn](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/addDynamicColumn.md)(string $columnName, ?$position = post) : void
    - abstract public [render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/render.md)(array $rows) : string

}






Methods
==============

- [RealistRowsRendererInterface::setColumnType](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/setColumnType.md) &ndash; Binds a type to the given column name.
- [RealistRowsRendererInterface::setRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/setRic.md) &ndash; Sets the ric.
- [RealistRowsRendererInterface::setHiddenColumns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/setHiddenColumns.md) &ndash; Sets the hidden columns.
- [RealistRowsRendererInterface::addDynamicColumn](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/addDynamicColumn.md) &ndash; Adds a dynamic column at the given position.
- [RealistRowsRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface/render.md) &ndash; 





Location
=============
Ling\Light_Realist\Rendering\RealistRowsRendererInterface<br>
See the source code of [Ling\Light_Realist\Rendering\RealistRowsRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/RealistRowsRendererInterface.php)



SeeAlso
==============
Previous class: [RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface.md)<br>Next class: [RequestIdAwareRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RequestIdAwareRendererInterface.md)<br>
