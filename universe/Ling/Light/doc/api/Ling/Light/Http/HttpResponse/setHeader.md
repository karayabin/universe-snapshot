[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)


HttpResponse::setHeader
================



HttpResponse::setHeader — Sets a header to this instance.




Description
================


public [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md)(string $name, $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




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
See the source code for method [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php#L198-L205)


See Also
================

The [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) class.

Previous method: [getBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getBody.md)<br>Next method: [addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/addHeader.md)<br>

