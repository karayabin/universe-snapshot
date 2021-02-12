[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\YorgDirScannerTool class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md)


YorgDirScannerTool::getFilesWithoutExtension
================



YorgDirScannerTool::getFilesWithoutExtension — Return the list of files (not dirs) NOT ending with the given $extension(s).




Description
================


public static [YorgDirScannerTool::getFilesWithoutExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithoutExtension.md)(string $dir, $extension, ?bool $extensionCaseSensitive = false, ?bool $recursive = false, ?bool $relativePath = false, ?bool $followSymlinks = false, ?int $ignoreHidden = 1) : array




Return the list of files (not dirs) NOT ending with the given $extension(s).




Parameters
================


- dir

    

- extension

    The extensions to exclude.

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
See the source code for method [YorgDirScannerTool::getFilesWithoutExtension](https://github.com/lingtalfi/DirScanner/blob/master/YorgDirScannerTool.php#L475-L529)


See Also
================

The [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md) class.

Previous method: [getFilesWithExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithExtension.md)<br>Next method: [getFilesWithName](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithName.md)<br>

