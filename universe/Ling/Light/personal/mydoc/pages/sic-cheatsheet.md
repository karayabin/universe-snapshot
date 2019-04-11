Sic cheatsheet
================
2019-04-09


The sic notation used in Light is used inside the service configuration files.

Here is a cheatsheet of the special notations available:



Summary
============

- [Lazy override](#lazy-override)
- [variable references](#variable-references)
- [service references](#service-references)




Lazy override
----------

Overrides a value if it's scalar, or merge with it if it's an array.

We just prefix the dot path with a dollar symbol. 


### Overriding a non-scalar example

```yaml
$zephyr_template_vars.root_dir: /path/to/my_app
```


### Merging with an array example

Note: the merging source must also be an array.

```yaml
$initializer.methods.setInitializers.initializers:
    -
        instance: Ling\Light_PrettyError\Initializer\PrettyErrorInitializer
```


Note: this features comes from the [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/Util/SicFileCombinerUtil.php).




Variable references
-------------


### Simple variable reference example


Using the ${var} notation.


```yaml
my_vars:
    app_dir: /komin/jin_site_demo
    
    
just_an_example:
    arg1: ${my_vars.app_dir}
```


Note: this features comes from the [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/Util/SicFileCombinerUtil.php).




Service references
-------------

Injects already defined service instances anywhere.

We just use the **@service(service_name)** syntax.


### Simple service reference example


```yaml
reverse_router:
    instance: Ling\Light_ReverseRouter\ReverseRouter



# --------------------------------------
# hooks
# --------------------------------------
$initializer.methods.setInitializers.initializers:
    - @service(reverse_router)
```


