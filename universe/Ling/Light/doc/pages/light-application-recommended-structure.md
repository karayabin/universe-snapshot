Light application recommended structure
=============
2019-04-09 -> 2021-06-18




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
            # an example of service config file for a the Ling.Light_MyPlugin planet 
            - Ling.Light_MyPlugin.byml           

        # The "data" directory contains the plugin private configuration.
        # See the config data directory section for more details: https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-application-recommended-structure.md#the-config-data-directory
        /data:                              
            # an example of configuration data directory for the Ling.Light_MyPlugin planet
            /Ling.Light_MyPlugin:
                
        # The "open" directory is reserved for dynamic plugins intercommunication. 
        # For more details, read https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md.
        /open:                           

            # this directory will contain all messages destined to the Ling.Light_MyPlugin planet
            /Ling.Light_MyPlugin:                
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
        # the directory containing templates for the Ling.Light_MyPlugin planet
        /Ling.Light_MyPlugin:                    
            - ...

    # the web root directory (www stands for generic "world wide web" expression, not for the specific www domain name)
    /www:       
        # The index.php script is the entry point for the web app. 
        - index.php
        
        # 
        /libs:

            # We recommend using universe assets organization
            # https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md
            /universe:
                # the galaxy name
                /Ling:
                    # the planet name. Inside this directory, all your web assets.
                    /Light_MyPlugin:                
                        # an example directory, not part of the recommendation
                        /css:                       
                            # an example file, not part of the recommendation
                            - style.css             
                                                               
```




The configuration of a planet is divided in 3 parts:
- services 
- data 
- dynamic



The config services directory
---------
2020-11-10 -> 2021-06-18

The **services** part contains the static configuration as written by the planet author,
and which might be changed from time to time by the application maintainer.

See more details in the [service container document](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md).




The config data directory
---------
2020-11-10 -> 2021-06-18


The **config/data** directory is reserved for planet private configuration.

This means that the application maintainer shouldn't modify the content of this directory: it's reserved for the planet author only.

A planet stores its private configuration in a directory named after itself.
So for instance a planet named **Ling.Light_AAA** will store its private configuration in the following directory:

- config/data/Ling.Light_AAA


Oftentimes, a planet will use other planets.

For instance, planet **Ling.Light_AAA** might use a menu service provided by the **Ling.Light_BBB** planet.

When that's the case, planet **Ling.Light_AAA** needs to define the name and colors of the menu items (for instance).

This is generally done by using [nuggets](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#nugget)
stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files.


So for instance, if planet **Ling.Light_AAA** uses the services provided by planet **Ling.Light_BBB** and **Ling.Light_CCC**, the data structure would look like this:


```yaml
/app:
    /config:
        /data:
            /Ling.Light_AAA:
                /Ling.Light_BBB:
                    - my-apple-conf.byml
                /Ling.Light_CCC:
                    - some-banana-conf.byml
``` 

This is just one example, but the planet author can also store any files he/she needs in order to help its planet work.



The config open directory
---------
2020-11-10 -> 2021-02-22


The **open** directory is a directory for **service providers**.

More details in the [open vs close registration document](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md).














