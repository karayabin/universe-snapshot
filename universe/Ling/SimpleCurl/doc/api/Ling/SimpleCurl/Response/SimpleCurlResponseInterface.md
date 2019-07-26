[Back to the Ling/SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md)



The SimpleCurlResponseInterface class
================
2019-03-14 --> 2019-07-18






Introduction
============

The SimpleCurlResponseInterface class.
It represents the response of a curl method call.

A response contains the following elements:

- a http code: the returned http code
- a body: the body returned with the response, if available (i.e. some methods don't return a body)
- headers: an array of (lowercase) headers returned along with the response
- raw info: an array of various info about the curl response, provided by the curl php library



Class synopsis
==============


abstract class <span class="pl-k">SimpleCurlResponseInterface</span>  {

- Methods
    - abstract public [getHttpCode](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getHttpCode.md)() : int
    - abstract public [getHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getHeaders.md)() : array
    - abstract public [getBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getBody.md)() : string | null
    - abstract public [getRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getRawInfo.md)() : array

}






Methods
==============

- [SimpleCurlResponseInterface::getHttpCode](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getHttpCode.md) &ndash; Returns the (last returned) http code of the response.
- [SimpleCurlResponseInterface::getHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getHeaders.md) &ndash; Returns an array of headers.
- [SimpleCurlResponseInterface::getBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getBody.md) &ndash; Returns the body associated with the response if any.
- [SimpleCurlResponseInterface::getRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface/getRawInfo.md) &ndash; Returns the raw info returned by the curl curl_getinfo function.





Location
=============
Ling\SimpleCurl\Response\SimpleCurlResponseInterface<br>
See the source code of [Ling\SimpleCurl\Response\SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/Response/SimpleCurlResponseInterface.php)



SeeAlso
==============
Previous class: [SimpleCurlResponse](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse.md)<br>Next class: [SimpleCurl](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl.md)<br>
