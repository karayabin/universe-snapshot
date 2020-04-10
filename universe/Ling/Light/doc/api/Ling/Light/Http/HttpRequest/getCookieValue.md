[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md)


HttpRequest::getCookieValue
================



HttpRequest::getCookieValue — Returns the value corresponding to the given key in the $_COOKIE array attached with the request.




Description
================


public [HttpRequest::getCookieValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getCookieValue.md)(string $key, ?bool $throwEx = true) : mixed




Returns the value corresponding to the given key in the $_COOKIE array attached with the request.
If such key was not found:

- if throwEx is true, an exception is thrown
- if throwEx is false, null is returned




Parameters
================


- key

    

- throwEx

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [HttpRequest::getCookieValue](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequest.php#L395-L404)


See Also
================

The [HttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md) class.

Previous method: [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getCookie.md)<br>

