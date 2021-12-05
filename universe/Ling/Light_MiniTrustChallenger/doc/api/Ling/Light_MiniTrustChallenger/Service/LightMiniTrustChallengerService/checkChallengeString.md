[Back to the Ling/Light_MiniTrustChallenger api](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger.md)<br>
[Back to the Ling\Light_MiniTrustChallenger\Service\LightMiniTrustChallengerService class](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService.md)


LightMiniTrustChallengerService::checkChallengeString
================



LightMiniTrustChallengerService::checkChallengeString — Checks that the given challenge string is valid, and returns the result.




Description
================


public [LightMiniTrustChallengerService::checkChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/checkChallengeString.md)(string $context, string $challengeString, string &$clientErrorReason) : bool




Checks that the given challenge string is valid, and returns the result.

If the challenge is not valid, the reason is available via the clientErrorReason parameter.




Parameters
================


- context

    

- challengeString

    

- clientErrorReason

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightMiniTrustChallengerService::checkChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/Service/LightMiniTrustChallengerService.php#L107-L144)


See Also
================

The [LightMiniTrustChallengerService](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService.md) class.

Previous method: [getChallengeString](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/getChallengeString.md)<br>Next method: [setContexts](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger/Service/LightMiniTrustChallengerService/setContexts.md)<br>

