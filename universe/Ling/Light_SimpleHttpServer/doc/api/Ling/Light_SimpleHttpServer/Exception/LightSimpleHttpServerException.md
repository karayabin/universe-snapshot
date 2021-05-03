[Back to the Ling/Light_SimpleHttpServer api](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer.md)



The LightSimpleHttpServerException class
================
2020-10-30 --> 2021-03-22






Introduction
============

The LightSimpleHttpServerException class.



Class synopsis
==============


class <span class="pl-k">LightSimpleHttpServerException</span> extends [\Exception](http://php.net/manual/en/class.exception.php) implements [\Stringable](https://wiki.php.net/rfc/stringable), [\Throwable](http://php.net/manual/en/class.throwable.php) {

- Properties
    - protected int [$httpStatusCode](#property-httpStatusCode) ;

- Inherited properties
    - protected  [Exception::$message](#property-message) =  ;
    - protected  [Exception::$code](#property-code) = 0 ;
    - protected  [Exception::$file](#property-file) ;
    - protected  [Exception::$line](#property-line) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/__construct.md)(?$message = , ?$code = 0, ?Throwable $previous = null) : void
    - public [getHttpStatusCode](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/getHttpStatusCode.md)() : int
    - public [setHttpStatusCode](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/setHttpStatusCode.md)(int $httpStatusCode) : void

}




Properties
=============

- <span id="property-httpStatusCode"><b>httpStatusCode</b></span>

    This property holds the httpStatusCode for this instance.
    
    

- <span id="property-message"><b>message</b></span>

    
    
    

- <span id="property-code"><b>code</b></span>

    
    
    

- <span id="property-file"><b>file</b></span>

    
    
    

- <span id="property-line"><b>line</b></span>

    
    
    



Methods
==============

- [LightSimpleHttpServerException::__construct](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/__construct.md) &ndash; Builds the LightException instance.
- [LightSimpleHttpServerException::getHttpStatusCode](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/getHttpStatusCode.md) &ndash; Returns the httpStatusCode of this instance.
- [LightSimpleHttpServerException::setHttpStatusCode](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/setHttpStatusCode.md) &ndash; Sets the httpStatusCode.





Location
=============
Ling\Light_SimpleHttpServer\Exception\LightSimpleHttpServerException<br>
See the source code of [Ling\Light_SimpleHttpServer\Exception\LightSimpleHttpServerException](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/Exception/LightSimpleHttpServerException.php)



SeeAlso
==============
Previous class: [LightSimpleHttpServerController](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController.md)<br>Next class: [LightSimpleHttpServerService](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService.md)<br>
