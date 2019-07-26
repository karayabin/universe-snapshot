[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)<br>
[Back to the Ling\Kit\ConfStorage\BabyYamlConfStorage class](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md)


BabyYamlConfStorage::getPageConf
================



BabyYamlConfStorage::getPageConf — Returns the page conf array for the given $pageName, or false if a problem occurs.




Description
================


public [BabyYamlConfStorage::getPageConf](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getPageConf.md)(string $pageName) : array | false




Returns the page conf array for the given $pageName, or false if a problem occurs.
If a problem occurs, the errors can be retrieved using the getErrors method.

The returned array is the [page configuration array](https://github.com/lingtalfi/Kit/blob/master/README.md#the-kit-configuration-array).




Parameters
================


- pageName

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlConfStorage::getPageConf](https://github.com/lingtalfi/Kit/blob/master/ConfStorage/BabyYamlConfStorage.php#L86-L119)


See Also
================

The [BabyYamlConfStorage](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/__construct.md)<br>Next method: [getErrors](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/ConfStorage/BabyYamlConfStorage/getErrors.md)<br>

