[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The DependencyMasterDiffUtil class
================
2019-03-12 --> 2021-05-31






Introduction
============

The DependencyMasterDiffUtil class.
This class helps discovering differences between two dependency master files.
See the [uni-tool dependency master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file) section for more info about the dependency master file.



Class synopsis
==============


class <span class="pl-k">DependencyMasterDiffUtil</span>  {

- Methods
    - public [versionDiff](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil/versionDiff.md)(string $olderDependencyMasterFile, string $newerDependencyMasterFile) : array
    - public [versionDiffByConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil/versionDiffByConf.md)(array $oldConf, array $newConf) : array

}






Methods
==============

- [DependencyMasterDiffUtil::versionDiff](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil/versionDiff.md) &ndash; older dependency master file), and returns them in the form of an array.
- [DependencyMasterDiffUtil::versionDiffByConf](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil/versionDiffByConf.md) &ndash; Same as the versionDiff method, but takes the dependency master confs as arguments.





Location
=============
Ling\Uni2\Util\DependencyMasterDiffUtil<br>
See the source code of [Ling\Uni2\Util\DependencyMasterDiffUtil](https://github.com/lingtalfi/Uni2/blob/master/Util/DependencyMasterDiffUtil.php)



SeeAlso
==============
Previous class: [DependencyMasterBuilderUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterBuilderUtil.md)<br>Next class: [ImportUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil.md)<br>
