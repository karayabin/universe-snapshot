[Back to the Ling/Light_UploadGems api](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems.md)<br>
[Back to the Ling\Light_UploadGems\GemHelper\GemHelper class](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md)


GemHelper::applyCopies
================



GemHelper::applyCopies — Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.




Description
================


public [GemHelper::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyCopies.md)(string $path, ?array $options = []) : string




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
See the source code for method [GemHelper::applyCopies](https://github.com/lingtalfi/Light_UploadGems/blob/master/GemHelper/GemHelper.php#L188-L326)


See Also
================

The [GemHelper](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper.md) class.

Previous method: [applyChunkValidation](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/applyChunkValidation.md)<br>Next method: [getCustomConfig](https://github.com/lingtalfi/Light_UploadGems/blob/master/doc/api/Ling/Light_UploadGems/GemHelper/GemHelper/getCustomConfig.md)<br>

