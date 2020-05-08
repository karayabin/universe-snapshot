[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponseInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)


HttpResponseInterface::addHeader
================



HttpResponseInterface::addHeader — Adds an header to the response, with the given name and value.




Description
================


abstract public [HttpResponseInterface::addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/addHeader.md)(string $name, string $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




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
See the source code for method [HttpResponseInterface::addHeader](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php#L53-L53)


See Also
================

The [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) class.

Previous method: [setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHeader.md)<br>Next method: [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeader.md)<br>

