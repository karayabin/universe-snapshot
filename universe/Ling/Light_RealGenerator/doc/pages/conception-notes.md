Light Real Generator
================
2019-10-23 -> 2020-09-24




The main idea of the real generator is to generate the config files for both the [realist](https://github.com/lingtalfi/Light_Realist) and the [realform](https://github.com/lingtalfi/Light_Realform) plugins,
which is a step towards generating an auto-admin.


The real generator is available as a service, and you basically just call an identifier which is an entry of a [babyYaml](https://github.com/lingtalfi/BabyYaml) file.


You can organize your configurations how you wish: either one per file, or multiple configurations per file, and create as many files as you want.

The main method to execute the generator is: 


- generate( string file, string identifier )



All other configuration is done inside the configuration identified by the given file and identifier.



For nomenclature sake, and ease of development, the expression **configuration block** will be used to represent the configuration
array identified by the aforementioned file and identifier.


To make things simpler, I've limited the generator to generate only configuration files for a given database.

This means if you want to generate configuration files based on tables coming from different databases, you need to call the generator's **generate** method
once per database.





The configuration block
--------------
2019-10-23


See the [configuration block document](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md).





The representative column
---------------
2019-11-13


While implementing the concept of [cross columns](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/crossed-column.md) for this generator,
I was looking for a term to designate the name of the more descriptive column (to help the foreign key look less robotic),
and I came up with the term representative column.

So for instance, let's take back the example from the **cross column** page, with the **user_has_permission** table.
And let's push it a bit further and imagine this structure instead:


```text

- user:
    - id
    - full_name

- user_has_permission:
    - user_id
    - permission_id

- permission:
    - id
    - name

```

Then the representative column for the **user_has_permission.user_id** foreign key would be the **user.full_name** column,
and the representative column for the **user_has_permission.permission_id** foreign key would be the **permission.name** column.


In this example, things are deliberately simple, but in reality, the user table for instance would have more fields to choose from,
and so one of the job of this generator is to use some heuristics to define which column is the best representative
column, but, I digress. 




The variables system
------------
2020-02-26 -> 2020-09-24

The **variables** system lets you declare some custom variables, and inject them wherever you want in the configuration file.

Note that this is similar to the [Light_Nugget _vars system](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md#variables-replacement), except that we also allow replacing keys (so it's a bit more
powerful).


To use the **variables** system, declare your variables as a key/value array at the root level, then to use a variable anywhere in the configuration file,
just use the special variable notation as shown below.


### Declaring variables example

```yaml
variables:
    plugin: Light_Kit_Admin_UserData
    abc: 123
    myKey: sport
    # you can inject non-scalar values if you want
    fruits:  
        - apple
        - banana
# ...
```


### Using variables in fhe configuration file

```yaml

# ...
list:
    target_dir: {app_dir}/config/data/!{plugin}/Light_Realist/generated
# ...

```


### Replacing keys

You can also replace a key of an array by a variable, like this:

```yaml

# ...
list:
    !{myKey}: judo 
# ...

```







Logs
----------
2020-06-30


We believe in logs.

We use the [Light_Logger](https://github.com/lingtalfi/Light_Logger) plugin under the hood to provide a debugging mechanism, should you need to examine what we are doing in more details.

To enable the debug messages, you need to set the **useDebug** option to true, at our service configuration level.

By default, we send debug messages via the **real_generator.debug** channel, but you can change it via the options. See the api documentation for more details. 

Our service also exposes a **debugLog** method, if you want to write to our log (this is mainly intended for plugin authors who extend our service classes). 







