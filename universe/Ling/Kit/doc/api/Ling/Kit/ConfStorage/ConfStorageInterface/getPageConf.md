[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)<br>
[Back to the Ling\Kit\ConfStorage\ConfStorageInterface class](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md)


ConfStorageInterface::getPageConf
================



ConfStorageInterface::getPageConf — Returns the page conf array for the given $pageName, or false if a problem occurs.




Description
================


abstract public [ConfStorageInterface::getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getPageConf.md)(string $pageName) : array | false




Returns the page conf array for the given $pageName, or false if a problem occurs.
If a problem occurs, the errors can be retrieved using the getErrors method.

The returned array is the [page configuration array](https://github.com/lingtalfi/Kit/blob/master/README.md#the-kit-configuration-array).




Parameters
================


- pageName

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [ConfStorageInterface::getPageConf](https://github.com/lingtalfi/Kit/blob/master/ConfStorage/ConfStorageInterface.php#L23-L23)


See Also
================

The [ConfStorageInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface.md) class.

Next method: [getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/ConfStorageInterface/getErrors.md)<br>

