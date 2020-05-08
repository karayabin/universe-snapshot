[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)


HttpResponse::getHeaders
================



HttpResponse::getHeaders — Returns an array of headerName => headerValues.




Description
================


public [HttpResponse::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeaders.md)() : array




Returns an array of headerName => headerValues.

headerValues is an array of the (string) values stacked for this header.

Note: headerName might be normalized, since http headers are case insensitive.




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [HttpResponse::getHeaders](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php#L237-L240)


See Also
================

The [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) class.

Previous method: [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeader.md)<br>Next method: [setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setStatusCode.md)<br>

