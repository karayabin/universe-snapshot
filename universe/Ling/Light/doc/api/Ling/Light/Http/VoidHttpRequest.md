[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The VoidHttpRequest class
================
2019-04-09 --> 2020-12-03






Introduction
============

The VoidHttpRequest class.
Generally used when you're in a cli environment.



Class synopsis
==============


class <span class="pl-k">VoidHttpRequest</span> implements [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) {

- Methods
    - public [getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getMethod.md)() : string
    - public [getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getUri.md)() : string
    - public [getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getUriPath.md)() : string
    - public [getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getQueryString.md)() : string
    - public [getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getQueryArgs.md)() : array
    - public [getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getTime.md)() : float
    - public [getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getHost.md)() : string
    - public [isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/isHttpsRequest.md)() : bool
    - public [getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPort.md)() : int
    - public [getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getIp.md)() : string
    - public [getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getReferer.md)() : string | null
    - public [getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getHeaders.md)() : array
    - public [getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getHeader.md)(string $header, ?$default = null) : string | mixed
    - public [getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getGet.md)() : array
    - public [getGetValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getGetValue.md)(string $key, ?bool $throwEx = true) : mixed
    - public [getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPost.md)() : array
    - public [getPostValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPostValue.md)(string $key, ?bool $throwEx = true) : mixed
    - public [getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFiles.md)() : array
    - public [getFilesValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFilesValue.md)(string $key, ?bool $throwEx = true) : mixed
    - public [getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookie.md)() : array
    - public [getCookieValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookieValue.md)(string $key, ?bool $throwEx = true) : mixed

}






Methods
==============

- [VoidHttpRequest::getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getMethod.md) &ndash; Returns the http method used for the request, in lower case.
- [VoidHttpRequest::getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getUri.md) &ndash; Returns the uri of the http request.
- [VoidHttpRequest::getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getUriPath.md) &ndash; Returns the uriPath of the http request.
- [VoidHttpRequest::getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getQueryString.md) &ndash; Returns the queryString of the http request.
- [VoidHttpRequest::getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getQueryArgs.md) &ndash; Returns the array version of the query string of the http request.
- [VoidHttpRequest::getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getTime.md) &ndash; The time when the http request was created.
- [VoidHttpRequest::getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getHost.md) &ndash; Returns the host of the http request.
- [VoidHttpRequest::isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/isHttpsRequest.md) &ndash; Returns whether the request is a secure http request (using https).
- [VoidHttpRequest::getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPort.md) &ndash; Returns the port number of the http request.
- [VoidHttpRequest::getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getIp.md) &ndash; Returns the ip address of the user.
- [VoidHttpRequest::getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getReferer.md) &ndash; Returns the http referer of the http request when available, or null otherwise.
- [VoidHttpRequest::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getHeaders.md) &ndash; Returns an array of the http headers attached to the http request.
- [VoidHttpRequest::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getHeader.md) &ndash; Returns the value of a specific header.
- [VoidHttpRequest::getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getGet.md) &ndash; Returns the original $_GET array attached with the http request.
- [VoidHttpRequest::getGetValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getGetValue.md) &ndash; Returns the value corresponding to the given key in the $_GET array attached with the request.
- [VoidHttpRequest::getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPost.md) &ndash; Returns the original $_POST array attached with the http request.
- [VoidHttpRequest::getPostValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getPostValue.md) &ndash; Returns the value corresponding to the given key in the $_POST array attached with the request.
- [VoidHttpRequest::getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFiles.md) &ndash; https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix for more info).
- [VoidHttpRequest::getFilesValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getFilesValue.md) &ndash; Returns the value corresponding to the given key in the $_FILES array attached with the request.
- [VoidHttpRequest::getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookie.md) &ndash; Returns the original $_COOKIE array attached with the http request.
- [VoidHttpRequest::getCookieValue](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest/getCookieValue.md) &ndash; Returns the value corresponding to the given key in the $_COOKIE array attached with the request.





Location
=============
Ling\Light\Http\VoidHttpRequest<br>
See the source code of [Ling\Light\Http\VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/Http/VoidHttpRequest.php)



SeeAlso
==============
Previous class: [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)<br>Next class: [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)<br>
