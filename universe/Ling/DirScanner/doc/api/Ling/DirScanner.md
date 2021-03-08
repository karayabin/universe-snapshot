Ling/DirScanner
================
2019-03-20 --> 2021-03-08




Table of contents
===========

- [DirScanner](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner.md) &ndash; The DirScanner class.
    - [DirScanner::__construct](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/__construct.md) &ndash; Builds the DirScanner instance.
    - [DirScanner::create](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/create.md) &ndash; A static way of instantiating the class.
    - [DirScanner::scanDir](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/scanDir.md) &ndash; Scans a directory, and collect items (using to the given callable) along the way.
    - [DirScanner::setFollowLinks](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/setFollowLinks.md) &ndash; Sets the followLinks property for this instance.
- [NestedFileTreeHelper](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper.md) &ndash; The NestedFileTreeHelper class.
    - [NestedFileTreeHelper::getNestedFileTree](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper/getNestedFileTree.md) &ndash; Returns a nested structure from a directory.
- [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool.md) &ndash; The YorgDirScannerTool class
    - [YorgDirScannerTool::getDirs](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getDirs.md) &ndash; Return the list of directories of a given folder.
    - [YorgDirScannerTool::getEntries](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getEntries.md) &ndash; Return the list of entries (files or dirs) of a given folder.
    - [YorgDirScannerTool::getFiles](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFiles.md) &ndash; Return the list of files (not dirs) of a given folder.
    - [YorgDirScannerTool::getFilesIgnore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnore.md) &ndash; Returns the list of files (not dirs) which name aren't in the $ignore array.
    - [YorgDirScannerTool::getFilesIgnoreMore](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesIgnoreMore.md) &ndash; Same as getFilesIgnore, but also allows to ignore files by relative paths.
    - [YorgDirScannerTool::getFilesWithPrefix](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithPrefix.md) &ndash; Returns the list of files which name start with the given $prefix.
    - [YorgDirScannerTool::getFilesWithExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithExtension.md) &ndash; Return the list of files (not dirs) having the given $extension(s).
    - [YorgDirScannerTool::getFilesWithoutExtension](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithoutExtension.md) &ndash; Return the list of files (not dirs) NOT ending with the given $extension(s).
    - [YorgDirScannerTool::getFilesWithName](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/YorgDirScannerTool/getFilesWithName.md) &ndash; Return the list of files (not dirs) which matches the given $name(s).




