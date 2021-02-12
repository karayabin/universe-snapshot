[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ConfigurationHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md)


ConfigurationHelper::getCombinedConf
================



ConfigurationHelper::getCombinedConf — Returns the merged configuration of all [BabyYaml](https://github.com/lingtalfi/BabyYaml) configuration files found in the given directory.




Description
================


public static [ConfigurationHelper::getCombinedConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper/getCombinedConf.md)(string $directory, ?array $environmentVariables = [], ?array $options = []) : array




Returns the merged configuration of all [BabyYaml](https://github.com/lingtalfi/BabyYaml) configuration files found in the given directory.
The merging uses the rules of the [arrayMergeReplaceRecursive](https://github.com/lingtalfi/Bat/blob/master/ArrayTool.md#arraymergereplacerecursive) algorithm.


Available options are:
- preLazyVars: array of lazy var items to pass to the [SicFileCombinerUtil->combine method](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md).




Parameters
================


- directory

    

- environmentVariables

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ConfigurationHelper::getCombinedConf](https://github.com/lingtalfi/Light/blob/master/Helper/ConfigurationHelper.php#L33-L45)


See Also
================

The [ConfigurationHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md) class.



