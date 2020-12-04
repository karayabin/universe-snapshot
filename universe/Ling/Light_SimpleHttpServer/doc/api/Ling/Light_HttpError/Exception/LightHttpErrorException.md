[Back to the Ling/Light_HttpError api](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError.md)



The LightHttpErrorException class
================
2020-10-30 --> 2020-10-30






Introduction
============

The LightHttpErrorException class.



Class synopsis
==============


class <span class="pl-k">LightHttpErrorException</span> extends [\Exception](http://php.net/manual/en/class.exception.php) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

- Properties
    - protected int [$httpStatusCode](#property-httpStatusCode) ;

- Inherited properties
    - protected  [Exception::$message](#property-message) =  ;
    - protected  [Exception::$code](#property-code) = 0 ;
    - protected  [Exception::$file](#property-file) ;
    - protected  [Exception::$line](#property-line) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException/__construct.md)(?$message = , ?$code = 0, ?[\Throwable](http://php.net/manual/en/class.throwable.php) $previous = null) : void
    - public [getHttpStatusCode](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException/getHttpStatusCode.md)() : int
    - public [setHttpStatusCode](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException/setHttpStatusCode.md)(int $httpStatusCode) : void

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

- [LightHttpErrorException::__construct](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException/__construct.md) &ndash; Builds the LightException instance.
- [LightHttpErrorException::getHttpStatusCode](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException/getHttpStatusCode.md) &ndash; Returns the httpStatusCode of this instance.
- [LightHttpErrorException::setHttpStatusCode](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException/setHttpStatusCode.md) &ndash; Sets the httpStatusCode.





Location
=============
Ling\Light_HttpError\Exception\LightHttpErrorException<br>
See the source code of [Ling\Light_HttpError\Exception\LightHttpErrorException](https://github.com/lingtalfi/Light_HttpError/blob/master/Exception/LightHttpErrorException.php)



SeeAlso
==============
Previous class: [LightHttpErrorController](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Controller/LightHttpErrorController.md)<br>Next class: [LightHttpErrorService](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService.md)<br>
