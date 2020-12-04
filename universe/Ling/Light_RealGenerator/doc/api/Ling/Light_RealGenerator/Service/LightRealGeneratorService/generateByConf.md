[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Service\LightRealGeneratorService class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md)


LightRealGeneratorService::generateByConf
================



LightRealGeneratorService::generateByConf — according to the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md) identified by the given file and identifier.




Description
================


public [LightRealGeneratorService::generateByConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generateByConf.md)(array $conf, ?array $options = []) : void




Generates the configuration files for both the [realist](https://github.com/lingtalfi/Light_Realist) and [realform](https://github.com/lingtalfi/Light_Realform) plugins,
according to the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md) identified by the given file and identifier.

Returns the configuration array used.


The default identifier defaults to "main".

Available options are:
- file: the path to the file from which the conf originated (if it does originate from a file).
     This will only be used in debug messages, to provide more info to the debugging developer.




Parameters
================


- conf

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealGeneratorService::generateByConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Service/LightRealGeneratorService.php#L97-L204)


See Also
================

The [LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md) class.

Previous method: [generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setContainer.md)<br>

