[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponseInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)


HttpResponseInterface::getHeaders
================



HttpResponseInterface::getHeaders — Returns an array of headerName => headerValues.




Description
================


abstract public [HttpResponseInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeaders.md)() : array




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
See the source code for method [HttpResponseInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php#L74-L74)


See Also
================

The [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) class.

Previous method: [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeader.md)<br>Next method: [setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setStatusCode.md)<br>

