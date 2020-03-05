[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpAttachmentResponse class
================
2019-04-09 --> 2020-02-24






Introduction
============

The HttpAttachmentResponse class.



Class synopsis
==============


class <span class="pl-k">HttpAttachmentResponse</span> extends [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) implements [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) {

- Properties
    - protected string [$file](#property-file) ;
    - protected string [$filename](#property-filename) ;

- Inherited properties
    - protected string [HttpResponse::$body](#property-body) ;
    - protected int [HttpResponse::$statusCode](#property-statusCode) ;
    - protected int [HttpResponse::$httpVersion](#property-httpVersion) ;
    - protected string|null [HttpResponse::$mimeType](#property-mimeType) ;
    - protected string|null [HttpResponse::$fileName](#property-fileName) ;
    - protected array [HttpResponse::$headers](#property-headers) ;

- Methods
    - public static [create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/create.md)(string $file, ?string $filename = null) : [HttpAttachmentResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse.md)
    - protected [sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/sendHeaders.md)() : void

- Inherited methods
    - public [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md)(?$body = , ?$code = 200) : void
    - public [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md)(string $version) : void
    - public [HttpResponse::setMimeType](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setMimeType.md)(string $mimeType) : void
    - public [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md)(string $name, string $value, ?bool $replace = true) : void
    - public [HttpResponse::setFileName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setFileName.md)(string $fileName) : void
    - public [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md)() : void
    - protected [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md)() : void

}




Properties
=============

- <span id="property-file"><b>file</b></span>

    This property holds the file path for this instance.
    
    

- <span id="property-filename"><b>filename</b></span>

    This property holds the filename to suggest to the browser.
    
    Note: this is a suggestion that most browsers consider, but not an official feature.
    https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Disposition
    
    

- <span id="property-body"><b>body</b></span>

    This property holds the body of the http response.
    
    

- <span id="property-statusCode"><b>statusCode</b></span>

    This property holds the status code of the http response.
    
    

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
- [HttpAttachmentResponse::sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpAttachmentResponse/sendHeaders.md) &ndash; Sends the http headers of the http response.
- [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md) &ndash; Builds the HttpResponse instance.
- [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md) &ndash; Sets the http version of this http response.
- [HttpResponse::setMimeType](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setMimeType.md) &ndash; Sets the mimeType.
- [HttpResponse::setHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHeader.md) &ndash; Adds a header to this instance.
- [HttpResponse::setFileName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setFileName.md) &ndash; Sets the fileName.
- [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md) &ndash; Sends the headers and prints the response body to the output.
- [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md) &ndash; Displays the body of the http response.





Location
=============
Ling\Light\Http\HttpAttachmentResponse<br>
See the source code of [Ling\Light\Http\HttpAttachmentResponse](https://github.com/lingtalfi/Light/blob/master/Http/HttpAttachmentResponse.php)



SeeAlso
==============
Previous class: [ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md)<br>Next class: [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)<br>
