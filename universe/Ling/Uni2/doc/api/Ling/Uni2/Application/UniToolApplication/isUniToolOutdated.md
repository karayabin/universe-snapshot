[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Application\UniToolApplication class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md)


UniToolApplication::isUniToolOutdated
================



UniToolApplication::isUniToolOutdated — Returns whether this uni-tool version is outdated.




Description
================


public [UniToolApplication::isUniToolOutdated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/isUniToolOutdated.md)() : bool




Returns whether this uni-tool version is outdated.
In other words, whether the local copy of the uni-tool on this machine has a newer
version available on the web.
Note: the uni-tool IS NOT Uni2, the uni-tool's url is https://github.com/lingtalfi/universe-naive-importer,
while the Uni2's url is: https://github.com/lingtalfi/Uni2.

However, the Uni2 is used under the hood by the uni-tool, and the Uni2 keeps track of the uni-tool
version number internally, so that we can see if it's outdated.


Important note: the uni-tool's version number basically reflects changes in the [dependency-master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file).




Parameters
================

This method has no parameters.


Return values
================

Returns bool.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







Source Code
===========
See the source code for method [UniToolApplication::isUniToolOutdated](https://github.com/lingtalfi/Uni2/blob/master/Application/UniToolApplication.php#L544-L556)


See Also
================

The [UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) class.

Previous method: [getUniToolLocalVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolLocalVersionNumber.md)<br>Next method: [getLocalDependencyMasterPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getLocalDependencyMasterPath.md)<br>

