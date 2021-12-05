[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Controller\LkeWebsiteController class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Controller/LkeWebsiteController.md)


LkeWebsiteController::render
================



LkeWebsiteController::render — Renders a website page.




Description
================


public [LkeWebsiteController::render](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Controller/LkeWebsiteController/render.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Renders a website page.
The expected parameters in the request.GET are:

- website_id: the website identifier
- page_id: the page identifier




Parameters
================


- request

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [LkeWebsiteController::render](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Controller/LkeWebsiteController.php#L30-L50)


See Also
================

The [LkeWebsiteController](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Controller/LkeWebsiteController.md) class.



