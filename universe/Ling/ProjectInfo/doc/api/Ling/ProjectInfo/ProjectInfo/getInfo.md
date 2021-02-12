[Back to the Ling/ProjectInfo api](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo.md)<br>
[Back to the Ling\ProjectInfo\ProjectInfo class](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo.md)


ProjectInfo::getInfo
================



ProjectInfo::getInfo — Returns an array of information about the current project.




Description
================


public [ProjectInfo::getInfo](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/getInfo.md)(?array $options = []) : array




Returns an array of information about the current project.

The information is an array of "file extension" => number of occurrences.
The special "(empty)" key contains files without extension (such as LICENCE for instance).
There is also a special key: __extra_project_info__, which is an array with the following structure:

- empty_extensions: array. The details for files with empty extensions.
         It's an array of "file name" => number of occurrences.
- dir: string. The root directory.
- weight_count: array of extension => total weight in mega bytes.
     Note: the extensions are the same as the extensions listed at the root of the info array.
- nb_classes: int. The number of php classes found.
- nb_php_files: int. The number of php files found.
- nb_total_files: int. The total number of files found.
- size_total_files_bytes: int. The total weight of all files in bytes
- size_total_files_megabytes: int. The total weight of all files in mega bytes.




Parameters
================


- options

    An array of options to control the behaviour of the getInfo method.
The entries are:
- followSymlinks: bool=false. Whether the method should follow symlinks (directories).
- hiddenDirs: bool=false. Whether to include the hidden directories (directories which name start with a dot).
- hiddenFiles: bool=false. Whether to include the hidden files (files which name starts with a dot).


Return values
================

Returns array.








Source Code
===========
See the source code for method [ProjectInfo::getInfo](https://github.com/lingtalfi/ProjectInfo/blob/master/ProjectInfo.php#L65-L170)


See Also
================

The [ProjectInfo](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo.md) class.

Previous method: [__construct](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/__construct.md)<br>Next method: [showReport](https://github.com/lingtalfi/ProjectInfo/blob/master/doc/api/Ling/ProjectInfo/ProjectInfo/showReport.md)<br>

