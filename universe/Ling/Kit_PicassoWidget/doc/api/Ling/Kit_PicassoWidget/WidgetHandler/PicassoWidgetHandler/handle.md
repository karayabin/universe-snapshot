[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)<br>
[Back to the Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler class](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md)


PicassoWidgetHandler::handle
================



PicassoWidgetHandler::handle — Returns the html code of the widget, according to the widget configuration.




Description
================


public [PicassoWidgetHandler::handle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/handle.md)(array $widgetConf, Ling\HtmlPageTools\Copilot\HtmlPageCopilot $copilot, array $debug) : string




Returns the html code of the widget, according to the widget configuration.
If the widget uses some assets, or use some js code block, it also registers them to the given copilot.

For more info about the copilot, see the [HtmlPageCopilot documentation](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md).

If something goes wrong, the widget should throw an exception.

The debug array can help creating useful error messages.
It's an array containing the following entries:

- page: the page label of the page containing the widget
- zone: the name of the zone containing the widget




Parameters
================


- widgetConf

    

- copilot

    

- debug

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







See Also
================

The [PicassoWidgetHandler](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md) class.

Next method: [error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/error.md)<br>

