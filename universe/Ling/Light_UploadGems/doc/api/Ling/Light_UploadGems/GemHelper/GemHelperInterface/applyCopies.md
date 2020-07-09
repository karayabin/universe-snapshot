[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelperInterface class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md)


GemHelperInterface::applyCopies
================



GemHelperInterface::applyCopies — Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.




Description
================


abstract public [GemHelperInterface::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyCopies.md)(string $path, ?array $options = []) : string




Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.
See more information in the [UploadGems conception notes](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/pages/conception-notes.md).




Parameters
================


- path

    The absolute path to the file to copy.

- options

    - onDstReady: a callable triggered when the destination path is set.
         This is triggered before each copy is actually written to the destination path.
         Use this callable to change the destination path for each copy.
         The callable signature is:
         - onDstReady ( string &$dst, int $copyIndex, array $copyItem )
             With:
             - dst: the destination path were the copy is going to be written (you can change it)
             - copyIndex: the numerical index of this copy
             - copyItem: the copy configuration item (from the gem config)
     - onBeforeCopy: a callable triggered if there is at least one copy, and before the first copy is processed.
     - onCopyAfter: a callable triggered after the copy has been copied.
         The callable signature is:
         - onCopyAfter ( string $dst, int $copyIndex, array $copyItem )
             With:
             - dst: the destination path were the copy was written to
             - copyIndex: the numerical index of this copy
             - copyItem: the copy configuration item (from the gem config)


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [GemHelperInterface::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelperInterface.php#L122-L122)


See Also
================

The [GemHelperInterface](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface.md) class.

Previous method: [applyValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelperInterface/applyValidation.md)<br>

