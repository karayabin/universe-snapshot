[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\VoidHttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md)


VoidHttpRequest::getCookieValue
================



VoidHttpRequest::getCookieValue — Returns the value corresponding to the given key in the $_COOKIE array attached with the request.




Description
================


public [VoidHttpRequest::getCookieValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookieValue.md)(string $key, ?bool $throwEx = false) : mixed




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
See the source code for method [VoidHttpRequest::getCookieValue](https://github.com/lingtalfi/Light/blob/master/Http/VoidHttpRequest.php#L183-L186)


See Also
================

The [VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md) class.

Previous method: [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookie.md)<br>

