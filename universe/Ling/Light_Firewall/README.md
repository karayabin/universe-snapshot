Light_Firewall
===========
2019-07-18 -> 2021-03-05



A firewall service for the [Light](https://github.com/lingtalfi/Light) framework.
This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Firewall
```

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

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2019-11-19

    - update plugin to accommodate renamed Light_ReverseRouter service 
    
- 1.0.0 -- 2019-07-18

    - initial commit