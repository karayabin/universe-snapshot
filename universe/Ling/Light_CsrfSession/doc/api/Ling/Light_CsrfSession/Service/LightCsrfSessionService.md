[Back to the Ling/Light_CsrfSession api](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession.md)



The LightCsrfSessionService class
================
2019-11-27 --> 2021-05-31






Introduction
============

The LightCsrfSessionService class.



Class synopsis
==============


class <span class="pl-k">LightCsrfSessionService</span>  {

- Properties
    - private string [$sessionName](#property-sessionName) ;
    - protected string [$salt](#property-salt) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/__construct.md)() : void
    - public [getToken](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/getToken.md)() : string
    - public [isValid](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/isValid.md)(string $token) : bool
    - public [setSalt](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/setSalt.md)(string $salt) : void
    - protected [startSession](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/startSession.md)() : void

}




Properties
=============

- <span id="property-sessionName"><b>sessionName</b></span>

    This property holds the sessionName for this instance.
    You probably should never change it.
    
    

- <span id="property-salt"><b>salt</b></span>

    This property holds the salt for this instance.
    
    



Methods
==============

- [LightCsrfSessionService::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/__construct.md) &ndash; Builds the LightCsrfSessionService instance.
- [LightCsrfSessionService::getToken](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/getToken.md) &ndash; Returns the csrf token value stored in the session.
- [LightCsrfSessionService::isValid](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/isValid.md) &ndash; Returns whether the given token is valid.
- [LightCsrfSessionService::setSalt](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/setSalt.md) &ndash; Sets the salt.
- [LightCsrfSessionService::startSession](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Service/LightCsrfSessionService/startSession.md) &ndash; Ensures that the php session has started.





Location
=============
Ling\Light_CsrfSession\Service\LightCsrfSessionService<br>
See the source code of [Ling\Light_CsrfSession\Service\LightCsrfSessionService](https://github.com/lingtalfi/Light_CsrfSession/blob/master/Service/LightCsrfSessionService.php)



SeeAlso
==============
Previous class: [LightCsrfSessionValidator](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Validator/LightCsrfSessionValidator.md)<br>
