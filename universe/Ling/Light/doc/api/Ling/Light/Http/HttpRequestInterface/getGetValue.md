[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequestInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)


HttpRequestInterface::getGetValue
================



HttpRequestInterface::getGetValue — Returns the value corresponding to the given key in the $_GET array attached with the request.




Description
================


abstract public [HttpRequestInterface::getGetValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getGetValue.md)(string $key, ?bool $throwEx = false) : mixed




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
See the source code for method [HttpRequestInterface::getGetValue](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequestInterface.php#L143-L143)


See Also
================

The [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) class.

Previous method: [getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getGet.md)<br>Next method: [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPost.md)<br>

