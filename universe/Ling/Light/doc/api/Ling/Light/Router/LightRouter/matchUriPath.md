[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Router\LightRouter class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)


LightRouter::matchUriPath
================



LightRouter::matchUriPath — Returns whether the $pattern matches against the given $uriPath.




Description
================


protected [LightRouter::matchUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchUriPath.md)(string $uriPath, string $pattern, array &$tagVars = null, array &$details = null) : bool




Returns whether the $pattern matches against the given $uriPath.
If the test is successful, the $tagVars array is fed with the captured variables (key => value).

If debug=true, the $details array is fed like this:
- 0: bool, whether the pattern uses tags (true) or not (false)
- 1: null|string, the php regex corresponding to the pattern (only if the pattern uses tags)

If debug=false, the $details array is not fed.




Parameters
================


- uriPath

    

- pattern

    

- tagVars

    

- details

    


Return values
================

Returns bool.








See Also
================

The [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md) class.

Previous method: [matchRequirements](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchRequirements.md)<br>Next method: [normalizeRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/normalizeRoute.md)<br>

