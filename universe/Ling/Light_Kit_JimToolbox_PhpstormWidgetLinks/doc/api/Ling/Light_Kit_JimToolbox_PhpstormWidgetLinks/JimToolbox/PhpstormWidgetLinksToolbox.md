[Back to the Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks api](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks.md)



The PhpstormWidgetLinksToolbox class
================
2021-07-08 --> 2021-08-03






Introduction
============

The PhpstormWidgetLinksToolbox class.



Class synopsis
==============


class <span class="pl-k">PhpstormWidgetLinksToolbox</span> extends [JimToolboxItemBaseHandler](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [JimToolboxItemHandlerInterface](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [JimToolboxItemBaseHandler::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/__construct.md)() : void
    - public [getPaneBody](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getPaneBody.md)(array $params) : string
    - public [getPaneTitle](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getPaneTitle.md)() : string
    - protected [getKitConf](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getKitConf.md)(string $uri, ?string &$file = null) : array
    - private [error](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/error.md)(string $msg, ?int $code = null) : void
    - private [getControllerInfoByControllerString](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getControllerInfoByControllerString.md)(string $controllerString) : array

- Inherited methods
    - public JimToolboxItemBaseHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [PhpstormWidgetLinksToolbox::__construct](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/__construct.md) &ndash; Builds the JimToolboxItemBaseHandler instance.
- [PhpstormWidgetLinksToolbox::getPaneBody](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getPaneBody.md) &ndash; Returns the pane body.
- [PhpstormWidgetLinksToolbox::getPaneTitle](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getPaneTitle.md) &ndash; Returns the title or the pane.
- [PhpstormWidgetLinksToolbox::getKitConf](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getKitConf.md) &ndash; Returns the kit conf array for the given uri, and sets the file it came from (if any).
- [PhpstormWidgetLinksToolbox::error](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/error.md) &ndash; Throws an exception.
- [PhpstormWidgetLinksToolbox::getControllerInfoByControllerString](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/JimToolbox/PhpstormWidgetLinksToolbox/getControllerInfoByControllerString.md) &ndash; Returns an array of info about the controller identified by the given controller string.
- JimToolboxItemBaseHandler::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox\PhpstormWidgetLinksToolbox<br>
See the source code of [Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox\PhpstormWidgetLinksToolbox](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/JimToolbox/PhpstormWidgetLinksToolbox.php)



SeeAlso
==============
Previous class: [LightKitJimToolboxPhpstormWidgetLinksException](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/Exception/LightKitJimToolboxPhpstormWidgetLinksException.md)<br>Next class: [LightKitJimToolboxPhpstormWidgetLinksPlanetInstaller](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks/Light_PlanetInstaller/LightKitJimToolboxPhpstormWidgetLinksPlanetInstaller.md)<br>
