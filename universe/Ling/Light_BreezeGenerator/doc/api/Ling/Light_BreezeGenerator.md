Ling/Light_BreezeGenerator
================
2019-09-11 --> 2020-02-13




Table of contents
===========

- [LightBreezeGeneratorException](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Exception/LightBreezeGeneratorException.md) &ndash; The LightBreezeGeneratorException class.
- [BreezeGeneratorInterface](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface.md) &ndash; The BreezeGeneratorInterface interface.
    - [BreezeGeneratorInterface::generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface/generate.md) &ndash; Generates some php classes based on the given configuration.
- [LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md) &ndash; The LingBreezeGenerator class.
    - [LingBreezeGenerator::__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/__construct.md) &ndash; Builds the LingBreezeGenerator instance.
    - [LingBreezeGenerator::setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/setContainer.md) &ndash; Sets the light service container interface.
    - [LingBreezeGenerator::generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generate.md) &ndash; Generates some php classes based on the given configuration.
    - [LingBreezeGenerator::generateObjectClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectClass.md) &ndash; Returns the content of an object class based on the given variables.
    - [LingBreezeGenerator::generateObjectInterfaceClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectInterfaceClass.md) &ndash; Returns the content of an object interface class based on the given variables.
    - [LingBreezeGenerator::generateObjectFactoryClass](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectFactoryClass.md) &ndash; Returns the content of an object factory class based on the given variables.
    - [LingBreezeGenerator::generateObjectBase](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator/generateObjectBase.md) &ndash; Returns the content of an object abstract parent class based on the given variables.
- [LightBreezeGeneratorService](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService.md) &ndash; The LightBreezeGeneratorService class.
    - [LightBreezeGeneratorService::__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/__construct.md) &ndash; Builds the LightBreezeGeneratorService instance.
    - [LightBreezeGeneratorService::generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/generate.md) &ndash; Calls a generator and uses it to generate some php classes.
    - [LightBreezeGeneratorService::setConf](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/setConf.md) &ndash; Sets the conf.
    - [LightBreezeGeneratorService::addConfigurationEntryByFile](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/addConfigurationEntryByFile.md) &ndash; Adds a configuration entry referenced by the given key, and which content is defined in the given [babyYaml](https://github.com/lingtalfi/BabyYaml) file.
    - [LightBreezeGeneratorService::setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/setContainer.md) &ndash; Sets the container.
- [LightBreezeGeneratorTool](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Tool/LightBreezeGeneratorTool.md) &ndash; The LightBreezeGeneratorTool class.
    - [LightBreezeGeneratorTool::getClassNameByTable](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Tool/LightBreezeGeneratorTool/getClassNameByTable.md) &ndash; Returns a ClassName from a given table.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_DatabaseInfo](https://github.com/lingtalfi/Light_DatabaseInfo)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [SqlWizard](https://github.com/lingtalfi/SqlWizard)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)


