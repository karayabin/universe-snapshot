[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponseInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)


HttpResponseInterface::setHeader
================



HttpResponseInterface::setHeader — Sets a header to this instance.




Description
================


abstract public [HttpResponseInterface::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHeader.md)(string $name, $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Sets a header to this instance.
This will replace any header with the same name.

The value must be a string or an array of strings (not recursive).




Parameters
================


- name

    

- value

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [HttpResponseInterface::setHeader](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php#L42-L42)


See Also
================

The [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) class.

Previous method: [getBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getBody.md)<br>Next method: [addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/addHeader.md)<br>

