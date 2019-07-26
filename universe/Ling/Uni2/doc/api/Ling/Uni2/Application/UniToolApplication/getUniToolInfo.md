[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Application\UniToolApplication class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md)


UniToolApplication::getUniToolInfo
================



UniToolApplication::getUniToolInfo — - last_update: the last (mysql) datetime the uni-tool the upgrade command was called.




Description
================


protected [UniToolApplication::getUniToolInfo](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getUniToolInfo.md)() : array




Returns the uni tool info array, containing:

- last_update: the last (mysql) datetime the uni-tool the upgrade command was called.
- local_version: the local version number of the uni-tool when last updated with the upgrade command.




Parameters
================

This method has no parameters.


Return values
================

Returns array.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







Source Code
===========
See the source code for method [UniToolApplication::getUniToolInfo](https://github.com/lingtalfi/Uni2/blob/master/Application/UniToolApplication.php#L726-L733)


See Also
================

The [UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) class.

Previous method: [onCommandInstantiated](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/onCommandInstantiated.md)<br>

