[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpAttachmentResponse class
================
2019-04-09 --> 2020-04-17






Introduction
============

The HttpAttachmentResponse class.



Class synopsis
==============


class <span class="pl-k">HttpAttachmentResponse</span> extends [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) implements [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) {

- Properties
    - protected string [$filename](#property-filename) ;

- Inherited properties
    - protected string [HttpResponse::$body](#property-body) ;
    - protected int [HttpResponse::$statusCode](#property-statusCode) ;
    - protected string [HttpResponse::$statusText](#property-statusText) ;
    - protected int [HttpResponse::$httpVersion](#property-httpVersion) ;
    - protected string|null [HttpResponse::$mimeType](#property-mimeType) ;
    - protected string|null [HttpResponse::$fileName](#property-fileName) ;
    - protected array [HttpResponse::$headers](#property-headers) ;

- Methods
    - public static [create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/create.md)(string $path, ?string $filename = null) : [HttpAttachmentResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse.md)
    - public [setFile](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/setFile.md)(string $path, ?string $filename = null) : void
    - protected [sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/sendHeaders.md)() : void

- Inherited methods
    - public [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md)(?$body = , ?$code = 200) : void
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
    - private [HttpResponse::getNormalizedKey](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getNormalizedKey.md)(string $key) : string

}




Properties
=============

- <span id="property-filename"><b>filename</b></span>

    This property holds the filename to suggest to the browser.
    
    Note: this is a suggestion that most browsers consider, but not an official feature.
    https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Disposition
    
    

- <span id="property-body"><b>body</b></span>

    This property holds the body of the http response.
    
    

- <span id="property-statusCode"><b>statusCode</b></span>

    This property holds the status code of the http response.
    
    

- <span id="property-statusText"><b>statusText</b></span>

    The text message accompanying the status code.
    
    The null value means use the default text (see array above).
    
    

- <span id="property-httpVersion"><b>httpVersion</b></span>

    This property holds the http version of the http response.
    
    

- <span id="property-mimeType"><b>mimeType</b></span>

    This property holds the mimeType for this instance.
    If set, the Content-type header will be sent, otherwise it won't.
    
    

- <span id="property-fileName"><b>fileName</b></span>

    This property holds the fileName for this instance.
    
    You generally want to use this when your body is a file content
    that you intend to serve to the user, and you want to override the default fileName provided by the browser.
    
    If null, the browser fileName will not be overridden.
    
    

- <span id="property-headers"><b>headers</b></span>

    This property holds the headers for this instance.
    
    



Methods
==============

- [HttpAttachmentResponse::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/create.md) &ndash; Creates and returns the http attachment response instance.
- [HttpAttachmentResponse::setFile](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/setFile.md) &ndash; Sets the file and optionally filename for this attachment.
- [HttpAttachmentResponse::sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/sendHeaders.md) &ndash; Sends the http headers of the http response.
- [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md) &ndash; Builds the HttpResponse instance.
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
- [HttpResponse::getNormalizedKey](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/getNormalizedKey.md) &ndash; Returns a normalized name for the given header name.





Location
=============
Ling\Light\Http\HttpAttachmentResponse<br>
See the source code of [Ling\Light\Http\HttpAttachmentResponse](https://github.com/lingtalfi/Light/blob/master/Http/HttpAttachmentResponse.php)



SeeAlso
==============
Previous class: [ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md)<br>Next class: [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)<br>
