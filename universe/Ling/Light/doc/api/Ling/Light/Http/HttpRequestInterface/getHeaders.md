[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequestInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)


HttpRequestInterface::getHeaders
================



HttpRequestInterface::getHeaders — Returns an array of the http headers attached to the http request.




Description
================


abstract public [HttpRequestInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeaders.md)() : array




Returns an array of the http headers attached to the http request.
Each header is a key/value pair, the key follows the following naming convention: all lowercase,
using dash instead of underscores.

For instance:
- user-agent
- accept-encoding
- ...




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [HttpRequestInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequestInterface.php#L113-L113)


See Also
================

The [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) class.

Previous method: [getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getReferer.md)<br>Next method: [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeader.md)<br>

