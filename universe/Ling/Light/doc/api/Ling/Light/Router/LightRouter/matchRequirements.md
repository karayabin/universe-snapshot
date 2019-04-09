[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Router\LightRouter class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)


LightRouter::matchRequirements
================



LightRouter::matchRequirements — Tests the given $requirements against the request.




Description
================


protected [LightRouter::matchRequirements](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchRequirements.md)(array $requirements, [Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, &$failed = null) : array | bool




Tests the given $requirements against the request.

Return true if all requirements pass, and false otherwise.
In case of failure, if debug=true, the $failed array is fed and has the following structure:

- 0: the failing requirement name
- 1: the requirement value (as specified in the route)
- 2: the appropriate request bit against which the requirement was matched

If debug=false, the $failed array is not fed.




Parameters
================


- requirements

    

- request

    

- failed

    


Return values
================

Returns array | bool.








See Also
================

The [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md) class.

Previous method: [onRouteMatchFailureAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onRouteMatchFailureAfter.md)<br>Next method: [matchUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchUriPath.md)<br>

