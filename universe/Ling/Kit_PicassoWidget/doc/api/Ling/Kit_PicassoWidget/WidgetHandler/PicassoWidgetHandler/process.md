[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)<br>
[Back to the Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler class](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md)


PicassoWidgetHandler::process
================



PicassoWidgetHandler::process — Process the widget.




Description
================


public [PicassoWidgetHandler::process](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/process.md)(array &$widgetConf, array $debug) : void




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
See the source code for method [PicassoWidgetHandler::process](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/WidgetHandler/PicassoWidgetHandler.php#L163-L186)


See Also
================

The [PicassoWidgetHandler](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler.md) class.

Previous method: [setWidgetBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/setWidgetBaseDir.md)<br>Next method: [render](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/WidgetHandler/PicassoWidgetHandler/render.md)<br>

