[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightException class
================
2019-04-09 --> 2020-07-28






Introduction
============

The LightException class.



Class synopsis
==============


class <span class="pl-k">LightException</span> extends [\Exception](http://php.net/manual/en/class.exception.php) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

- Properties
    - protected string|null [$lightErrorCode](#property-lightErrorCode) ;

- Inherited properties
    - protected  [Exception::$message](#property-message) =  ;
    - protected  [Exception::$code](#property-code) = 0 ;
    - protected  [Exception::$file](#property-file) ;
    - protected  [Exception::$line](#property-line) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/__construct.md)(?$message = , ?$code = 0, ?[\Throwable](http://php.net/manual/en/class.throwable.php) $previous = null) : void
    - public static [create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/create.md)(?string $message = , ?string $lightErrorCode = null) : [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md)
    - public [setLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/setLightErrorCode.md)(string $lightErrorCode) : [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md)
    - public [getLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/getLightErrorCode.md)() : string | null

}




Properties
=============

- <span id="property-lightErrorCode"><b>lightErrorCode</b></span>

    This property holds the lightErrorCode for this instance.
    It's a code that summarizes the error, and is meant to be handled by the error handlers
    of the [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.
    
    

- <span id="property-message"><b>message</b></span>

    
    
    

- <span id="property-code"><b>code</b></span>

    
    
    

- <span id="property-file"><b>file</b></span>

    
    
    

- <span id="property-line"><b>line</b></span>

    
    
    



Methods
==============

- [LightException::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/__construct.md) &ndash; Builds the LightException instance.
- [LightException::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/create.md) &ndash; Returns a static instance.
- [LightException::setLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/setLightErrorCode.md) &ndash; Sets the lightErrorCode.
- [LightException::getLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/getLightErrorCode.md) &ndash; Returns the light error code, or null if not set.





Location
=============
Ling\Light\Exception\LightException<br>
See the source code of [Ling\Light\Exception\LightException](https://github.com/lingtalfi/Light/blob/master/Exception/LightException.php)



SeeAlso
==============
Previous class: [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md)<br>Next class: [ConfigurationHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md)<br>
