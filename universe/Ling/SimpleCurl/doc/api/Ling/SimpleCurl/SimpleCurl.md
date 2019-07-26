[Back to the Ling/SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md)



The SimpleCurl class
================
2019-03-14 --> 2019-07-18






Introduction
============

The SimpleCurl class.



Class synopsis
==============


class <span class="pl-k">SimpleCurl</span>  {

- Properties
    - protected array [$errors](#property-errors) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/__construct.md)() : void
    - public [call](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/call.md)(string $url) : [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md) | false
    - public [getErrors](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/getErrors.md)() : array
    - protected [curlRequest](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/curlRequest.md)(string $url, array $curlOptions = []) : [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md) | false
    - protected [addError](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/addError.md)(string $msg) : void

}




Properties
=============

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    



Methods
==============

- [SimpleCurl::__construct](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/__construct.md) &ndash; Builds the SimpleCurl instance.
- [SimpleCurl::call](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/call.md) &ndash; Calls an url and returns the corresponding response.
- [SimpleCurl::getErrors](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/getErrors.md) &ndash; Returns the errors of this instance.
- [SimpleCurl::curlRequest](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/curlRequest.md) &ndash; and returns a SimpleCurlResponse, or false in case of failure.
- [SimpleCurl::addError](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/SimpleCurl/addError.md) &ndash; Adds an error.





Location
=============
Ling\SimpleCurl\SimpleCurl<br>
See the source code of [Ling\SimpleCurl\SimpleCurl](https://github.com/lingtalfi/SimpleCurl/blob/master/SimpleCurl.php)



SeeAlso
==============
Previous class: [SimpleCurlResponseInterface](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl/Response/SimpleCurlResponseInterface.md)<br>
