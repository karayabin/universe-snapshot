[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The SimplePdoWrapperQueryException class
================
2019-07-22 --> 2021-08-05






Introduction
============

The SimplePdoWrapperQueryException class.



Class synopsis
==============


class <span class="pl-k">SimplePdoWrapperQueryException</span> extends [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php), [\Stringable](https://wiki.php.net/rfc/stringable) {

- Properties
    - protected string [$query](#property-query) ;
    - protected array [$markers](#property-markers) ;

- Inherited properties
    - protected  [Exception::$message](#property-message) =  ;
    - protected  [Exception::$code](#property-code) = 0 ;
    - protected  [Exception::$file](#property-file) ;
    - protected  [Exception::$line](#property-line) ;

- Methods
    - public [getQuery](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/getQuery.md)() : string
    - public [setQuery](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setQuery.md)(string $query) : void
    - public [setMessage](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setMessage.md)(string $message) : void
    - public [getMarkers](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/getMarkers.md)() : array
    - public [setMarkers](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setMarkers.md)(array $markers) : void

}




Properties
=============

- <span id="property-query"><b>query</b></span>

    This property holds the query for this instance.
    
    

- <span id="property-markers"><b>markers</b></span>

    This property holds the markers for this instance.
    
    

- <span id="property-message"><b>message</b></span>

    
    
    

- <span id="property-code"><b>code</b></span>

    
    
    

- <span id="property-file"><b>file</b></span>

    
    
    

- <span id="property-line"><b>line</b></span>

    
    
    



Methods
==============

- [SimplePdoWrapperQueryException::getQuery](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/getQuery.md) &ndash; Returns the query of this instance.
- [SimplePdoWrapperQueryException::setQuery](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setQuery.md) &ndash; Sets the query.
- [SimplePdoWrapperQueryException::setMessage](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setMessage.md) &ndash; Sets the message for this exception.
- [SimplePdoWrapperQueryException::getMarkers](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/getMarkers.md) &ndash; Returns the markers of this instance.
- [SimplePdoWrapperQueryException::setMarkers](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setMarkers.md) &ndash; Sets the markers.





Location
=============
Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException<br>
See the source code of [Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Exception/SimplePdoWrapperQueryException.php)



SeeAlso
==============
Previous class: [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md)<br>Next class: [FetchAllComponentsHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Helper/FetchAllComponentsHelper.md)<br>
