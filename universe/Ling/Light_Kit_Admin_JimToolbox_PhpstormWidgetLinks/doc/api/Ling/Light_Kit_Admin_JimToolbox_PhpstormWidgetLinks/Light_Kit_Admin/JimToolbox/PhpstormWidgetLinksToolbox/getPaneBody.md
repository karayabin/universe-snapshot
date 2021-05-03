[Back to the Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks api](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks.md)<br>
[Back to the Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_Kit_Admin\JimToolbox\PhpstormWidgetLinksToolbox class](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_Kit_Admin/JimToolbox/PhpstormWidgetLinksToolbox.md)


PhpstormWidgetLinksToolbox::getPaneBody
================



PhpstormWidgetLinksToolbox::getPaneBody — Returns the pane body.




Description
================


public [PhpstormWidgetLinksToolbox::getPaneBody](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_Kit_Admin/JimToolbox/PhpstormWidgetLinksToolbox/getPaneBody.md)(array $params) : string




Returns the pane body.



The parameters are basically the received $_GET params.

However some extra-parameters might be added depending on which method you use.


If you use the acp_class and current_uri $_GET parameters, then the extra-params are:

- currentUri: the current_uri you passed, which represents the main page uri (i.e. not the ajax uri)


Otherwise, there are no extra params.


This method throws exception to signal something wrong happened.




Parameters
================


- params

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PhpstormWidgetLinksToolbox::getPaneBody](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/Light_Kit_Admin/JimToolbox/PhpstormWidgetLinksToolbox.php#L32-L61)


See Also
================

The [PhpstormWidgetLinksToolbox](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_Kit_Admin/JimToolbox/PhpstormWidgetLinksToolbox.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_Kit_Admin/JimToolbox/PhpstormWidgetLinksToolbox/__construct.md)<br>Next method: [getPaneTitle](https://github.com/lingtalfi/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks/Light_Kit_Admin/JimToolbox/PhpstormWidgetLinksToolbox/getPaneTitle.md)<br>

