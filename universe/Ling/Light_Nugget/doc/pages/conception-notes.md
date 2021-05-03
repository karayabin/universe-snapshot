Light_Nugget, conception notes
============
2020-08-21 -> 2021-03-09




Summary
-------

- [The suggestion path](#the-suggestion-path)
- [Security recommendation](#security-recommendation)
- [A baked in security system for nugget users](#a-baked-in-security-system-for-nugget-users)
- [Variables replacement](#variables-replacement)
- [Using the light execute notation](#the-light-execute-notation)
- [The getNuggetDirective method](#the-getnuggetdirective-method)




A service to fetch nuggets.



We provide a method to access your [nuggets](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#nugget):


- getNugget (string nuggetId, string relPath): array 


This method is based on naming conventions, and the nugget is stored in a [babyYaml](https://github.com/lingtalfi/BabyYaml) file.



- **nuggetId**: $plugin:$suggestionPath


With:

- $plugin: a plugin identifier, usually the [plugin dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) (for instance Ling.Light_PluginABC)
    For security reasons, the double dot char (..) is not allowed.
    
- $suggestionPath: the suggestion path to the babyYaml file, without the **.byml** extension, and relative to the **nuggetBaseDir** directory (see more details below).
    For security reasons, the double dot char (..) is not allowed.
    The colon char (:) is also not allowed, since it's a delimiter of the nuggetId


- nuggetBaseDir: $app_dir/config/data/$plugin/$relPath/$suggestionPath.byml
- $app_dir: the path to the light application


So the concrete babyYaml file location is stored here:

- $nuggetBaseDir/$suggestionPath.byml


Usually, this method is used by a [provider service](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#provider-service-subscriber-service),
and so the subscriber provides the **nuggetId** (often via ajax), and the relPath is provided by the provider, and by convention it starts with the provider plugin name.


So for instance if we have an imaginary **Xor.Light_SuperList** provider plugin, let's imagine that plugin **Ling.Light_ABC** uses the **Xor.Light_SuperList**.

So it sends an ajax request, passing a nuggetId of: **Ling.Light_ABC:nugget_01**.

The request is then processed by the provider: **Xor.Light_SuperList**, which calls our **getNugget** method with a relPath of: **Xor.Light_SuperList/all** (for instance).

Therefore, in this case the complete path to the nugget file is: 

- $app_dir/config/data/Ling.Light_ABC/Xor.Light_SuperList/all/nugget_01.byml



The suggestion path
-------
2020-08-21 -> 2021-03-09


A suggestion path is basically a path that follows the [generated/custom pattern](https://github.com/lingtalfi/TheBar/blob/master/discussions/generated-custom-config-pattern.md),
but without the **.byml** extension.

So for instance, in the previous example the suggestion path was **nugget_01**.

If the suggestion path was: **nugget_01.generated** for instance, then the concrete nugget file would be searched in the following locations (in order):


- $app_dir/config/data/Ling.Light_ABC/Xor.Light_SuperList/all/nugget_01.custom.byml
- $app_dir/config/data/Ling.Light_ABC/Xor.Light_SuperList/all/nugget_01.generated.byml


  
Security recommendation
----------
2020-08-24 -> 2021-03-09


Plugin authors, remember that the **nuggetId** is often passed via ajax, and therefore anybody can change it.
Since there is a direct correlation between the suggested path and the actual file in the filesystem, we recommend
that you always call the **getNugget** method with a relPath argument that is not only your plugin's name, but also includes an extra subdirectory.

For instance, if your plugin identifier is **Ling.Light_ABC**, use **Ling.Light_ABC/items** (for instance) as your relPath instead of just **Ling.Light_ABC**.

That's because if your plugin ever uses other types of configuration files, you don't want the malicious user to access them just by using a malicious nuggetId.

In other words, use the **relPath** argument to define the chroot dir of your nuggets.


As a general security recommendation, although it's obvious, let me say it again: never trust the user, and consider your ajax script as a gui for the user, and so
never trust the parameters collected via ajax.

In the end, the only thing you can rely on is your permission system, (assuming the user session is not corrupted). 
This means: always check your meaningful action's permissions before executing them, because a malicious user can't access your permission system
just by changing the parameters sent to an ajax script.


  


A baked in security system for nugget users
---------------
2020-09-14


As our service is becoming more popular, we provide a handy system for plugin authors to check whether a user is granted the action described in the nugget.


We basically use the [basic security nugget system](https://github.com/lingtalfi/TheBar/blob/master/discussions/basic-security-nugget.md), but we've also added some extra properties.

To use our security system, add the security directive to your nugget.


It takes the following properties:

- any: (same as the **basic security nugget system**)
- all: (same as the **basic security nugget system**)
- handler: string, the class name of a handler. It must implement our **LightNuggetSecurityHandlerInterface** interface.
    If it's **container** aware (i.e. if it implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md)), it will be passed the container.
- handler_params: array of params to pass to the handler. This doesn't prevent params from other sources to be passed as well.
    
    
If **any** or **all** are defined, they will be used as described in the **basic security nugget system**. In addition to that, 
if the handler is defined, it will be used to make an extra check.


Then, all you need to do is call the **checkSecurity** method of our service, which throws an exception if the user isn't granted the right to execute the action,
based on the security nugget configuration.    





Variables replacement
-------------
2020-09-15 -> 2020-09-21


Being able to use variables in a nugget has some benefits: it makes the file more efficiently organized, and more readable.


We provide a variable replacement mechanism for you. It comes in two flavours:

- a standalone method that plugin authors can use (the **resolveVariables** method)
- by default, when you use our **getNugget** method you can use variables replacement


How to use our variables replacement system?

You need to add the **_vars** special directive to your nugget.
It's an array of key/value pairs. 

Then to use it in your nugget, use the %{myVar} notation.

Note: the value of your variable can also be an array.

Here is an example:

```yaml
_vars:
    firstName: paul
    fruits:
        - apple
        - banana

duelist:
    table: lun_user_notification un
    ric:
        - id
    dessert: %{fruits} 
    owner: %{firstName} 
        
```



The light execute notation
------------
2020-12-03


By default, when you write a nugget, you can use the [light execute notation with light pmp wrapper](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md#light-execute-notation-with-light-pmp-wrapper):
our service will interpret it for free.




The getNuggetDirective method
----------
2020-09-24


Like the **getNugget** method, the **getNuggetDirective** allows us to fetch information in a file.

Only this time instead of retrieving the whole file as an array, we retrieve a specific directive from that file.


The mechanism is very similar to the **getNugget** method:


- getNuggetDirective (string nuggetDirectiveId, string relPath): mixed 



- **nuggetDirectiveId**: $nuggetId:$directivePath

With:

- $nuggetId, the nugget id, defined earlier in this document
- $directivePath, the [bdot](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md) path to the directive to retrieve
    The **directivePath** cannot contain the colon char (:), since it's already used as a separator for the **nuggetDirectiveId**
    
    

About security, our [security recommendation](#security-recommendation) still apply.
    



 












