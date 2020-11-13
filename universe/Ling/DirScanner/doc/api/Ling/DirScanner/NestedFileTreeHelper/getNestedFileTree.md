[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\NestedFileTreeHelper class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper.md)


NestedFileTreeHelper::getNestedFileTree
================



NestedFileTreeHelper::getNestedFileTree — Returns a nested structure from a directory.




Description
================


public static [NestedFileTreeHelper::getNestedFileTree](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper/getNestedFileTree.md)(string $dir, ?array $options = []) : array




Returns a nested structure from a directory.


The default nested structure item looks like this:
- name: name of the file
- path: absolute path to the file,
         or relative path if you set the relativePath option to true
- children: array of nested structure items, recursively...
- keyName: string=name, the key to use to reference the name
- keyPath: string=path, the key to use to reference the path
- keyChildren: string=children, the key to use to reference the children




Parameters
================


- dir

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [NestedFileTreeHelper::getNestedFileTree](https://github.com/lingtalfi/DirScanner/blob/master/NestedFileTreeHelper.php#L43-L51)


See Also
================

The [NestedFileTreeHelper](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper.md) class.

Next method: [doIterate](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper/doIterate.md)<br>

