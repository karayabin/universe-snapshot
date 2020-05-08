[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)


HttpResponse::addHeader
================



HttpResponse::addHeader — Adds an header to the response, with the given name and value.




Description
================


public [HttpResponse::addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/addHeader.md)(string $name, string $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Adds an header to the response, with the given name and value.
This will not replace any header with the same name, but rather append a new value to it.




Parameters
================


- name

    

- value

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [HttpResponse::addHeader](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php#L210-L218)


See Also
================

The [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) class.

Previous method: [setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md)<br>Next method: [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeader.md)<br>

