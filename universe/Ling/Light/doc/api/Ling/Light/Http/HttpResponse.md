[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpResponse class
================
2019-04-09 --> 2019-07-18






Introduction
============

The HttpResponse class.



Class synopsis
==============


class <span class="pl-k">HttpResponse</span> implements [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) {

- Properties
    - private static array [$statusTexts](#property-statusTexts) = ['Continue','Switching Protocols','Processing','Early Hints','OK','Created','Accepted','Non-Authoritative Information','No Content','Reset Content','Partial Content','Multi-Status','Already Reported','IM Used','Multiple Choices','Moved Permanently','Found','See Other','Not Modified','Use Proxy','Temporary Redirect','Permanent Redirect','Bad Request','Unauthorized','Payment Required','Forbidden','Not Found','Method Not Allowed','Not Acceptable','Proxy Authentication Required','Request Timeout','Conflict','Gone','Length Required','Precondition Failed','Payload Too Large','URI Too Long','Unsupported Media Type','Range Not Satisfiable','Expectation Failed','Misdirected Request','Unprocessable Entity','Locked','Failed Dependency','Too Early','Upgrade Required','Precondition Required','Too Many Requests','Request Header Fields Too Large','Unavailable For Legal Reasons','Internal Server Error','Not Implemented','Bad Gateway','Service Unavailable','Gateway Timeout','HTTP Version Not Supported','Variant Also Negotiates (Experimental)','Insufficient Storage','Loop Detected','Not Extended','Network Authentication Required'] ;
    - protected string [$body](#property-body) ;
    - protected int [$statusCode](#property-statusCode) ;
    - protected int [$httpVersion](#property-httpVersion) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md)($body = , $code = 200) : void
    - public [setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md)(string $version) : void
    - public [send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md)() : void
    - protected [sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/sendHeaders.md)() : void
    - protected [displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md)() : void

}




Properties
=============

- <span id="property-statusTexts"><b>statusTexts</b></span>

    This property holds a map of http status code => description.
    The list below has last been checked on 2019-01-18.
    
    

- <span id="property-body"><b>body</b></span>

    This property holds the body of the http response.
    
    

- <span id="property-statusCode"><b>statusCode</b></span>

    This property holds the status code of the http response.
    
    

- <span id="property-httpVersion"><b>httpVersion</b></span>

    This property holds the http version of the http response.
    
    



Methods
==============

- [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md) &ndash; Builds the HttpResponse instance.
- [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md) &ndash; Sets the http version of this http response.
- [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md) &ndash; Sends the headers and prints the response body to the output.
- [HttpResponse::sendHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/sendHeaders.md) &ndash; Sends the http headers of the http response.
- [HttpResponse::displayBody](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/displayBody.md) &ndash; Displays the body of the http response.





Location
=============
Ling\Light\Http\HttpResponse<br>
See the source code of [Ling\Light\Http\HttpResponse](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponse.php)



SeeAlso
==============
Previous class: [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)<br>Next class: [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)<br>