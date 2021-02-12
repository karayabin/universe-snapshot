[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Util\DiffUtil class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DiffUtil.md)


DiffUtil::getDiffMap
================



DiffUtil::getDiffMap — Compares the two maps which paths are given, and returns a diff map array.




Description
================


public [DiffUtil::getDiffMap](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DiffUtil/getDiffMap.md)(string $mapPathSource, string $mapPathDest, ?array $options = []) : array




Compares the two maps which paths are given, and returns a diff map array.
The structure of the diff map array is the following:

- add: []       # list of files existing in source, not in dest
- remove: []    # list of files existing in dest, not in source
- replace: []   # list of files existing in both source and dest, but their hash_id is different


To make the destination a clone of the source, you would need to:

- remove the files listed in "remove" from the destination
- copy (with overwriting) the files listed in "add" and "replace" from the source to the destination




Parameters
================


- mapPathSource

    

- mapPathDest

    

- options

    - ignoreName: list of file/directory names to ignore
- ignorePath: list of file/directory relative paths to ignore


Return values
================

Returns array.








Source Code
===========
See the source code for method [DiffUtil::getDiffMap](https://github.com/lingtalfi/Deploy/blob/master/Util/DiffUtil.php#L38-L108)


See Also
================

The [DiffUtil](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Util/DiffUtil.md) class.



