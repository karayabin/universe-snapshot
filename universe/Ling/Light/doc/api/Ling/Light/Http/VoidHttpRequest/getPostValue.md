[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\VoidHttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md)


VoidHttpRequest::getPostValue
================



VoidHttpRequest::getPostValue — Returns the value corresponding to the given key in the $_POST array attached with the request.




Description
================


public [VoidHttpRequest::getPostValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPostValue.md)(string $key, ?bool $throwEx = true) : mixed




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
See the source code for method [VoidHttpRequest::getPostValue](https://github.com/lingtalfi/Light/blob/master/Http/VoidHttpRequest.php#L149-L152)


See Also
================

The [VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md) class.

Previous method: [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPost.md)<br>Next method: [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFiles.md)<br>

