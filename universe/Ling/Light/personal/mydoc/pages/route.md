The route
---------

The route is an important concept used by various objects in the Light framework.

It acts a little bit as a convention around which we can start building more complex systems and objects.


A route is in fact a simple array with the following structure:

- name: string. The name of the route.
- pattern: string. The route pattern to match against the http request uri.
     The syntax depends on third party plugins.
     By default, an exact match only will pass.
- controller: the controller to execute if the route matches. 
            It can be anything: a string, a callback, an object, an array, depending on which plugin is interpreting it.
            By default, the Light instance expects it to be a php callback. 
- requirements: an array of requirements (defined by third party plugins). A requirement is a test for the http request.
                If a requirement fails, then the route doesn't match the http request.
- url_params: the array of key => value representing the variables passed via the url for this route.
             Those variables will later be injected as arguments of the controller, if the route matches.
             The url_params array is only fed if the route is dynamic and actually uses variables in its url.
             So for static routes, this array is just empty. 
             This array can also be used to generate the url out of a (dynamic) route pattern (if you know what variables does a 
             route pattern contains).
- host: string=null. The host associated to this route. This could be used in an application with subdomains for instance.
    Null means that there is no particular host attached to this route, and so the host should be resolved to the current host,
    no matter what it is. If your application uses different hosts, it is recommended to set this value explicitly (i.e. don't leave
    it to null). The null value is only convenient for applications which are using only one host. 
- is_secure_protocol: bool|null=null. Whether to use https or http protocol. If null, this means the route will use whatever 
    protocol is the default at the moment when the route is called.  
- is_ajax: bool=false. Whether the route is meant to be called via ajax. I found this information valuable
        for implementing the csrf protection with pages system (https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/page-security-conception-notes.md),
        where we need to launch a token cleaning routine, but only on the main calls (i.e. not ajax calls). 
         
  

