[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\StoreApiController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md)


StoreApiController::updateBillingInfo
================



StoreApiController::updateBillingInfo — Updates the billing info of the connected user.




Description
================


private [StoreApiController::updateBillingInfo](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/updateBillingInfo.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)




Updates the billing info of the connected user.

This is an [alcp service](https://github.com/lingtalfi/TheBar/blob/master/discussions/alcp-service.md).


Expected parameters are:

- company
- first_name
- last_name
- address
- zip_postal_code
- city
- state_province_region
- country
- phone

All values are set to an empty string by default.

If the user is not connected, this alcp service returns an erroneous response.

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
See the source code for method [StoreApiController::updateBillingInfo](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreApiController.php#L264-L332)


See Also
================

The [StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md) class.

Previous method: [changePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/changePassword.md)<br>Next method: [registerWebsite](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/registerWebsite.md)<br>

