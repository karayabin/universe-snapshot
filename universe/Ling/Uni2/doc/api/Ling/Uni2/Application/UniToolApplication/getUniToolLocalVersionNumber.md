[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Application\UniToolApplication class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md)


UniToolApplication::getUniToolLocalVersionNumber
================



UniToolApplication::getUniToolLocalVersionNumber — Returns the version number of the uni-tool on this local machine.




Description
================


public [UniToolApplication::getUniToolLocalVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolLocalVersionNumber.md)() : string




Returns the version number of the uni-tool on this local machine.
See the [uni-tool upgrade-system](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-upgrade-system) for more info.

Note: if for some reason the info is not accessible (i.e. the user deleted the info file for instance),
we return 0.0.0 (so that it looses against a version number comparison).




Parameters
================

This method has no parameters.


Return values
================

Returns string.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







See Also
================

The [UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) class.

Previous method: [getUniToolWebVersionNumber](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolWebVersionNumber.md)<br>Next method: [isUniToolOutdated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/isUniToolOutdated.md)<br>

