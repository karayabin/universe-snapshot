[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\VoidHttpRequest class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md)


VoidHttpRequest::getFilesValue
================



VoidHttpRequest::getFilesValue — Returns the value corresponding to the given key in the $_FILES array attached with the request.




Description
================


public [VoidHttpRequest::getFilesValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFilesValue.md)(string $key, ?bool $throwEx = false) : mixed




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
See the source code for method [VoidHttpRequest::getFilesValue](https://github.com/lingtalfi/Light/blob/master/Http/VoidHttpRequest.php#L166-L169)


See Also
================

The [VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md) class.

Previous method: [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFiles.md)<br>Next method: [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookie.md)<br>

