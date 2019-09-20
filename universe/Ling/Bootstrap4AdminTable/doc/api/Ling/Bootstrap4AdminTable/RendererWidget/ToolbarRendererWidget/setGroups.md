[Back to the Ling/Bootstrap4AdminTable api](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable.md)<br>
[Back to the Ling\Bootstrap4AdminTable\RendererWidget\ToolbarRendererWidget class](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget.md)


ToolbarRendererWidget::setGroups
================



ToolbarRendererWidget::setGroups — Sets the groups.




Description
================


public [ToolbarRendererWidget::setGroups](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/setGroups.md)(array $groups) : void




Sets the groups.

It's an array of groupItems, as defined in the [list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md).

- 0:
     - text: the text of the group or item
     - ?icon: string, the css class of the icon (if any)
     - ?items: only if this is a group (i.e. containing at least two items).
             An array of children items (recursively).
     - ?attr: array of extra html attributes. Note: you need to check with the concrete implementation
             to see if there is some attributes conflicts (i.e. for instance the concrete implementation
             might already be using the "class" html attribute.

- 1: ...




Parameters
================


- groups

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ToolbarRendererWidget::setGroups](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/RendererWidget/ToolbarRendererWidget.php#L35-L38)


See Also
================

The [ToolbarRendererWidget](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/__construct.md)<br>Next method: [render](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/render.md)<br>

