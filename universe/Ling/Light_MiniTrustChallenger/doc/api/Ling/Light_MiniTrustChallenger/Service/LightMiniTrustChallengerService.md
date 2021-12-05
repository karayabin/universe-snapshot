[Back to the Ling/Light_MiniTrustChallenger api](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger.md)



The LightMiniTrustChallengerService class
================
2021-06-04 --> 2021-06-04






Introduction
============

The LightMiniTrustChallengerService class.



Class synopsis
==============


class <span class="pl-k">LightMiniTrustChallengerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$contexts](#property-contexts) ;
    - private string [$defaultAlgo](#property-defaultAlgo) ;
    - private int [$defaultMaxTime](#property-defaultMaxTime) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/getChallengeString.md)(string $context) : string
    - public [checkChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/checkChallengeString.md)(string $context, string $challengeString, string &$clientErrorReason) : bool
    - public [setContexts](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/setContexts.md)(array $contexts) : void
    - private [error](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/error.md)(string $msg) : void
    - private [encode](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/encode.md)(string $algo, string $string) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-contexts"><b>contexts</b></span>

    This property holds the options for this instance.
    
    

- <span id="property-defaultAlgo"><b>defaultAlgo</b></span>

    This property holds the defaultAlgo for this instance.
    
    

- <span id="property-defaultMaxTime"><b>defaultMaxTime</b></span>

    This property holds the maxTime in seconds for this instance.
    
    



Methods
==============

- [LightMiniTrustChallengerService::__construct](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/__construct.md) &ndash; Builds the LightMiniTrustChallengerService instance.
- [LightMiniTrustChallengerService::setContainer](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/setContainer.md) &ndash; Sets the container.
- [LightMiniTrustChallengerService::getChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/getChallengeString.md) &ndash; Returns a challenge string.
- [LightMiniTrustChallengerService::checkChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/checkChallengeString.md) &ndash; Checks that the given challenge string is valid, and returns the result.
- [LightMiniTrustChallengerService::setContexts](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/setContexts.md) &ndash; Sets the contexts.
- [LightMiniTrustChallengerService::error](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/error.md) &ndash; Throws an exception.
- [LightMiniTrustChallengerService::encode](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/encode.md) &ndash; Encodes the given string using the given algo identifier.





Location
=============
Ling\Light_MiniTrustChallenger\Service\LightMiniTrustChallengerService<br>
See the source code of [Ling\Light_MiniTrustChallenger\Service\LightMiniTrustChallengerService](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/Service/LightMiniTrustChallengerService.php)



SeeAlso
==============
Previous class: [LightMiniTrustChallengerException](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Exception/LightMiniTrustChallengerException.md)<br>
