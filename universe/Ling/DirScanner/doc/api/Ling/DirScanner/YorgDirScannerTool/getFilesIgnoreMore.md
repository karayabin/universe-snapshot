[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\YorgDirScannerTool class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md)


YorgDirScannerTool::getFilesIgnoreMore
================



YorgDirScannerTool::getFilesIgnoreMore — Same as getFilesIgnore, but also allows to ignore files by relative paths.




Description
================


public static [YorgDirScannerTool::getFilesIgnoreMore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnoreMore.md)(string $dir, array $ignoreNames = [], $ignorePaths = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, bool $ignoreHidden = false) : array




Same as getFilesIgnore, but also allows to ignore files by relative paths.

So for instance, if you want to ignore the img dir but only /www/site1/img and not /www/site2/img, you can.




Parameters
================


- dir

    

- ignoreNames

    Array of file/directory names to ignore.
If the entry is a directory, the directory's content will be ignored recursively.

- ignorePaths

    Array of relative paths to ignore.
If the entry is a directory, the directory's content will be ignored recursively.
Note: a relative path doesn't start with slash.

- recursive

    

- relativePath

    

- followSymlinks

    

- ignoreHidden

    If a directory is ignored, its content is ignored recursively.


Return values
================

Returns array.








See Also
================

The [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md) class.

Previous method: [getFilesIgnore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnore.md)<br>Next method: [getFilesWithPrefix](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithPrefix.md)<br>

