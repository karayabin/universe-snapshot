[Back to the Ling/Kit_PrototypeWidget api](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget.md)<br>
[Back to the Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler class](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md)


PrototypeWidgetHandler::render
================



PrototypeWidgetHandler::render — Returns the html code of the widget, according to the widget configuration.




Description
================


public [PrototypeWidgetHandler::render](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/render.md)(array $widgetConf, Ling\HtmlPageTools\Copilot\HtmlPageCopilot $copilot, array $debug) : string




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







Source Code
===========
See the source code for method [PrototypeWidgetHandler::render](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/WidgetHandler/PrototypeWidgetHandler.php#L96-L115)


See Also
================

The [PrototypeWidgetHandler](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md) class.

Previous method: [process](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/process.md)<br>Next method: [error](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/error.md)<br>

