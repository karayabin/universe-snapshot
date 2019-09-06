[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The HttpRequest class
================
2019-04-09 --> 2019-09-03






Introduction
============

The HttpRequest class represents the http request.

Various readonly info can be accessed, including:
uri, http method, query string, request time, host, isHttps, the port number, the ip,
the http headers...

Also, the http request contain a copy of the original $_GET, $_POST, $_FILES and $_COOKIE arrays.



Class synopsis
==============


class <span class="pl-k">HttpRequest</span> implements [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) {

- Properties
    - protected string [$method](#property-method) ;
    - protected string [$uri](#property-uri) ;
    - protected string [$uriPath](#property-uriPath) ;
    - protected string [$queryString](#property-queryString) ;
    - protected float [$time](#property-time) ;
    - protected string [$host](#property-host) ;
    - protected bool [$isHttps](#property-isHttps) ;
    - protected int [$port](#property-port) ;
    - protected string [$ip](#property-ip) ;
    - protected string|null [$referer](#property-referer) ;
    - protected array [$headers](#property-headers) ;
    - protected array [$get](#property-get) ;
    - protected array [$post](#property-post) ;
    - protected array [$files](#property-files) ;
    - protected array [$cookie](#property-cookie) ;

- Methods
    - protected [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/__construct.md)() : void
    - public static [createFromEnv](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/createFromEnv.md)() : [HttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md)
    - public [getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getMethod.md)() : string
    - public [getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getUri.md)() : string
    - public [getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getUriPath.md)() : string
    - public [getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getQueryString.md)() : string
    - public [getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getQueryArgs.md)() : array
    - public [getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getTime.md)() : float
    - public [getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHost.md)() : string
    - public [isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/isHttpsRequest.md)() : bool
    - public [getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPort.md)() : int
    - public [getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getIp.md)() : string
    - public [getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getReferer.md)() : string | null
    - public [getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeaders.md)() : array
    - public [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeader.md)(string $header, $default = null) : string | mixed
    - public [getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getGet.md)() : array
    - public [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPost.md)() : array
    - public [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getFiles.md)() : array
    - public [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getCookie.md)() : array

}




Properties
=============

- <span id="property-method"><b>method</b></span>

    This property holds the http method sed for the request in lowercase.
    It is one of: get, post, ...
    
    

- <span id="property-uri"><b>uri</b></span>

    This property holds the uri of the http request. The uri
    being composed of the uriPath and the queryString if not empty (in which case
    a question mark separates the uriPath from the queryString.
    
    

- <span id="property-uriPath"><b>uriPath</b></span>

    This property holds the uriPath of the http request.
    The uriPath is the uri without the queryString part (and without the question mark
    separator).
    
    

- <span id="property-queryString"><b>queryString</b></span>

    This property holds the queryString of the http request.
    The queryString contains parameters for the application.
    
    

- <span id="property-time"><b>time</b></span>

    This property holds the time when the http request was created.
    It is a decimal number representing the unix timestamp (number of seconds since 1970 january 1st),
    but with two extra digits after the comma (micro time), giving more precision.
    
    

- <span id="property-host"><b>host</b></span>

    This property holds the host of the http request.
    
    

- <span id="property-isHttps"><b>isHttps</b></span>

    This property holds whether or not the request is a secure http request (using https).
    
    

- <span id="property-port"><b>port</b></span>

    This property holds the port number of the http request.
    
    

- <span id="property-ip"><b>ip</b></span>

    This property holds the ip address of the user.
    
    

- <span id="property-referer"><b>referer</b></span>

    This property holds the http referer of the http request when available, or null otherwise.
    
    

- <span id="property-headers"><b>headers</b></span>

    This property holds an array of the http headers attached to the http request.
    Each header is a key/value pair, the key follows the following naming convention: all lowercase,
    using dash instead of underscores.
    
    For instance:
    - user-agent
    - accept-encoding
    - ...
    
    

- <span id="property-get"><b>get</b></span>

    This property holds the initial $_GET array. It should be read only.
    
    

- <span id="property-post"><b>post</b></span>

    This property holds the initial $_POST array. It should be read only.
    
    

- <span id="property-files"><b>files</b></span>

    This property holds the initial flattened version with dots of the $_FILES array (see
    https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix or the createFromEnv
    method for more info).
    It should be read only.
    
    

- <span id="property-cookie"><b>cookie</b></span>

    This property holds the initial $_COOKIE array. It should be read only.
    
    



Methods
==============

- [HttpRequest::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/__construct.md) &ndash; Builds the HttpRequest instance.
- [HttpRequest::createFromEnv](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/createFromEnv.md) &ndash; Returns the http request using the info provided by the webserver ($_SERVER environment variables).
- [HttpRequest::getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getMethod.md) &ndash; Returns the http method used for the request, in lower case.
- [HttpRequest::getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getUri.md) &ndash; Returns the uri of the http request.
- [HttpRequest::getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getUriPath.md) &ndash; Returns the uriPath of the http request.
- [HttpRequest::getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getQueryString.md) &ndash; Returns the queryString of the http request.
- [HttpRequest::getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getQueryArgs.md) &ndash; Returns the array version of the query string of the http request.
- [HttpRequest::getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getTime.md) &ndash; The time when the http request was created.
- [HttpRequest::getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHost.md) &ndash; Returns the host of the http request.
- [HttpRequest::isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/isHttpsRequest.md) &ndash; Returns whether the request is a secure http request (using https).
- [HttpRequest::getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPort.md) &ndash; Returns the port number of the http request.
- [HttpRequest::getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getIp.md) &ndash; Returns the ip address of the user.
- [HttpRequest::getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getReferer.md) &ndash; Returns the http referer of the http request when available, or null otherwise.
- [HttpRequest::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeaders.md) &ndash; Returns an array of the http headers attached to the http request.
- [HttpRequest::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeader.md) &ndash; Returns the value of a specific header.
- [HttpRequest::getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getGet.md) &ndash; Returns the original $_GET array attached with the http request.
- [HttpRequest::getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPost.md) &ndash; Returns the original $_POST array attached with the http request.
- [HttpRequest::getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getFiles.md) &ndash; https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix for more info).
- [HttpRequest::getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getCookie.md) &ndash; Returns the original $_COOKIE array attached with the http request.





Location
=============
Ling\Light\Http\HttpRequest<br>
See the source code of [Ling\Light\Http\HttpRequest](https://github.com/lingtalfi/Light/blob/master/Http/HttpRequest.php)



SeeAlso
==============
Previous class: [HttpRedirectResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRedirectResponse.md)<br>Next class: [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md)<br>
