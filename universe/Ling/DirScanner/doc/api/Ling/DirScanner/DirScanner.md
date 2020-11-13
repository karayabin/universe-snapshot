[Back to the Ling/DirScanner api](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner.md)



The DirScanner class
================
2019-03-20 --> 2020-08-18






Introduction
============

The DirScanner class.



Class synopsis
==============


class <span class="pl-k">DirScanner</span>  {

- Properties
    - private string [$rootDir](#property-rootDir) ;
    - private bool [$followLinks](#property-followLinks) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/create.md)() : [DirScanner](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner.md)
    - public [scanDir](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/scanDir.md)($dir, $callable) : array
    - public [setFollowLinks](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/setFollowLinks.md)(bool $followLinks) : [DirScanner](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner.md)
    - private [doScanDir](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/doScanDir.md)($dir, $relDir, $callable, $level, array &$ret) : void
    - protected [error](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/error.md)($msg) : void

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-followLinks"><b>followLinks</b></span>

    This property holds the followLinks for this instance.
    Whether to follow symlinks directories.
    
    



Methods
==============

- [DirScanner::__construct](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/__construct.md) &ndash; Builds the DirScanner instance.
- [DirScanner::create](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/create.md) &ndash; A static way of instantiating the class.
- [DirScanner::scanDir](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/scanDir.md) &ndash; Scans a directory, and collect items (using to the given callable) along the way.
- [DirScanner::setFollowLinks](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/setFollowLinks.md) &ndash; Sets the followLinks property for this instance.
- [DirScanner::doScanDir](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/doScanDir.md) &ndash; The working horse behind the scanDir method.
- [DirScanner::error](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/DirScanner/error.md) &ndash; Throws a runtime exception.





Location
=============
Ling\DirScanner\DirScanner<br>
See the source code of [Ling\DirScanner\DirScanner](https://github.com/lingtalfi/DirScanner/blob/master/DirScanner.php)



SeeAlso
==============
Next class: [NestedFileTreeHelper](https://github.com/lingtalfi/DirScanner/blob/master/doc/api/Ling/DirScanner/NestedFileTreeHelper.md)<br>
