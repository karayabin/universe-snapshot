[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)<br>
[Back to the Ling\DirScanner\DirScanner class](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner.md)


DirScanner::scanDir
================



DirScanner::scanDir — Scans a directory, and collect items (using to the given callable) along the way.




Description
================


public [DirScanner::scanDir](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/scanDir.md)(?$dir, ?$callable) : array




Scans a directory, and collect items (using to the given callable) along the way.




Parameters
================


- dir

    

- callable

    


Return values
================

Returns array.
Array of whatever was returned by the callback (except if it is null)







Source Code
===========
See the source code for method [DirScanner::scanDir](https://github.com/lingtalfi/DirScanner/blob/master/DirScanner.php#L68-L88)


See Also
================

The [DirScanner](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner.md) class.

Previous method: [create](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/create.md)<br>Next method: [setFollowLinks](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/setFollowLinks.md)<br>

