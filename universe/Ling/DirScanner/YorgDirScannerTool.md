YorgDirScannerTool
==============
2016-01-09



Utility to scan a directory.



Based on the [DirScanner](https://github.com/lingtalfi/DirScanner).



getDirs
---------------

Return the dirs in a given folder.


```php
array  getDirs( str:dir, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

Works like the getFiles method below.





getEntries
---------------
2017-04-18

Return the entries (files or dirs) in a given folder.


```php
array  getEntries( str:dir, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

Works like the getFiles method below.




getFiles
---------------

Return the files (not dirs) in a given folder.


```php
array  getFiles( str:dir, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

With the relativePath option, the returned array contains relative paths;
without the relativePath option, the returned array contains absolute paths.

Ignore hidden: do we ignore entries starting with a dot (.)?
- 0: do not ignore hidden entries
- 1: ignore hidden directories
- 2: ignore hidden directories and files

If a directory is ignored, its content is ignored recursively.


### Example

```php
<?php


use Ling\DirScanner\YorgDirScannerTool;

require_once "bigbang.php";


$dir = "service";
a(YorgDirScannerTool::getFiles($dir, true, true)); 
```


getFilesIgnore
---------------
2019-03-26

Returns the list of files (not dirs) which name aren't in the $ignore array.

```php
array  getFilesIgnore( str:dir, array:ignore = [], bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

Works like the getFiles method above.

- ignore: an array of file/dir names to ignore.
    If the entry is a directory, the directory's content will be ignored recursively.
    If the entry is a file, the file will be ignored.




getFilesIgnoreMore
---------------
2019-03-26

Same as getFilesIgnore, but also allows to ignore files by relative paths.
So for instance, if you want to ignore the img dir but only /www/site1/img and not /www/site2/img, you can.

```php
array  getFilesIgnore( str:dir, array:ignoreNames=[], array ignorePaths = [], bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

Works like the getFiles method above.

- ignoreNames: an array of file/dir names to ignore.
    If the entry is a directory, the directory's content will be ignored recursively.
    If the entry is a file, the file will be ignored.

- ignorePaths: an array of relative paths to ignore.
     If the entry is a directory, the directory's content will be ignored recursively.
     Note: a relative path doesn't start with slash.


getFilesWithPrefix
---------------
2019-03-26

Returns the list of files which name start with the given $prefix.


```php
array  getFilesWithPrefix( str:dir, string:prefix, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

Works like the getFiles method above.





getFilesWithExtension
---------------

Return the files (not dirs) in a given folder, but only if they match the given extension(s).


```php
array  getFiles( str:dir, mixed:extension=null, bool:extensionCaseSensitive=false, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, int:ignoreHidden = 1)
```

string|array|null $extension , the allowed extensions. If null, all extensions are allowed (enhances the tool modularity).


Works like the getFiles method above.





    

