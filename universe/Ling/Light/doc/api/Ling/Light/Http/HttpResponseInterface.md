[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpResponseInterface class
================
2019-04-09 --> 2021-03-05






Introduction
============

The HttpResponseInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">HttpResponseInterface</span>  {

- Methods
    - abstract public [send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/send.md)() : void
    - abstract public [getBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getBody.md)() : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - abstract public [setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHeader.md)(string $name, $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - abstract public [addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/addHeader.md)(string $name, string $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - abstract public [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeader.md)(string $name) : array | null
    - abstract public [getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeaders.md)() : array
    - abstract public [setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setStatusCode.md)(int $code, ?string $text = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - abstract public [getStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getStatusCode.md)() : int
    - abstract public [getStatusText](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getStatusText.md)() : string
    - abstract public [setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHttpVersion.md)(string $httpVersion) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - abstract public [getHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHttpVersion.md)() : string

}






Methods
==============

- [HttpResponseInterface::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/send.md) &ndash; Sends the headers and prints the response body to the output.
- [HttpResponseInterface::getBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getBody.md) &ndash; Returns the body as a stream.
- [HttpResponseInterface::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHeader.md) &ndash; Sets a header to this instance.
- [HttpResponseInterface::addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/addHeader.md) &ndash; Adds an header to the response, with the given name and value.
- [HttpResponseInterface::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeader.md) &ndash; Returns the array of headers with the given name.
- [HttpResponseInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHeaders.md) &ndash; Returns an array of headerName => headerValues.
- [HttpResponseInterface::setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setStatusCode.md) &ndash; Set the status code for this response.
- [HttpResponseInterface::getStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getStatusCode.md) &ndash; 
- [HttpResponseInterface::getStatusText](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getStatusText.md) &ndash; Returns the status text attached to this response.
- [HttpResponseInterface::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/setHttpVersion.md) &ndash; Sets the http version for the response.
- [HttpResponseInterface::getHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/getHttpVersion.md) &ndash; Returns the http version used by this response.





Location
=============
Ling\Light\Http\HttpResponseInterface<br>
See the source code of [Ling\Light\Http\HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php)



SeeAlso
==============
Previous class: [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md)<br>Next class: [VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md)<br>
