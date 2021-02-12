Light application recommended structure
=============
2019-04-09 -> 2021-02-04




Light is quite an agnostic framework and let you create any web application you want.


The filesystem structure looks like this:


```yaml
/app:
    # The "config" directory contains the configuration files for the app.
    # BabyYaml files are generally used. https://github.com/lingtalfi/BabyYaml
    /config:                                
        # The "services" directory contains the "service configuration files".
        # See more details in the service container document: https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md
        /services:                          
            # an example of service config file for a plugin named Light_MyPlugin  
            - Light_MyPlugin.byml           

        # The "data" directory contains the plugin private configuration.
        # See the config data directory section for more details: https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-application-recommended-structure.md#the-config-data-directory
        /data:                              
            # an example of configuration data directory for a plugin named Light_MyPlugin 
            /Light_MyPlugin:
                
        # The "dynamic" directory is reserved for dynamic plugins intercommunication
        /dynamic:                           

            # this directory will contain all messages destined to the Light_MyPlugin plugin 
            /Light_MyPlugin:                
                - ...

    # A directory containing scripts organized by galaxy/planet            
    /scripts:
        # the directory for scripts from the "Ling" galaxy 
        /Ling:
            # the directory for scripts from the "Light" planet 
            /Light:
                # this is actually a script provided by the light framework. It basically initializes the app. 
                # See more details in the [light init script](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-init-script.md)
                - init.light.inc.php 
                # this script initializes only the service container, but not the light instance. In some cases, you might want to do just that. 
                # For instance, the www/index.php script uses that. 
                - init.container.inc.php 
                

        
    # a directory containing templates of the light plugins, and/or templates in general
    /templates:                             
        # the directory containing templates for the Light_MyPlugin plugin 
        /Light_MyPlugin:                    
            - ...

    # the web root directory (www stands for generic "world wide web" expression, not for the specific www domain name)
    /www:       
        # The index.php script is the entry point for the web app. 
        - index.php
        
        # the directory for light plugins web assets
        /plugins:                           
            # the web assets dir for the Light_MyPlugin planet
            /Light_MyPlugin:                
                # an example directory, not part of the recommendation
                /css:                       
                    # an example file, not part of the recommendation
                    - style.css             
                                                               
```




The configuration of a plugin is divided in 3 parts:
- services 
- data 
- dynamic



The config services directory
---------
2020-11-10

The **services** part contains the static configuration as written by the plugin author,
and which might be changed from time to time by the application maintainer.

See more details in the [service container document](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md).




The config data directory
---------
2020-11-10


The **config/data** directory is reserved for plugins private configuration.

This means that the application maintainer shouldn't modify the content of this directory: it's reserved for the plugin author only.

A plugin stores its private configuration in a directory named after itself.
So for instance a plugin named **Light_AAA** will store its private configuration in the following directory:

- config/data/Light_AAA


Oftentimes, a plugin will use other plugins.

For instance, plugin **Light_AAA** might use a menu service provided by the plugin **Light_BBB**.

When that's the case, plugin **Light_AAA** needs to define the name and colors of the menu items (for instance).

This is generally done by using [nuggets](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#nugget)
stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files.


So for instance, if plugin **Light_AAA** uses the services provided by plugin **Light_BBB** and **Light_CCC**, the data structure would look like this:


```yaml
/app:
    /config:
        /data:
            /Light_AAA:
                /Light_BBB:
                    - my-apple-conf.byml
                /Light_CCC:
                    - some-banana-conf.byml
``` 

This is just one example, but the plugin author can also store any files he/she needs in order to help its plugin work.



The config dynamic directory
---------
2020-11-10


The **dynamic** is fairly new, it's similar to the **data** part as a plugin **Light_AAA** can send configuration bits to a "recipient" service such
as **Light_BBB** or **Light_CCC** for instance. 

The difference is that the recipient plugins will fetch that configuration only when needed (i.e. lazy fetching) rather than
on the app initialization.

Basically, with the **dynamic** directory our idea is to implement the [late service registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/late-service-registration.md). 

The writing in this directory is still static, but the fetching is dynamic, hence the name.













