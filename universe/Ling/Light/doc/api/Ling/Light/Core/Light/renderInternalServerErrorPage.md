[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::renderInternalServerErrorPage
================



Light::renderInternalServerErrorPage — it should display an internal server error page with code 500.




Description
================


protected [Light::renderInternalServerErrorPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderInternalServerErrorPage.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Displays the error page when an uncaught exception occurred and the debug mode is false:
it should display an internal server error page with code 500.

You should override this method if you want a more fancy display.

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================

This method has no parameters.


Return values
================

Returns string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [Light::renderInternalServerErrorPage](https://github.com/lingtalfi/Light/blob/master/Core/Light.php#L555-L561)


See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [renderDebugPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderDebugPage.md)<br>Next method: [getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getControllerArgs.md)<br>

