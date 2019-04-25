[Back to the Ling/HashMap api](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap.md)



The HashMapUtil class
================
2019-04-18 --> 2019-04-18






Introduction
============

The HashMapUtil class.

This class helps creating a hash map.


Hash map
------------
A hash map is a file containing a list of relative file names along with their hash identifier.
Each line contains the following format:

```txt
$relative_path::$file_id
```

Where $relative_path is the relative path of the file (relative to the root dir),
and $file_id is some kind of hash (a unique identifier) for the file.



How to use
-------------

This util has basically two modes:

- either you specify the root dir without paths, in which case all files inside the root dir will be added recursively to the map
- or you specify the root dir AND some paths, in which case only the files indicated by the paths are added to the map.
     Note: a path can also point to a directory, in which case the directory and its content are added recursively to the map.



Class synopsis
==============


class <span class="pl-k">HashMapUtil</span>  {

- Properties
    - protected string [$rootDir](#property-rootDir) ;
    - protected array [$paths](#property-paths) ;
    - protected array [$ignoreNames](#property-ignoreNames) ;
    - protected array [$ignorePaths](#property-ignorePaths) ;
    - protected int [$ignoreHidden](#property-ignoreHidden) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/__construct.md)() : void
    - public [setRootDir](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setRootDir.md)(string $rootDir) : [HashMapUtil](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil.md)
    - public [setPaths](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setPaths.md)(array $paths) : [HashMapUtil](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil.md)
    - public [setIgnoreNames](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setIgnoreNames.md)(array $ignoreNames) : [HashMapUtil](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil.md)
    - public [setIgnorePaths](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setIgnorePaths.md)(array $ignorePaths) : [HashMapUtil](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil.md)
    - public [setIgnoreHidden](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setIgnoreHidden.md)(int $ignoreHidden) : [HashMapUtil](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil.md)
    - public [createMap](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/createMap.md)(string $mapFile) : bool

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-paths"><b>paths</b></span>

    This property holds the paths for this instance.
    It's an array of relative paths (relative to the root dir).
    If this array is empty, then all files of the root dir are added recursively.
    Otherwise, only the paths are used.
    
    

- <span id="property-ignoreNames"><b>ignoreNames</b></span>

    This property holds the ignoreNames for this instance.
    An array of entry name to ignore.
    If the entry is a directory, it will be ignored recursively.
    
    

- <span id="property-ignorePaths"><b>ignorePaths</b></span>

    This property holds the ignorePaths for this instance.
    An array of relative paths to ignore (relative to the root dir).
    If the entry is a directory, it will be ignored recursively.
    
    

- <span id="property-ignoreHidden"><b>ignoreHidden</b></span>

    This property holds the ignoreHidden for this instance.
    An int representing which files/dirs to ignore.
    
    - 0: do not ignore anything
    - 1: ignore hidden dirs (dirs which name start with a dot)
    - 2: ignore hidden dirs and hidden files (files which name start with a dot)
    
    



Methods
==============

- [HashMapUtil::__construct](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/__construct.md) &ndash; Builds the HashMapUtil instance.
- [HashMapUtil::setRootDir](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setRootDir.md) &ndash; Sets the rootDir.
- [HashMapUtil::setPaths](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setPaths.md) &ndash; Sets the paths.
- [HashMapUtil::setIgnoreNames](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setIgnoreNames.md) &ndash; Sets the ignoreNames.
- [HashMapUtil::setIgnorePaths](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setIgnorePaths.md) &ndash; Sets the ignorePaths.
- [HashMapUtil::setIgnoreHidden](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/setIgnoreHidden.md) &ndash; Sets the ignoreHidden.
- [HashMapUtil::createMap](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil/createMap.md) &ndash; Creates the map in the given $mapFile, and returns whether the operation was successful.





Location
=============
Ling\HashMap\Util\HashMapUtil


SeeAlso
==============
Previous class: [HashMapException](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Exception/HashMapException.md)<br>
