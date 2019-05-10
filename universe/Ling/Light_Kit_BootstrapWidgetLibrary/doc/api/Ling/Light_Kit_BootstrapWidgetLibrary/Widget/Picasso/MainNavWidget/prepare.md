[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)<br>
[Back to the Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MainNavWidget class](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/MainNavWidget.md)


MainNavWidget::prepare
================



MainNavWidget::prepare — Prepares the widget according to the given widget configuration.




Description
================


public [MainNavWidget::prepare](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/MainNavWidget/prepare.md)(array $widgetConf, Ling\HtmlPageTools\Copilot\HtmlPageCopilot $copilot) : void




Prepares the widget according to the given widget configuration.

Sometimes, you want the user (via the widget conf) to be able to activate
or de-activate some js features. This is the original use case why this
method was created.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- widgetConf

    

- copilot

    


Return values
================

Returns void.








See Also
================

The [MainNavWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/MainNavWidget.md) class.



