[Back to the Ling/Bootstrap4AdminTable api](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable.md)<br>
[Back to the Ling\Bootstrap4AdminTable\RendererWidget\ToolbarRendererWidgetInterface class](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidgetInterface.md)


ToolbarRendererWidgetInterface::setGroups
================



ToolbarRendererWidgetInterface::setGroups — Sets the groups.




Description
================


abstract public [ToolbarRendererWidgetInterface::setGroups](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidgetInterface/setGroups.md)(array $groups) : void




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
See the source code for method [ToolbarRendererWidgetInterface::setGroups](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/RendererWidget/ToolbarRendererWidgetInterface.php#L31-L31)


See Also
================

The [ToolbarRendererWidgetInterface](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidgetInterface.md) class.



