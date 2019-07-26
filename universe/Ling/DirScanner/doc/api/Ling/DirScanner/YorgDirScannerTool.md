[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)



The YorgDirScannerTool class
================
2019-03-20 --> 2019-07-18






Introduction
============

YorgDirScannerTool



Class synopsis
==============


class <span class="pl-k">YorgDirScannerTool</span>  {

- Methods
    - public static [getDirs](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getDirs.md)(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array
    - public static [getEntries](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getEntries.md)(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array
    - public static [getFiles](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFiles.md)(string $dir, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array
    - public static [getFilesIgnore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnore.md)(string $dir, array $ignore = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array
    - public static [getFilesIgnoreMore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnoreMore.md)(string $dir, array $ignoreNames = [], $ignorePaths = [], bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array
    - public static [getFilesWithPrefix](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithPrefix.md)(string $dir, string $prefix, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array
    - public static [getFilesWithExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithExtension.md)(string $dir, $extension = null, bool $extensionCaseSensitive = false, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array

}






Methods
==============

- [YorgDirScannerTool::getDirs](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getDirs.md) &ndash; Return the list of directories of a given folder.
- [YorgDirScannerTool::getEntries](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getEntries.md) &ndash; Return the list of entries (files or dirs) of a given folder.
- [YorgDirScannerTool::getFiles](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFiles.md) &ndash; Return the list of files (not dirs) of a given folder.
- [YorgDirScannerTool::getFilesIgnore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnore.md) &ndash; Returns the list of files (not dirs) which name aren't in the $ignore array.
- [YorgDirScannerTool::getFilesIgnoreMore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnoreMore.md) &ndash; Same as getFilesIgnore, but also allows to ignore files by relative paths.
- [YorgDirScannerTool::getFilesWithPrefix](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithPrefix.md) &ndash; Returns the list of files which name start with the given $prefix.
- [YorgDirScannerTool::getFilesWithExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithExtension.md) &ndash; Return the list of files (not dirs) having the given $extension(s).





Location
=============
Ling\DirScanner\YorgDirScannerTool<br>
See the source code of [Ling\DirScanner\YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/YorgDirScannerTool.php)



SeeAlso
==============
Previous class: [NestedFileTreeHelper](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper.md)<br>
