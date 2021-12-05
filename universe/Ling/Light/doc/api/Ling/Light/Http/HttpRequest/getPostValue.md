[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md)


HttpRequest::getPostValue
================



HttpRequest::getPostValue — Returns the value corresponding to the given key in the $_POST array attached with the request.




Description
================


public [HttpRequest::getPostValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPostValue.md)(string $key, ?bool $throwEx = false) : mixed




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
See the source code for method [HttpRequest::getPostValue](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequest.php#L357-L366)


See Also
================

The [HttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md) class.

Previous method: [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPost.md)<br>Next method: [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getFiles.md)<br>

