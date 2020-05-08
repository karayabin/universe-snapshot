[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperInterface class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)


GemHelperInterface::apply
================



GemHelperInterface::apply — and returns the output of the applyCopies method.




Description
================


abstract public [GemHelperInterface::apply](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/apply.md)(string $path) : string




A shortcut method that applies the following methods in that order:
- applyNameTransform
- applyValidation (throws an exception if a validation error occurs)
- applyCopies

and returns the output of the applyCopies method.




Parameters
================


- path

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [GemHelperInterface::apply](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php#L43-L43)


See Also
================

The [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) class.

Previous method: [setTags](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/setTags.md)<br>Next method: [getConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/getConfig.md)<br>

