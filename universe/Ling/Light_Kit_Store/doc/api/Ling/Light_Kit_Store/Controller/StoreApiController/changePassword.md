[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\StoreApiController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md)


StoreApiController::changePassword
================



StoreApiController::changePassword — Updates the password of the connected user.




Description
================


private [StoreApiController::changePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/changePassword.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)




Updates the password of the connected user.

This is an [alcp service](https://github.com/lingtalfi/TheBar/blob/master/discussions/alcp-service.md).


Expected parameters are:

- password
- password_confirm

If those two are given and match, then the password of the connected user will be updated.

If the user is not connected, this alcp service returns an erroneous response.


The password cannot be empty.

The password is trimmed.

In case of success, a "message" property contains the success message.




Parameters
================


- request

    


Return values
================

Returns [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [StoreApiController::changePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreApiController.php#L165-L231)


See Also
================

The [StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md) class.

Previous method: [disconnect](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/disconnect.md)<br>Next method: [updateBillingInfo](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/updateBillingInfo.md)<br>

