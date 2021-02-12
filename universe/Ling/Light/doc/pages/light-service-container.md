Light Service Container
================
2019-07-17 -> 2021-02-09



The Light Service Container is a service container available for a light application.


To attach the service container to the application, we can do the following:


```php
$light->setContainer($container);
```


The service container brings third-party services to the application, thus being a powerful tool. 




Configuration
---------------
2019-07-17 -> 2020-11-10


### The configuration structure
2019-07-17 -> 2021-02-09



To configure the service container, we use [baby yaml](https://github.com/lingtalfi/BabyYaml) files.

The files are organized in a directory under the **config/services** of the application root directory, like this:


```txt
- app_dir/
----- config/
--------- services/
------------- ... (all configuration files here)
------------- Light_Service_One.byml
------------- Light_Service_Two.byml
------------- _zzz.byml
------------- ... (all configuration files here)
```


The **config/services** directory contains the so-called **service configuration files**, which define the services
to add to the (service) container. 

All **service configuration files** should have the **.byml** file extension, which is the extension for babyYaml files.


All **service configuration files** should be direct children of the **config/services** directory, no recursion allowed.

The directories found inside the **config/services** are reserved for the [environment sensitive files](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/environments.md).

If your service needs extra configuration like data, use the **config/data** directory (see the [light application recommended structure](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-application-recommended-structure.md)) document for more details.


By convention, if the service configuration file is brought by a third-party plugin, the configuration file
has the same name as the plugin. So for instance if the plugin is **Light_ReverseRouter**, then the corresponding
configuration file will be named **Light_ReverseRouter.byml**. 



The resulting configuration is created by parsing all the configuration files one by one, and merging them on the fly.

We use the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md) to create services and register them to the container.

The service container configuration is basically the result of some array manipulation (more on that later).

The order in which configuration files are parsed is important, because the file **z.byml** will potentially override 
the file **a.byml** (in case of conflicts).



What about planets from other universes?
------------
2020-12-03


If you look closely at the configuration structure of light, you'll notice that the galaxy name of the planets don't appear anywhere.

The reason for that is that light comes from the **Ling** galaxy, which was the only galaxy at the time the light framework was created.

As for now, we don't intend to rewrite the inner mechanisms of the light framework, because we like the way the framework works right now (i.e. implementing galaxies would mean
longer names for every body).


Planets from other galaxies can be used in the light framework, as long as all planet names don't conflict with each other.

We believe that planet authors can make this work.






### The zzz.byml file
2019-07-17 -> 2020-08-17


You might have noticed the **_zzz.byml** file in my previous example. This is a convention I personally use (you can use it too)
to ensure that this file is executed after all the other files. 

I call it the application maintainer's file since it overrides all the other files, and so I use it 
to tweak potentially any service configuration that I want.

Often, I will put in there the configuration that cannot be guessed by plugin authors, such as:

- the database credentials
- the smtp credentials and info (port, host, etc...)

Also, all the maintainer's preferences will go in that file, such as for instance:

- which type of user notifications should I send by email to the administrator of the app 



For instance if the service provided by a third party plugin is not exactly as I want, I will override the part that I don't like
from the **_zzz.byml** file rather than directly from the service configuration file.

That's because the service configuration file provided by the third-party plugin might be rewritten in case of a reinstall/reimport
of the plugin.


Now depending on your system, you might want to use a file named **zzz.byml** (without the leading underscore) instead.
It depends whether or not the underscore is treated before the a or after the z on your system.

The only thing that really matters is that this file is executed after the others.
I added the underscore prefix because I wanted this file to APPEAR before the others in my IDE (weirdly enough, my IDE
shows the file at the top of the others if it starts with an underscore, but the file is still parsed as the last one).

And so being on the top of the others, it's easier for me to access it when I open the **config/services** directory and 
there are plenty of configuration files in it.



### The configuration merging mechanism
2019-07-17 -> 2020-11-10

How are the service configuration files combined?

The mechanism used is basically to convert all service configuration files to arrays, and merge those arrays together on the fly.

It's only array manipulation (i.e. there is no php logic involved).

However, there are some syntactic tricks to give us more flexibility to play with.


The object that implements the merging of the service configuration files is the [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md) class.

Read the documentation for this class to understand the nitty-gritty details of how it's implemented.


As a quick reminder, here are some special notation that we can use in the service container:


- ${app_dir}                the application root directory. This variable is passed by the ServiceContainerHelper (the object used to instantiate the container in a light app).
- @service(my_service)      to call another service, this is provided by the [Octopus](https://github.com/lingtalfi/Octopus) implementation used by the light service container by default.
- @container()              to reference the service container itself, this is also provided by Octopus 


We can also use the [variable reference mechanism of the SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md#variable-references) class to override any property of the resulting
configuration array, like this:

```yaml
my_vars:
    app_dir: /komin/jin_site_demo



$zephyr_template_vars.root_dir: ${my_vars.app_dir}


```

If you do so, be sure that the configuration file containing the code above is called AFTER the other
configuration files. 






A typical service configuration file structure
------------------
2019-10-04


After having created a few service configuration files, I've now found an organization I want to share with you,
because I believe it's flexible and can handle any situation (at least any situation I've come across so far).

Basically, you have between one and three parts depending on your needs:

- the service declaration part (mandatory)
- the hooks part (optional), where you register/subscribe to other plugins
- the variables part (optional), where you replace variables that other plugins allow you to configure


I like to separate those three parts with decorative comments (see below).

A fictional service configuration which uses those three parts would look like this:


```yaml 
my_service:
    instance: MyGalaxy\Light_MyService\Service\LightMyService
    

    
    
# --------------------------------------
# hooks
# --------------------------------------
$realist.methods_collection:
    -
        method: registerListRenderer
        args:
            identifier: Light_MyService
            renderer:
                instance: Ling\Bootstrap4AdminTable\Renderer\StandardBootstrap4AdminTableRenderer

# --------------------------------------
# vars
# --------------------------------------
$user_data_vars.install_parent_plugin: Light_MyService

    
```
  







 








   























