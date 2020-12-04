Ling/Light_RealGenerator
================
2019-10-24 --> 2020-12-01




Table of contents
===========

- [LightRealGeneratorException](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Exception/LightRealGeneratorException.md) &ndash; The LightRealGeneratorException class.
- [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md) &ndash; The BaseConfigGenerator class.
    - [BaseConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md) &ndash; Builds the ListConfigGenerator instance.
    - [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md) &ndash; Sets the container.
    - [BaseConfigGenerator::setDebugCallable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setDebugCallable.md) &ndash; Sets the debugCallable.
- [FormConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator.md) &ndash; The FormConfigGenerator class.
    - [FormConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/__construct.md) &ndash; Builds the ListConfigGenerator instance.
    - [FormConfigGenerator::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/FormConfigGenerator/generate.md) &ndash; Generates the list configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
    - [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md) &ndash; Sets the container.
    - [BaseConfigGenerator::setDebugCallable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setDebugCallable.md) &ndash; Sets the debugCallable.
- [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md) &ndash; The ListConfigGenerator class.
    - [ListConfigGenerator::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator/generate.md) &ndash; Generates the list configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).
    - [BaseConfigGenerator::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/__construct.md) &ndash; Builds the ListConfigGenerator instance.
    - [BaseConfigGenerator::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setContainer.md) &ndash; Sets the container.
    - [BaseConfigGenerator::setDebugCallable](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setDebugCallable.md) &ndash; Sets the debugCallable.
- [LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md) &ndash; The LightRealGeneratorService class.
    - [LightRealGeneratorService::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/__construct.md) &ndash; Builds the LightRealGeneratorService instance.
    - [LightRealGeneratorService::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md) &ndash; Same as generateByConf method, but takes the file path instead of the array.
    - [LightRealGeneratorService::generateByConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generateByConf.md) &ndash; according to the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md) identified by the given file and identifier.
    - [LightRealGeneratorService::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setContainer.md) &ndash; Sets the container.
    - [LightRealGeneratorService::setOptions](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setOptions.md) &ndash; Sets the options.
    - [LightRealGeneratorService::debugLog](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/debugLog.md) &ndash; Sends a message to the debugLog, if the **useDebug** option is set to true.
- [RepresentativeColumnFinderUtil](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil.md) &ndash; The RepresentativeColumnFinderUtil class.
    - [RepresentativeColumnFinderUtil::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/__construct.md) &ndash; Builds the RepresentativeColumnFinderUtil instance.
    - [RepresentativeColumnFinderUtil::findRepresentativeColumn](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/findRepresentativeColumn.md) &ndash; Returns the [representative column](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/conception-notes.md#the-representative-column) from the given table name.
    - [RepresentativeColumnFinderUtil::setCommonMatches](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/setCommonMatches.md) &ndash; Sets the commonMatches.
    - [RepresentativeColumnFinderUtil::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil/setContainer.md) &ndash; Sets the container.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_DatabaseInfo](https://github.com/lingtalfi/Light_DatabaseInfo)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)
- [ArrayVariableResolver](https://github.com/lingtalfi/ArrayVariableResolver)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)


