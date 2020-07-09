Ling/Light_Kit_Admin_Generator
================
2019-11-06 --> 2020-07-06




Table of contents
===========

- [ControllerGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator.md) &ndash; The ControllerGenerator class.
    - [ControllerGenerator::generate](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/ControllerGenerator/generate.md) &ndash; Generates the controller classes according to the given [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md).
    - BaseConfigGenerator::__construct &ndash; Builds the ListConfigGenerator instance.
    - BaseConfigGenerator::setContainer &ndash; Sets the container.
    - BaseConfigGenerator::setDebugCallable &ndash; Sets the debugCallable.
- [LkaGenBaseConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator.md) &ndash; The LkaGenBaseConfigGenerator class.
    - BaseConfigGenerator::__construct &ndash; Builds the ListConfigGenerator instance.
    - BaseConfigGenerator::setContainer &ndash; Sets the container.
    - BaseConfigGenerator::setDebugCallable &ndash; Sets the debugCallable.
- [MenuConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md) &ndash; The MenuConfigGenerator class.
    - [MenuConfigGenerator::generate](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator/generate.md) &ndash; Generates the menu configuration files according to the given [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md).
    - BaseConfigGenerator::__construct &ndash; Builds the ListConfigGenerator instance.
    - BaseConfigGenerator::setContainer &ndash; Sets the container.
    - BaseConfigGenerator::setDebugCallable &ndash; Sets the debugCallable.
- [LightKitAdminGeneratorService](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService.md) &ndash; The LightKitAdminGeneratorService class.
    - LightRealGeneratorService::__construct &ndash; Builds the LightRealGeneratorService instance.
    - LightRealGeneratorService::generate &ndash; according to the [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md) identified by the given file and identifier.
    - LightRealGeneratorService::setContainer &ndash; Sets the container.
    - LightRealGeneratorService::setOptions &ndash; Sets the options.
    - LightRealGeneratorService::debugLog &ndash; Sends a message to the debugLog, if the **useDebug** option is set to true.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light_RealGenerator](https://github.com/lingtalfi/Light_RealGenerator)
- [Light_ControllerHub](https://github.com/lingtalfi/Light_ControllerHub)


