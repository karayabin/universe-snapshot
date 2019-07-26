[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\YorgDirScannerTool class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md)


YorgDirScannerTool::getFilesIgnore
================



YorgDirScannerTool::getFilesIgnore — Returns the list of files (not dirs) which name aren't in the $ignore array.




Description
================


public static [YorgDirScannerTool::getFilesIgnore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnore.md)(string $dir, array $ignore = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array




Returns the list of files (not dirs) which name aren't in the $ignore array.




Parameters
================


- dir

    The directory to parse.

- ignore

    An array of file/dir names to ignore.
If the entry is a directory, the directory's content will be ignored recursively.
If the entry is a file, the file will be ignored.

- recursive

    If not, only the direct children of the $dir will be scanned.

- relativePath

    

- followSymlinks

    

- ignoreHidden

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [YorgDirScannerTool::getFilesIgnore](https://github.com/lingtalfi/DirScanner/blob/master/YorgDirScannerTool.php#L197-L227)


See Also
================

The [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md) class.

Previous method: [getFiles](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFiles.md)<br>Next method: [getFilesIgnoreMore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnoreMore.md)<br>

