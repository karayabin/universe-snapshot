Light_UserPreferences
===========
2020-08-13



A [light](https://github.com/lingtalfi/Light) service to store user preferences.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserPreferences
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
user_preferences: 
    instance: Ling\Light_UserPreferences\Service\LightUserPreferencesService
    methods: 
        setContainer: 
            container: @container()
        
        setOptions: 
            options: []
        
    

$plugin_installer.methods_collection: 
    - 
        method: registerPlugin
        args: 
            plugin: Light_UserPreferences
            installer: @service(user_preferences)
        
    


```



History Log
=============

- 1.0.0 -- 2020-08-13

    - initial commit