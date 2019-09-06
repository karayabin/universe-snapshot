[Back to the Ling/Bootstrap4AdminTable api](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable.md)



The ToolbarRendererWidget class
================
2019-08-15 --> 2019-09-06






Introduction
============

The ToolbarRendererWidget class.



Class synopsis
==============


class <span class="pl-k">ToolbarRendererWidget</span> extends [AbstractRendererWidget](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/AbstractRendererWidget.md) implements [RendererWidgetInterface](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/RendererWidgetInterface.md) {

- Properties
    - protected array [$groups](#property-groups) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/__construct.md)() : void
    - public [render](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/render.md)() : void

}




Properties
=============

- <span id="property-groups"><b>groups</b></span>

    This property holds the groups for this instance.
    
    
    An array of groupItems, as defined in the list action handler conception notes.
    
    - 0:
         - text: the text of the group or item
         - ?icon: string, the css class of the icon (if any)
         - ?items: only if this is a group (i.e. containing at least two items).
                 An array of children items (recursively).
    
    - 1: ...
    
    



Methods
==============

- [ToolbarRendererWidget::__construct](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/__construct.md) &ndash; Builds the ToolbarRendererWidget instance.
- [ToolbarRendererWidget::render](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/ToolbarRendererWidget/render.md) &ndash; Prints the widget html.





Location
=============
Ling\Bootstrap4AdminTable\RendererWidget\ToolbarRendererWidget<br>
See the source code of [Ling\Bootstrap4AdminTable\RendererWidget\ToolbarRendererWidget](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/RendererWidget/ToolbarRendererWidget.php)



SeeAlso
==============
Previous class: [RendererWidgetInterface](https://github.com/lingtalfi/Bootstrap4AdminTable/blob/master/doc/api/Ling/Bootstrap4AdminTable/RendererWidget/RendererWidgetInterface.md)<br>
