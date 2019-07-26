Light Firewall conception notes
========================
2019-07-17



In a [Light](https://github.com/lingtalfi/Light) application, before the routing phase there is the initializer phase
which let us hook some logic BEFORE the router kicks in (see the [run method of the Light class](https://github.com/lingtalfi/Light/blob/master/Core/Light.php) source code for more details).



The (light) firewall implementation leverages this mechanism and so is executed before the router.

The light firewall is a service executed at the initializer phase of the light application.


The service loops through the attached modules and execute them one by one.


What's a module
--------------

The light firewall uses the concept of modules.

A module is configured via the service configuration file (the .byml file, 
see the [light service container page](https://github.com/lingtalfi/Light/blob/master/doc/pages/light-service-container.md) for more info).


Each module is composed of the following elements:

- the domain 
- the condition
- the action


The **domain** is the domain of application of the module. What urls will trigger this module.
For instance is the module triggered for all urls, or just the ones that start with /admin, or the ones
which correspond to an array of routes that I provide, etc...


The **condition** is only tested if the url matched the **domain**.
The condition tests whether or not the firewall should fire or not (it's a boolean).
A typical condition is whether the user is logged in.  


The **action** is only triggered if the **condition** matched.
The action is the result of the firewall.

Often, it's a redirection action which is done by either providing an [http response](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md),
in which case the router phase (of the Light application) will be skipped entirely, or by rerouting the 
current [http request](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md).

The action could be something else though.


By convention, a module will not create a response if a response has already been created before (by another module for instance).

Modules use this kind of politeness between them, and the firewall service will call them all (because some modules action could
potentially be something else than redirecting the user).




The module configuration
--------------------

Here is an example of the firewall service, with a module using the built-in capabilities of the 
firewall service.


```yaml
firewall:
    instance: Ling\Light_Firewall\LightFirewallService
    methods:
        setContainer: 
            container: @container()
        setModules:
            modules:
                -
                    domain: *
                    domain_subtract_routes:
                        - /pages/b-login                    
                    condition:
                        is_logged_in_equals: false
                    action:
                        redirect_to_route: /pages/b-login




```

The service above applies to all urls (domain = *), the condition returns true when the user is not logged in,
in which case the action of redirecting to a route is executed.



From the snippet above, we can see the structure of the module emerge. A module is an array with the following structure:


- domain: string. If it's a string, the wildcard (*) means that all urls are part of the domain
- ?domain_subtract_routes: array. Subtract some routes from the domain. We usually use this when the domain is the wildcard.
        This requires the **router** service to be functional on your light application.
- condition: array. If it's an array, it can use the built-in capabilities of the light firewall service, which are:
        - is_logged_in_equals: bool. Whether the user is logged in or not. Under the hood, the ["user_manager" service](https://github.com/lingtalfi/Light_UserManager/) is used.
            If the **user_manager** service is not available, this capability will fail.
- action: array. If it's an array, it can use the built-in capabilities of the light firewall service, which are:
        - redirect_to_route: string. The route to redirect to. Under the hood, the LightFirewallService will try to 
        call the ["reverse_router" service](https://github.com/lingtalfi/Light_ReverseRouter).
        If the **reverse_router** service is not available, the action will fail.










