[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\StoreApiController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md)


StoreApiController::signUp
================



StoreApiController::signUp — Signs up a new user.




Description
================


private [StoreApiController::signUp](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/signUp.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)




Signs up a new user.
This method can be called via ajax from a client website.

See the [Light_Kit_Store conception notes](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/pages/conception-notes.md) for more details.

The response is an basic [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/alcp-response.md).


Note that we use the google recaptcha v3 system.


The expected parameters for the request are:

- email
- password
- password_confirm
- g-recaptcha-response




Parameters
================


- request

    


Return values
================

Returns [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md).








Source Code
===========
See the source code for method [StoreApiController::signUp](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreApiController.php#L384-L577)


See Also
================

The [StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md) class.

Previous method: [registerWebsite](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/registerWebsite.md)<br>Next method: [signIn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/signIn.md)<br>

