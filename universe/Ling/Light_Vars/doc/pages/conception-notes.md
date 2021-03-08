Light_Vars, conception notes
================
2021-02-25


This service provides a container for variables.

Plugins can get/set their variables to our variable container.


We also provide some variable resolution utilities, to make it easier to use variables in different mediums.




Light variables
------------
2021-02-25


A light variable is a variable stored in our variable container.






History, the original idea behind the variable container
----------
2021-02-25


The original idea was to palliate the fact that the light container wasn't able to store variables written 
in the configuration files.

As a plugin author myself, I like to be able to define all my variables in a single configuration file, 
which is the service configuration file of my plugin.

By convention in light, the "public" variables of a service should be stored in the **my_service_vars** array, in 
the configuration file, like this:

```yaml
my_service:
    instance: blabla/class      # the service instantiation

my_service_vars:        # this is the recommended place for a service's public variables
    var1: one
    var2: two
    ...

```


The problem with the service public variables is that they can just be used inside the creation of the container,
but they are not accessible after that, unless you register them to a service of course.


So the main idea with our service, is that rather letting plugin authors register their own variables on their own,
they use our service, like this:

```yaml

my_service:
    instance: blabla/class      # the service instantiation

my_service_vars:        # this is the recommended place for a service's public variables
    var1: one
    var2: two
    ...
    
    
# --------------------------------------
# hooks
# --------------------------------------
$vars.methods_collection:
    -
        method: setVar
        args:
            key: my_service_vars
            value: ${my_service_vars}
```


The benefits of this approach are:

- the plugin author controls which variable is publicly accessible, and which is not
- our service centralizes all the variables for all plugins (i.e. the author doesn't need to re-invent the wheel everytime he wants to provide public variables)












