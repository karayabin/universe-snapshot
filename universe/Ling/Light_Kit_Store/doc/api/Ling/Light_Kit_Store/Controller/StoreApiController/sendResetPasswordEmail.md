[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\StoreApiController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md)


StoreApiController::sendResetPasswordEmail
================



StoreApiController::sendResetPasswordEmail — Sends an email to the user, which contains a link to reset his/her password.




Description
================


private [StoreApiController::sendResetPasswordEmail](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/sendResetPasswordEmail.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)




Sends an email to the user, which contains a link to reset his/her password.

See the [Light_Kit_Store conception notes](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/pages/conception-notes.md) for more details.


This is a [alcp service](https://github.com/lingtalfi/TheBar/blob/master/discussions/alcp-service.md).


Expected request parameters:

- email

Possible errors:

- x field missing
- unknown email




Parameters
================


- request

    


Return values
================

Returns [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md).








Source Code
===========
See the source code for method [StoreApiController::sendResetPasswordEmail](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreApiController.php#L729-L823)


See Also
================

The [StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md) class.

Previous method: [signIn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/signIn.md)<br>

