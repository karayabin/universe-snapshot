[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Helper\MapHelper class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/MapHelper.md)


MapHelper::createMap
================



MapHelper::createMap — Creates the map of dependencies for the planet $planetDir at the given $dstFile location.




Description
================


public static [MapHelper::createMap](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/MapHelper/createMap.md)(string $planetDir, string $dstFile, ?bool $addBumbleBee = false) : bool




Creates the map of dependencies for the planet $planetDir at the given $dstFile location.
Returns whether or not the $dstFile then exists.

THe map of dependencies is a [BabyYaml](https://github.com/lingtalfi/BabyYaml) file which looks something like this:

```yaml
- Ling.Bat
- Ling.BabyYaml
- Ling.CliTools
```




Parameters
================


- planetDir

    

- dstFile

    

- addBumbleBee

    Whether to add the Ling.BumbleBee planet.


Return values
================

Returns bool.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;







Source Code
===========
See the source code for method [MapHelper::createMap](https://github.com/lingtalfi/Uni2/blob/master/Helper/MapHelper.php#L67-L77)


See Also
================

The [MapHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/MapHelper.md) class.

Previous method: [getMapEntries](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/MapHelper/getMapEntries.md)<br>

