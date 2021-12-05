[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequestInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)


HttpRequestInterface::getCookieValue
================



HttpRequestInterface::getCookieValue — Returns the value corresponding to the given key in the $_COOKIE array attached with the request.




Description
================


abstract public [HttpRequestInterface::getCookieValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getCookieValue.md)(string $key, ?bool $throwEx = false) : mixed




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
See the source code for method [HttpRequestInterface::getCookieValue](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequestInterface.php#L205-L205)


See Also
================

The [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) class.

Previous method: [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getCookie.md)<br>

