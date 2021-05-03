[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)<br>
[Back to the Ling\Kit\WidgetHandler\WidgetHandlerInterface class](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md)


WidgetHandlerInterface::process
================



WidgetHandlerInterface::process — Process the widget.




Description
================


abstract public [WidgetHandlerInterface::process](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/process.md)(array &$widgetConf, array $debug) : void




Process the widget.

This means:

- update the widget conf to make it more suitable for the rendering (optional)
- process the user input if necessary

The debug array can help creating useful error messages.
It's an array containing the following entries:

- page: the page label of the page containing the widget
- zone: the name of the zone containing the widget




Parameters
================


- widgetConf

    

- debug

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [WidgetHandlerInterface::process](https://github.com/lingtalfi/Kit/blob/master/WidgetHandler/WidgetHandlerInterface.php#L36-L36)


See Also
================

The [WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface.md) class.

Next method: [render](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/render.md)<br>

