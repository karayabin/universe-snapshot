Light Application Configurator, conception notes
====================
2019-07-18



The application configurator service let you configure your light instance from a service configuration file.

This means, instead of manually registering your routes in the index.php file, you can register them
from the service configuration files.


The main idea behind this is to ease re-usability of an application's configuration.

For instance, plugins will be able to create an application configuration (so that when you install the plugin,
you already have a working app with all routes registered).

Also, it's easy to copy/paste a configuration file, thus we can easily recreate an application or part of it,
just by copy/pasting its configuration file, or only the bits that we want.



Note: In order to ease the implementation of this idea, we will work with controller as classes rather than
just php callable functions, since classes are easier to store than callable functions.
 
 
Bundles
---------
The application configuration is organized in so-called **bundles**.

A bundle is basically an ensemble of routes/controller bindings.

The benefit of using bundles is that we can apply methods to the whole bundle at once.

For instance, imagine an admin bundle, and we want to add the **/admin** url prefix to all urls; that's 
trivial because of the bundle.


Application configuration
-------------------
2019-07-19

Another thing that this service provides is a generalized application configuration.
So far, there was no place to write the application configuration, except in the service configuration files.

Now with the LightApplicationConfigurator, we can have a proper place to configure the application.

The application configuration will not only be available to other plugins via the service, but also to controllers.


Structure of the files
---------------------

In this section I want to discuss about the files structure.
All the application configuration is stored in [BabyYaml](https://github.com/lingtalfi/BabyYaml) files, and all those
files are stored in a root directory: **config/application_configurator**.

Inside this directory, we have the following parts:

- the bundles
- the application configuration

And the file structure looks like this:

```txt
- config/application_configurator/
----- appconf.byml  
----- appconf/  
--------- Light_Plugin_One.byml  
--------- Light_Plugin_Two.byml  
--------- ...    
----- bundles.byml  
----- bundles/  
--------- Light_Plugin_One.byml  
--------- Light_Plugin_Two.byml  
--------- ...  

```


The **appconf.byml** file is reserved for the application maintainer, and the **appconf** directory is where third-party
plugins put their application configuration. The application maintainer file will always override any configuration
directive in case of conflict.

The same idea with the **bundles.byml** file and the **bundles** directory: the file is for the application maintainer,
whereas the directory is for the third-party plugins.







 
















 