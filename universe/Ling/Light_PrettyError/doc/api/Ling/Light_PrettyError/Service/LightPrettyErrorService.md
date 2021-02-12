[Back to the Ling/Light_PrettyError api](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError.md)



The LightPrettyErrorService class
================
2019-04-05 --> 2020-12-08






Introduction
============

The LightPrettyErrorService class.



Class synopsis
==============


class <span class="pl-k">LightPrettyErrorService</span>  {

- Methods
    - public [renderPage](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/renderPage.md)([\Exception](http://php.net/manual/en/class.exception.php) $e) : string
    - public [onLightExceptionCaught](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/onLightExceptionCaught.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void

}






Methods
==============

- [LightPrettyErrorService::renderPage](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/renderPage.md) &ndash; Returns the html code for a beautiful error page showing the exception.
- [LightPrettyErrorService::onLightExceptionCaught](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Service/LightPrettyErrorService/onLightExceptionCaught.md) &ndash; This method is a callable to execute when the [Light.on_exception_caught event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md) is triggered.





Location
=============
Ling\Light_PrettyError\Service\LightPrettyErrorService<br>
See the source code of [Ling\Light_PrettyError\Service\LightPrettyErrorService](https://github.com/lingtalfi/Light_PrettyError/blob/master/Service/LightPrettyErrorService.php)



SeeAlso
==============
Previous class: [LightPrettyErrorException](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Exception/LightPrettyErrorException.md)<br>
