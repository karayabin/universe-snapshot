[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequestInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)


HttpRequestInterface::getFilesValue
================



HttpRequestInterface::getFilesValue — Returns the value corresponding to the given key in the $_FILES array attached with the request.




Description
================


abstract public [HttpRequestInterface::getFilesValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getFilesValue.md)(string $key, ?bool $throwEx = false) : mixed




Returns the value corresponding to the given key in the $_FILES array attached with the request.
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
See the source code for method [HttpRequestInterface::getFilesValue](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequestInterface.php#L185-L185)


See Also
================

The [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) class.

Previous method: [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getFiles.md)<br>Next method: [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getCookie.md)<br>

