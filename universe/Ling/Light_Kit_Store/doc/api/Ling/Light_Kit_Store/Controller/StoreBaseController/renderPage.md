[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\StoreBaseController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController.md)


StoreBaseController::renderPage
================



StoreBaseController::renderPage — Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).




Description
================


public [StoreBaseController::renderPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/renderPage.md)(string $page, ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
Options are directly forwarded to [the LightKitPageRenderer->renderPage method](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md).




Parameters
================


- page

    

- options

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [StoreBaseController::renderPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreBaseController.php#L35-L67)


See Also
================

The [StoreBaseController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController.md) class.

Next method: [getLink](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getLink.md)<br>

