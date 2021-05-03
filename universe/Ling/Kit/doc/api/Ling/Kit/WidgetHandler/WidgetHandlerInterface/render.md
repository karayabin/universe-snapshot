[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)<br>
[Back to the Ling\Kit\WidgetHandler\WidgetHandlerInterface class](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md)


WidgetHandlerInterface::render
================



WidgetHandlerInterface::render — Returns the html code of the widget, according to the widget configuration.




Description
================


abstract public [WidgetHandlerInterface::render](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/render.md)(array $widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, array $debug) : string




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
See the source code for method [WidgetHandlerInterface::render](https://github.com/lingtalfi/Kit/blob/master/WidgetHandler/WidgetHandlerInterface.php#L62-L62)


See Also
================

The [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) class.

Previous method: [process](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/process.md)<br>

