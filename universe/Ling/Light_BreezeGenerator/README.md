Light_BreezeGenerator
===========
2019-09-11



A simple orm generator service with different flavours, for the [light](https://github.com/lingtalfi/Light) framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/BreezeGenerator
```

Or just download it and place it where you want otherwise.






Summary
===========
- [BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/conception-notes.md)
    - [Ling breeze generator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator.md)
    - [Ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- breeze_generator



Here is an example of the service configuration:

```yaml
breeze_generator:
    instance: Ling\Light_BreezeGenerator\Service\LightBreezeGeneratorService
    methods:
        setContainer:
            container: @container()
        setConf:
            conf:
                ling:
                    class: Ling\Light_BreezeGenerator\Generator\LingBreezeGenerator
                    conf:
                        dir: ${app_dir}/tmp/Light_BreezeGenerator
                        # If your tables use a prefix, set it here, then configure the behaviour
                        # with the usePrefixInClassName property
                        prefix: lud
                        usePrefixInClassName: false
                        factoryClassName: LightKitAdmin
                        namespace: Ling\Test\$prefix
                        # The suffix to add to the class name.
                        # For instance if the class is User and the suffix is Object,
                        # The class name will be UserObject
                        # The default value is Object
                        classSuffix: Object
                        # Whether to overwrite existing files (if false, skip them)
                        # Used mainly for debugging purposes, in production you probably should set this to false
                        # The default value is false
                        overwriteExisting: false
                        generate:
                            prefix: lud


```




History Log
=============

- 1.2.0 -- 2019-09-16

    - add usePrefixInClassName option in the service configuration
    - now LingBreezeGenerator doesn't include the namespace automatically in the path of the generated file
    
- 1.1.1 -- 2019-09-16

    - add documentation precision for lsom
    
- 1.1.0 -- 2019-09-16

    - update getXXX method, add a default return argument
    
- 1.0.7 -- 2019-09-13

    - add arguments to "ling standard object methods" doc
    
- 1.0.6 -- 2019-09-13

    - add line to "ling standard object methods"
    
- 1.0.5 -- 2019-09-13

    - added "ling standard object methods" concept
    
- 1.0.4 -- 2019-09-13

    - added example of ling breeze generator
    
- 1.0.3 -- 2019-09-13

    - fix wrong service example in README.md
    
- 1.0.2 -- 2019-09-13

    - fix doc links
    
- 1.0.1 -- 2019-09-13

    - fix doc links
    
- 1.0.0 -- 2019-09-13

    - initial commit