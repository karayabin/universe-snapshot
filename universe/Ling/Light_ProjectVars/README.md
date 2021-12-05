Light_ProjectVars
===========
2021-06-11 -> 2021-06-28



Access variables specific to your project.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ProjectVars
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ProjectVars
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ProjectVars api](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
project_vars:
    instance: Ling\Light_ProjectVars\Service\LightProjectVarsService
    methods:
        setContainer:
            container: @container()
        setVariables:
            vars: ${project_vars_vars.variables}



$project_vars_vars.variables:
    project_name: my_project
    website: myproject.com





```



History Log
=============

- 1.0.1 -- 2021-06-28

    - add website var
  
- 1.0.0 -- 2021-06-11

    - initial commit