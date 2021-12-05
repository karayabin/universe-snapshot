[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\VoidHttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md)


VoidHttpRequest::getGetValue
================



VoidHttpRequest::getGetValue — Returns the value corresponding to the given key in the $_GET array attached with the request.




Description
================


public [VoidHttpRequest::getGetValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getGetValue.md)(string $key, ?bool $throwEx = false) : mixed




Returns the value corresponding to the given key in the $_GET array attached with the request.
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
See the source code for method [VoidHttpRequest::getGetValue](https://github.com/lingtalfi/Light/blob/master/Http/VoidHttpRequest.php#L132-L135)


See Also
================

The [VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md) class.

Previous method: [getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getGet.md)<br>Next method: [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPost.md)<br>

