[Back to the Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks api](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks.md)<br>
[Back to the Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox\PhpstormWidgetLinksToolbox class](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox.md)


PhpstormWidgetLinksToolbox::getControllerInfoByControllerString
================



PhpstormWidgetLinksToolbox::getControllerInfoByControllerString — Returns an array of info about the controller identified by the given controller string.




Description
================


private [PhpstormWidgetLinksToolbox::getControllerInfoByControllerString](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getControllerInfoByControllerString.md)(string $controllerString) : array




Returns an array of info about the controller identified by the given controller string.

The returned array has the following structure:

- relPath: string, the relative path to the controller file (from the app root dir)
- shortName: string, the short name of the controller class


Example of controller string:

- Ling\Light_Kit_Store\Controller\Front\StoreSearchResultsController->render




Parameters
================


- controllerString

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [PhpstormWidgetLinksToolbox::getControllerInfoByControllerString](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/JimToolbox/PhpstormWidgetLinksToolbox.php#L143-L157)


See Also
================

The [PhpstormWidgetLinksToolbox](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox.md) class.

Previous method: [error](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/error.md)<br>

