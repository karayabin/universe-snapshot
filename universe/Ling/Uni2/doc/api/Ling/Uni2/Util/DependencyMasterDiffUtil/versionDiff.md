[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Util\DependencyMasterDiffUtil class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil.md)


DependencyMasterDiffUtil::versionDiff
================



DependencyMasterDiffUtil::versionDiff — older dependency master file), and returns them in the form of an array.




Description
================


public [DependencyMasterDiffUtil::versionDiff](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil/versionDiff.md)(string $olderDependencyMasterFile, string $newerDependencyMasterFile) : array




Collect the newest increments of the (given) newer dependency master file (compared to the
older dependency master file), and returns them in the form of an array.


The returned array is an array of incrementItems:


```yaml
$n:
     planet: $galaxyName/$planetName
     old_version: $olderVersionNumber|null (null if the old version doesn't exist: it's a new planet)
     new_version: $newerVersionNumber
```




Parameters
================


- olderDependencyMasterFile

    

- newerDependencyMasterFile

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [DependencyMasterDiffUtil::versionDiff](https://github.com/lingtalfi/Uni2/blob/master/Util/DependencyMasterDiffUtil.php#L41-L48)


See Also
================

The [DependencyMasterDiffUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil.md) class.

Next method: [versionDiffByConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil/versionDiffByConf.md)<br>

