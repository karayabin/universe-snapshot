[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget.md)


LightKitAdminChloroformWidget::prepare
================



LightKitAdminChloroformWidget::prepare — Prepares the widget according to the given widget configuration.




Description
================


public [LightKitAdminChloroformWidget::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget/prepare.md)(array &$widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void




Prepares the widget according to the given widget configuration.

Sometimes, you want the user (via the widget conf) to be able to activate
or de-activate some js features, and so basically depending on the widget conf, you will
act on the copilot instance.
This is the original use case why this method was created.


A second use case is that you want to transform the widget configuration, for instance
to allow the user to use a custom notation.
For instance, when the user types $year, it converts automatically to the current year.
The prepare method is a good place to do just that.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- widgetConf

    

- copilot

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightKitAdminChloroformWidget::prepare](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Widget/Picasso/LightKitAdminChloroformWidget.php#L87-L96)


See Also
================

The [LightKitAdminChloroformWidget](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget.md) class.



