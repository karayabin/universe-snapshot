[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\ConfigurationHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md)


ConfigurationHelper::getCombinedConf
================



ConfigurationHelper::getCombinedConf — Returns the merged configuration of all [BabyYaml](https://github.com/lingtalfi/BabyYaml) configuration files found in the given directory.




Description
================


public static [ConfigurationHelper::getCombinedConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper/getCombinedConf.md)(string $directory, array $environmentVariables = []) : array




Returns the merged configuration of all [BabyYaml](https://github.com/lingtalfi/BabyYaml) configuration files found in the given directory.
The merging uses the rules of the [arrayMergeReplaceRecursive](https://github.com/lingtalfi/Bat/blob/master/ArrayTool.md#arraymergereplacerecursive) algorithm.




Parameters
================


- directory

    

- environmentVariables

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







See Also
================

The [ConfigurationHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md) class.



