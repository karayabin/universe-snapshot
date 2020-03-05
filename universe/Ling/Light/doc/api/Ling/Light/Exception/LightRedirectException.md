[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRedirectException class
================
2019-04-09 --> 2020-02-24






Introduction
============

The LightRedirectException class.



Class synopsis
==============


class <span class="pl-k">LightRedirectException</span> extends [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md) implements [\Throwable](http://php.net/manual/en/class.throwable.php) {

- Properties
    - protected string [$redirectRoute](#property-redirectRoute) ;

- Inherited properties
    - protected string|null [LightException::$lightErrorCode](#property-lightErrorCode) ;
    - protected  [Exception::$message](#property-message) =  ;
    - protected  [Exception::$code](#property-code) = 0 ;
    - protected  [Exception::$file](#property-file) ;
    - protected  [Exception::$line](#property-line) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException/__construct.md)(?$message = , ?$code = 0, ?[\Throwable](http://php.net/manual/en/class.throwable.php) $previous = null) : void
    - public [setRedirectRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException/setRedirectRoute.md)(string $redirectRoute) : [LightRedirectException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException.md)
    - public [getRedirectRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException/getRedirectRoute.md)() : string

- Inherited methods
    - public static [LightException::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/create.md)(?string $message = , ?string $lightErrorCode = null) : [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md)
    - public [LightException::setLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/setLightErrorCode.md)(string $lightErrorCode) : [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md)
    - public [LightException::getLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/getLightErrorCode.md)() : string | null

}




Properties
=============

- <span id="property-redirectRoute"><b>redirectRoute</b></span>

    This property holds the redirectRoute for this instance.
    
    

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

- [LightRedirectException::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException/__construct.md) &ndash; Builds the LightException instance.
- [LightRedirectException::setRedirectRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException/setRedirectRoute.md) &ndash; Sets the redirectRoute.
- [LightRedirectException::getRedirectRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightRedirectException/getRedirectRoute.md) &ndash; Returns the redirectRoute of this instance.
- [LightException::create](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/create.md) &ndash; Returns a static instance.
- [LightException::setLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/setLightErrorCode.md) &ndash; Sets the lightErrorCode.
- [LightException::getLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/getLightErrorCode.md) &ndash; Returns the light error code, or null if not set.





Location
=============
Ling\Light\Exception\LightRedirectException<br>
See the source code of [Ling\Light\Exception\LightRedirectException](https://github.com/lingtalfi/Light/blob/master/Exception/LightRedirectException.php)



SeeAlso
==============
Previous class: [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md)<br>Next class: [ConfigurationHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md)<br>
