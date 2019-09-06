[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpJsonResponse class
================
2019-04-09 --> 2019-09-03






Introduction
============

The HttpJsonResponse class.



Class synopsis
==============


class <span class="pl-k">HttpJsonResponse</span> extends [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) implements [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) {

- Inherited properties
    - protected string [HttpResponse::$body](#property-body) ;
    - protected int [HttpResponse::$statusCode](#property-statusCode) ;
    - protected int [HttpResponse::$httpVersion](#property-httpVersion) ;

- Methods
    - public static [create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/create.md)(?$data) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)
    - protected [sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/sendHeaders.md)() : void

- Inherited methods
    - public [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md)($body = , $code = 200) : void
    - public [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md)(string $version) : void
    - public [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md)() : void
    - protected [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md)() : void

}






Methods
==============

- [HttpJsonResponse::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/create.md) &ndash; Creates and returns the http json response instance.
- [HttpJsonResponse::sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse/sendHeaders.md) &ndash; Sends the http headers of the http response.
- [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md) &ndash; Builds the HttpResponse instance.
- [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md) &ndash; Sets the http version of this http response.
- [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md) &ndash; Sends the headers and prints the response body to the output.
- [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md) &ndash; Displays the body of the http response.





Location
=============
Ling\Light\Http\HttpJsonResponse<br>
See the source code of [Ling\Light\Http\HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/Http/HttpJsonResponse.php)



SeeAlso
==============
Previous class: [ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md)<br>Next class: [HttpRedirectResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRedirectResponse.md)<br>
