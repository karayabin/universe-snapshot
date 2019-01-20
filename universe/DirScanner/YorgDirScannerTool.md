YorgDirScannerTool
==============
2016-01-09



Utility to scan a directory.



Based on the [DirScanner](https://github.com/lingtalfi/DirScanner).



getDirs
---------------

Return the dirs in a given folder.


```php
array  getDirs( str:dir, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, bool:ignoreHidden = true)
```

Works like the getFiles method below.





getEntries
---------------
2017-04-18

Return the entries (files or dirs) in a given folder.


```php
array  getEntries( str:dir, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, bool:ignoreHidden = true)
```

Works like the getFiles method below.




getFiles
---------------

Return the files (not dirs) in a given folder.


```php
array  getFiles( str:dir, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, bool:ignoreHidden = true)
```

With the relativePath option, the returned array contains relative paths;
without the relativePath option, the returned array contains absolute paths.


Example

```php
<?php


use DirScanner\YorgDirScannerTool;

require_once "bigbang.php";


$dir = "service";
a(YorgDirScannerTool::getFiles($dir, true, true)); 
```






getFilesWithExtension
---------------

Return the files (not dirs) in a given folder, but only if they match the given extension(s).


```php
array  getFiles( str:dir, mixed:extension=null, bool:extensionCaseSensitive=false, bool:recursive = false, bool:relativePath = false, bool:followSymlinks = false, bool:ignoreHidden = true)
```

string|array|null $extension , the allowed extensions. If null, all extensions are allowed (enhances the tool modularity).


Works like the getFiles method above.





    

