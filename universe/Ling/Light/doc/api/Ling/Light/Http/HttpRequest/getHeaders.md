[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md)


HttpRequest::getHeaders
================



HttpRequest::getHeaders — Returns an array of the http headers attached to the http request.




Description
================


public [HttpRequest::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeaders.md)() : array




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
See the source code for method [HttpRequest::getHeaders](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequest.php#L310-L313)


See Also
================

The [HttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md) class.

Previous method: [getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getReferer.md)<br>Next method: [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeader.md)<br>

