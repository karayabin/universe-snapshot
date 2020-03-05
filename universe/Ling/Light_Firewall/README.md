Light_Firewall
===========
2019-07-18



A firewall service for the [Light](https://github.com/lingtalfi/Light) framework.
This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Firewall
```

Or just download it and place it where you want otherwise.




Summary
===========
- [Light_Firewall api](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)




Services
=========


This plugin provides the following services:

- firewall


The firewall service is meant to be hooked to the preroute phase of the [Light instance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md). 



Here is the content of the service configuration file:

```yaml
firewall:
    instance: Ling\Light_Firewall\LightFirewallService
    methods:
        setModules:
            modules: []
            # firewall module example below
#            modules:
#                -
#                    domain: *
#                    domain_subtract_routes:
#                        - /pages/b-login
#                    condition:
#                        is_logged_in_equals: false
#                    action:
#                        redirect_to_route: /pages/b-login



# --------------------------------------
# hooks
# --------------------------------------
$preroute_hub.methods.setRunners.runners:
    - @service(firewall)


```


Learn how to configure the firewall in the [conception notes](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/pages/conception-notes.md).












History Log
=============

- 1.1.0 -- 2019-11-19

    - update plugin to accommodate renamed Light_ReverseRouter service 
    
- 1.0.0 -- 2019-07-18

    - initial commit