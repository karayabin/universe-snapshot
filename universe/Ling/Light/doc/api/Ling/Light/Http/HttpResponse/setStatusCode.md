[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponse class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)


HttpResponse::setStatusCode
================



HttpResponse::setStatusCode — Set the status code for this response.




Description
================


public [HttpResponse::setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setStatusCode.md)(int $code, ?string $text = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Set the status code for this response.

Optionally, the status text can be provided (otherwise it will be guessed by default from the given status code).




Parameters
================


- code

    

- text

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).








Source Code
===========
See the source code for method [HttpResponse::setStatusCode](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php#L246-L251)


See Also
================

The [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) class.

Previous method: [getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeaders.md)<br>Next method: [getStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getStatusCode.md)<br>

