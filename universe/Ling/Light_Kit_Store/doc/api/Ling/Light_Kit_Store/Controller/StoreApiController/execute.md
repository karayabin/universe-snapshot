[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\StoreApiController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md)


StoreApiController::execute
================



StoreApiController::execute — Executes the action given in the GET parameters and returns a response.




Description
================


public [StoreApiController::execute](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/execute.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Executes the action given in the GET parameters and returns a response.

The "action" parameter should be present in GET.

This is designed as a hub/proxy for all the other methods of this class.

It's basically the only method that we expose publicly.




Parameters
================


- request

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [StoreApiController::execute](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreApiController.php#L56-L104)


See Also
================

The [StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md) class.

Next method: [disconnect](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/disconnect.md)<br>

