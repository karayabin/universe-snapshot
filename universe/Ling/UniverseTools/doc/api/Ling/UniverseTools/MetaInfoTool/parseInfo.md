[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\MetaInfoTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md)


MetaInfoTool::parseInfo
================



MetaInfoTool::parseInfo — Returns an array of the meta info found in the given planet.




Description
================


public static [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md)(string $planetDir, ?array $options = []) : array




Returns an array of the meta info found in the given planet.

If no info is found (meta-info file not found for instance), the returned array will be empty.

Available options are:

- numbersAsString: bool=true. Whether to convert numbers (int and float) to strings.
     This option is set to true by default, because some planets like Bat use a version number with two components only instead of three (i.e. 1.24, 1.25, ...).
     The float to string conversion in php can lead to errors, such as version 1.320 interpreted as 1.32, which is unacceptable.
     Since the meta-info.byml mainly contains the version information, it makes sense to have the numbersAsString set to true by default,
     so that 1.320 becomes string 1.320 instead of float 1.32.




Parameters
================


- planetDir

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/MetaInfoTool.php#L44-L55)


See Also
================

The [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md) class.

Next method: [getVersionByUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersionByUrl.md)<br>

