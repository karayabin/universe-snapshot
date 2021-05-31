[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\MetaInfoTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md)


MetaInfoTool::incrementVersion
================



MetaInfoTool::incrementVersion — Increments the version number found in the meta-info.byml file, and returns that number.




Description
================


public static [MetaInfoTool::incrementVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/incrementVersion.md)(string $planetDir) : string




Increments the version number found in the meta-info.byml file, and returns that number.
The file is created if necessary.
If no version is found, the 0.1.0 is used.

The version number must be a dot separated string.
The last dot component is incremented (thus it should be numeric).




Parameters
================


- planetDir

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [MetaInfoTool::incrementVersion](https://github.com/lingtalfi/UniverseTools/blob/master/MetaInfoTool.php#L120-L141)


See Also
================

The [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md) class.

Previous method: [getVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersion.md)<br>Next method: [writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md)<br>

