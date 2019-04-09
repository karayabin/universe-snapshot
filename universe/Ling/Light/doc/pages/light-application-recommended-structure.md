Light application recommended structure
=============
2019-04-09




Light is quite an agnostic framework and let you create any web application you want.

However, here is some organization for files in a Light app that I consider good practice.

The main idea is grouping files by plugins, and don't use shortcut names (to make things simpler).


Here are the potential directories of my ideal light web app:



```yaml
/app:
    /config:                                # contains configuration of the app
        /services:                          # contains the services of the light app  
            - /Light_MyPlugin.byml          # an example config file
    
    /templates:                             # a directory containing templates of the light plugins, and/or templates in general 
        /Light_MyPlugin:                    # the directory containing templates for the Light_MyPlugin plugin
            - ...
    /www:                                   # the web root directory
        /plugins:                           # the directory for light plugins web assets
            /Light_MyPlugin:                # the web assets dir for the Light_MyPlugin planet
                /css:                       # an example directory, not part of the recommendation
                    - style.css             # an example file, not part of the recommendation
                        
                                 
```






