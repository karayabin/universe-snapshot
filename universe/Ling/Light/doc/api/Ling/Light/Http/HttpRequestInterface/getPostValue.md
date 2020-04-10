[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequestInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)


HttpRequestInterface::getPostValue
================



HttpRequestInterface::getPostValue — Returns the value corresponding to the given key in the $_POST array attached with the request.




Description
================


abstract public [HttpRequestInterface::getPostValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPostValue.md)(string $key, ?bool $throwEx = true) : mixed




Returns the value corresponding to the given key in the $_POST array attached with the request.
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
See the source code for method [HttpRequestInterface::getPostValue](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequestInterface.php#L163-L163)


See Also
================

The [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) class.

Previous method: [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPost.md)<br>Next method: [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getFiles.md)<br>

