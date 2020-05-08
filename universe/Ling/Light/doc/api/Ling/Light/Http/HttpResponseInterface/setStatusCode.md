[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Http\HttpResponseInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)


HttpResponseInterface::setStatusCode
================



HttpResponseInterface::setStatusCode — Set the status code for this response.




Description
================


abstract public [HttpResponseInterface::setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setStatusCode.md)(int $code, ?string $text = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




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
See the source code for method [HttpResponseInterface::setStatusCode](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php#L87-L87)


See Also
================

The [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) class.

Previous method: [getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeaders.md)<br>Next method: [getStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getStatusCode.md)<br>

