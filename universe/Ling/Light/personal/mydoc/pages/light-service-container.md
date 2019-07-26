Light Service Container
================
2019-07-17



The Light Service Container is a service container available for a light application.


To attach the service container to the application, we can do the following:


```php
$light->setContainer($container);
```


The service container brings third-party services to the application, thus being a powerful tool. 




Configuration
---------------


### The configuration structure

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


All configuration files should have the **.byml** file extension, which is the extension for babyYaml files.

By convention, if the service configuration file is brought by a third-party plugin, the configuration file
has the same name as the plugin. So for instance if the plugin is Light_ReverseRouter, then the corresponding
configuration file will be named Light_ReverseRouter.byml. 



The resulting configuration is created by parsing all the configuration files one by one, and merging them on the fly.
The service container configuration is basically the result of some array manipulation (more on that later).

The order in which configuration files are parsed is important, because the file **z.byml** will potentially override 
the file **a.byml** (in case of conflicts).


### The zzz.byml file

You might have noticed the **_zzz.byml** file in my previous example. This is a convention I personally use (you can use it too)
to ensure that this file is executed after all the other files. 

I call it the application maintainer's file since it overrides all the other files, and so I use it 
to tweak potentially any service configuration that I want.

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

How are the service configuration files combined together?

The mechanism used is basically to convert all service configuration files to arrays, and merge those arrays together on the fly.

It's only array manipulation (i.e. there is no php logic involved).

However, there are some syntactic tricks to give us more flexibility to play with.


The object that implements the merging of the service configuration files is the [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md) class.

Read the documentation for this class to understand the nitty-gritty details of how it's implemented.


As a quick reminder, here are some special notation that we can use in the service container:


- ${app_dir}                the application root directory. This variable is passed by the ServiceContainerHelper (the object used to instantiate the container in a light app).
- @service(my_service)      to call another service, this is provided by the [Octopus](https://github.com/lingtalfi/Octopus) implementation used by the light service container by default.
- @container(my_service)    to reference the service container itself, this is also provided by Octopus 


We can also use the [variable reference mechanism of the SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md#variable-references) class to override any property of the resulting
configuration array, like this:

```yaml
my_vars:
    app_dir: /komin/jin_site_demo



$zephyr_template_vars.root_dir: ${my_vars.app_dir}


```

If you do so, be sure that the configuration file containing the code above is called AFTER the other
configuration files. 









  







 








   























