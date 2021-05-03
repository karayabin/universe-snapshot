[Back to the Ling/Kit_PrototypeWidget api](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget.md)<br>
[Back to the Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler class](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md)


PrototypeWidgetHandler::process
================



PrototypeWidgetHandler::process — Process the widget.




Description
================


public [PrototypeWidgetHandler::process](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/process.md)(array &$widgetConf, array $debug) : void




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
See the source code for method [PrototypeWidgetHandler::process](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/WidgetHandler/PrototypeWidgetHandler.php#L87-L90)


See Also
================

The [PrototypeWidgetHandler](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler.md) class.

Previous method: [setRootDir](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/setRootDir.md)<br>Next method: [render](https://github.com/lingtalfi/Kit_PrototypeWidget/blob/master/doc/api/Ling/Kit_PrototypeWidget/WidgetHandler/PrototypeWidgetHandler/render.md)<br>

