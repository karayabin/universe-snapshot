[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)<br>
[Back to the Ling\SicTools\Util\SicFileCombinerUtil class](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md)


SicFileCombinerUtil::combine
================



SicFileCombinerUtil::combine — Combines the babyYaml files found in the given directory, and returns the resulting array.




Description
================


public [SicFileCombinerUtil::combine](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/combine.md)(string $directory, ?array $options = []) : array




Combines the babyYaml files found in the given directory, and returns the resulting array.
The target merge/replace syntax described above in this class comments applies.


Available options are:

- recursive: whether to parse the files recursively. If false, only the direct children of the given directory will be parsed.
- preLazyVars: array of lazyVarItems, each of which:
     - 0: bdot key
     - 1: value
     - 2: filename (for debugging)

     If this option is defined, will inject the given lazy var items with the built service configuration BEFORE
     the lazy var regular resolution.




Parameters
================


- directory

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [SicToolsException](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Exception/SicToolsException.md).&nbsp;







Source Code
===========
See the source code for method [SicFileCombinerUtil::combine](https://github.com/lingtalfi/SicTools/blob/master/Util/SicFileCombinerUtil.php#L373-L485)


See Also
================

The [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md) class.

Previous method: [setEnvironmentVariables](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setEnvironmentVariables.md)<br>Next method: [injectLazyVars](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/injectLazyVars.md)<br>

