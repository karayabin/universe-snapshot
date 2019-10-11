[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\YorgDirScannerTool class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md)


YorgDirScannerTool::getFilesWithExtension
================



YorgDirScannerTool::getFilesWithExtension — Return the list of files (not dirs) having the given $extension(s).




Description
================


public static [YorgDirScannerTool::getFilesWithExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithExtension.md)(string $dir, $extension = null, bool $extensionCaseSensitive = false, bool $recursive = false, bool $relativePath = false, bool $followSymlinks = false, int $ignoreHidden = 1) : array




Return the list of files (not dirs) having the given $extension(s).




Parameters
================


- dir

    

- extension

    The allowed extensions.
If null, all extensions are allowed.

- extensionCaseSensitive

    

- recursive

    

- relativePath

    

- followSymlinks

    

- ignoreHidden

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [YorgDirScannerTool::getFilesWithExtension](https://github.com/lingtalfi/DirScanner/blob/master/YorgDirScannerTool.php#L384-L438)


See Also
================

The [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md) class.

Previous method: [getFilesWithPrefix](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithPrefix.md)<br>Next method: [getFilesWithoutExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithoutExtension.md)<br>

