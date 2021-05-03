[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)



The WidgetHandlerInterface class
================
2019-04-24 --> 2021-04-09






Introduction
============

The WidgetHandlerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">WidgetHandlerInterface</span>  {

- Methods
    - abstract public [process](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/process.md)(array &$widgetConf, array $debug) : void
    - abstract public [render](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/render.md)(array $widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot, array $debug) : string

}






Methods
==============

- [WidgetHandlerInterface::process](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/process.md) &ndash; Process the widget.
- [WidgetHandlerInterface::render](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetHandler/WidgetHandlerInterface/render.md) &ndash; Returns the html code of the widget, according to the widget configuration.





Location
=============
Ling\Kit\WidgetHandler\WidgetHandlerInterface<br>
See the source code of [Ling\Kit\WidgetHandler\WidgetHandlerInterface](https://github.com/lingtalfi/Kit/blob/master/WidgetHandler/WidgetHandlerInterface.php)



SeeAlso
==============
Previous class: [WidgetConfDecoratorInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/WidgetConfDecorator/WidgetConfDecoratorInterface.md)<br>
