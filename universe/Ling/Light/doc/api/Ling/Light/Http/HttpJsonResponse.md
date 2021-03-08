[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpJsonResponse class
================
2019-04-09 --> 2021-03-05






Introduction
============

The HttpJsonResponse class.



Class synopsis
==============


class <span class="pl-k">HttpJsonResponse</span> extends [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) implements [\Stringable](https://wiki.php.net/rfc/stringable), [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) {

- Inherited properties
    - protected string [HttpResponse::$body](#property-body) ;
    - protected int [HttpResponse::$statusCode](#property-statusCode) ;
    - protected string [HttpResponse::$statusText](#property-statusText) ;
    - protected int [HttpResponse::$httpVersion](#property-httpVersion) ;
    - protected string|null [HttpResponse::$mimeType](#property-mimeType) ;
    - protected string|null [HttpResponse::$fileName](#property-fileName) ;
    - protected array [HttpResponse::$headers](#property-headers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/__construct.md)(?$body = , ?$code = 200) : void
    - public static [create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/create.md)($data) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)
    - protected [sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/sendHeaders.md)() : void

- Inherited methods
    - public [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md)() : void
    - public [HttpResponse::getBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getBody.md)() : [LightStreamInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Stream/LightStreamInterface.md)
    - public [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md)(string $name, $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [HttpResponse::addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/addHeader.md)(string $name, string $value) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [HttpResponse::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeader.md)(string $name) : array | null
    - public [HttpResponse::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeaders.md)() : array
    - public [HttpResponse::setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setStatusCode.md)(int $code, ?string $text = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [HttpResponse::getStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getStatusCode.md)() : int
    - public [HttpResponse::getStatusText](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getStatusText.md)() : string
    - public [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md)(string $httpVersion) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [HttpResponse::getHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHttpVersion.md)() : string
    - public [HttpResponse::setContentType](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setContentType.md)(string $mimeType) : void
    - public [HttpResponse::__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__toString.md)() : string
    - protected [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md)() : void

}






Methods
==============

- [HttpJsonResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/__construct.md) &ndash; Builds the HttpResponse instance.
- [HttpJsonResponse::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/create.md) &ndash; Creates and returns the http json response instance.
- [HttpJsonResponse::sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/sendHeaders.md) &ndash; Sends the http headers of the http response.
- [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md) &ndash; Sends the headers and prints the response body to the output.
- [HttpResponse::getBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getBody.md) &ndash; Returns the body as a stream.
- [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md) &ndash; Sets a header to this instance.
- [HttpResponse::addHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/addHeader.md) &ndash; Adds an header to the response, with the given name and value.
- [HttpResponse::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeader.md) &ndash; Returns the array of headers with the given name.
- [HttpResponse::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHeaders.md) &ndash; Returns an array of headerName => headerValues.
- [HttpResponse::setStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setStatusCode.md) &ndash; Set the status code for this response.
- [HttpResponse::getStatusCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getStatusCode.md) &ndash; 
- [HttpResponse::getStatusText](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getStatusText.md) &ndash; Returns the status text attached to this response.
- [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md) &ndash; Sets the http version for the response.
- [HttpResponse::getHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getHttpVersion.md) &ndash; Returns the http version used by this response.
- [HttpResponse::setContentType](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setContentType.md) &ndash; Shortcut to set the value of the Content-type header.
- [HttpResponse::__toString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__toString.md) &ndash; Returns the response as a string.
- [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md) &ndash; Displays the body of the http response.





Location
=============
Ling\Light\Http\HttpJsonResponse<br>
See the source code of [Ling\Light\Http\HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/Http/HttpJsonResponse.php)



SeeAlso
==============
Previous class: [HttpAttachmentResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse.md)<br>Next class: [HttpRedirectResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRedirectResponse.md)<br>
