[Back to the Ling/SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md)



The SimpleCurlResponse class
================
2019-03-14 --> 2019-03-14






Introduction
============

The SimpleCurlResponse class.
It represents the response of a curl method call.

A response contains the following elements:

- a http code: the returned http code
- a body: the body returned with the response, if available (i.e. some methods don't return a body)



Class synopsis
==============


class <span class="pl-k">SimpleCurlResponse</span> implements [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md) {

- Properties
    - protected array [$headers](#property-headers) ;
    - protected null [$body](#property-body) ;
    - protected array [$rawInfo](#property-rawInfo) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/__construct.md)() : void
    - public [getHttpCode](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getHttpCode.md)() : int
    - public [getHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getHeaders.md)() : array
    - public [getBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getBody.md)() : string | null
    - public [getRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getRawInfo.md)() : array
    - public [setHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setHeaders.md)(array $headers) : void
    - public [setBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setBody.md)(?$body) : void
    - public [setRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setRawInfo.md)(array $rawInfo) : void

}




Properties
=============

- <span id="property-headers"><b>headers</b></span>

    This property holds the headers for this instance.
    
    

- <span id="property-body"><b>body</b></span>

    This property holds the body for this instance.
    
    

- <span id="property-rawInfo"><b>rawInfo</b></span>

    This property holds the rawInfo array for this instance.
    
    



Methods
==============

- [SimpleCurlResponse::__construct](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/__construct.md) &ndash; Builds the SimpleCurlResponse instance.
- [SimpleCurlResponse::getHttpCode](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getHttpCode.md) &ndash; Returns the (last returned) http code of the response.
- [SimpleCurlResponse::getHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getHeaders.md) &ndash; Returns an array of headers.
- [SimpleCurlResponse::getBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getBody.md) &ndash; Returns the body associated with the response if any.
- [SimpleCurlResponse::getRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/getRawInfo.md) &ndash; Returns the raw info returned by the curl curl_getinfo function.
- [SimpleCurlResponse::setHeaders](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setHeaders.md) &ndash; Sets the headers.
- [SimpleCurlResponse::setBody](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setBody.md) &ndash; Sets the body.
- [SimpleCurlResponse::setRawInfo](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponse/setRawInfo.md) &ndash; Sets the rawInfo.





Location
=============
Ling\SimpleCurl\Response\SimpleCurlResponse


SeeAlso
==============
Previous class: [SimpleCurlException](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Exception/SimpleCurlException.md)<br>Next class: [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md)<br>
