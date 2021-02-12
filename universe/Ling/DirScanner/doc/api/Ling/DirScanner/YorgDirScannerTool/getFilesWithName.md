[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\YorgDirScannerTool class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md)


YorgDirScannerTool::getFilesWithName
================



YorgDirScannerTool::getFilesWithName — Return the list of files (not dirs) which matches the given $name(s).




Description
================


public static [YorgDirScannerTool::getFilesWithName](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithName.md)(string $dir, string $name, ?bool $extensionCaseSensitive = false, ?bool $recursive = false, ?bool $relativePath = false, ?bool $followSymlinks = false, ?int $ignoreHidden = 1) : array




Return the list of files (not dirs) which matches the given $name(s).

The matching uses the fnmatch function under the hood (https://www.php.net/manual/en/function.fnmatch.php).

The matching is done against the file base names (i.e. the filename and the extension)


Examples of pattern you can use as the name:

- *gr[ae]y.byml


The pattern above will match both:

- redgray.byml
- grey.byml

but not:

- gray
- red.byml




Parameters
================


- dir

    

- name

    The allowed names.

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
See the source code for method [YorgDirScannerTool::getFilesWithName](https://github.com/lingtalfi/DirScanner/blob/master/YorgDirScannerTool.php#L583-L634)


See Also
================

The [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md) class.

Previous method: [getFilesWithoutExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithoutExtension.md)<br>

