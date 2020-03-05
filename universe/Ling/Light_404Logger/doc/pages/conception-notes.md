Light_404Logger conception notes
=============
2019-12-11




The intent of this plugin is to log missing assets, or more generally to log the http requests that didn't match your light router.




I plan to implement the following features:


- file oriented approach: each file has its own configuration   
    - So that you can create specific files, such as:
        - one for logging missing assets
        - one for logging ips of offenders
        - one for logging real non existing routes of your app (legit genuine 404 that you missed)
        - etc...
- positive and negative filters (aka keepOnlyIf and excludeIf)
    



Synopsis
-----------

The router of the [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) instance of 
the [light framework](https://github.com/lingtalfi/Light) detects a non matching http request and throws an exception. 

Our plugin intercepts the offending http request and passes it through the filters (for each **file item** defined in the configuration).
At the end of the filters processing, either the http request survived or it was discarded by the filters.

If the http request survived, then it's formatted using the formatting defined in the **file item** configuration, so that it's more
suited to be logged.

The last step is the logging. We use the [Light_Logger](https://github.com/lingtalfi/Light_Logger) plugin internally because it provides file rotation based on file weight out of the box.









Filters
----------

For maximum flexibility, I plan to implement two complementary filters, one to allow only (aka positive filter) and the other to exclude only (aka negative filter).

This allows the user to log only certain types of (non matching) http requests, such as assets only, or blocking some ip addresses, 
or filtering out the http requests which start with a certain pattern, etc.



We basically use an array to define those filters.

Use the configuration example below to understand how it works.

The positive filter is first applied, then the output of the positive filter is passed to the negative filter.

In other words, the positive and negative filters are applied in series, and in that order.




```yaml
# Array. Optional = []. The array defining the filters.
# When a non matching route is detected (by the Light framework), our plugin passes the offending http request through those filters,
# to see whether the http request should be logged or ignored.  
filters:
    # Array. Optional = []. An array of positive filters. A positive filter will keep the http request only if it matches the condition described by that filter.
    # There are various types of positive filters, all of them are described below.
    keepOnlyIf:
        # Array. Optional = []. This filter keeps the http request only if the extension of the uri path matches one of the items defined in the array.
        # This can be useful to log the missing assets in your app.
        # For instance, this happened to me when I moved some js library from a location to another, and I forgot to update the call to the old assets.
        extension.inArray: 
            - css
            - js
            - jpg
            - jpeg
            - gif
            - png
            - eot
            - ttf
            - pdf
        
    # Array. Optional = []. An array of negative filters. A negative filter will rejects the http request if it matches the condition described by that filter.
    # There are various types of negative filters, all of them are described below.
    excludeIf:
        # Array|String. Optional = [].
        # Will filter out the http requests which uri path starts with any of the given items. If there is only one item, we can use the string form; in all other cases just use the array form.
        # This can be useful for instance to filter out some garbage requests that you get from malicious/annoying users who make non appropriated requests to your server (when they launch their routine robots...), so that you can keep your logs clean. 
        uri.startsWith:
            - /phpmyadmin/index.php
            - /wp-admin/login
            - /kii.php
            - /test.php
        # Array. Optional = []. Works the same as the filters.keepOnlyIf.extension.inArray positive filter, except that it filters out the http request in case of matching.
        extension.inArray: []
        # Array. Optional = []. 
        # If filters out the http request if the ip of the caller matches one of those defined in the array.
        # This might be useful if you are watching logs and you see a malicious user start a routine on your server, and you just want to prevent it from crowding your logs,
        # so you can ban it temporarily (or forever) on the fly.
        ip.inArray: 
            - 123.456.789.123 # I know, those are fakes but you get the idea...
            - 123.456.789.124
            - 123.456.789.125



```



Log format
-------------


The http request being an [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md), we need to convert it 
to a string before we can write it down to a file for instance, or send it via en email.

That's what the formatting does.

 
We do that by specifying the type of information we want, using a tagged expression, such as:

- {uri}
- uri: {uri}; ip: {ip}
- -- uri: {uri} {nr}-- ip: {ip}{nr}-- port: {port}


The following tags are available:

- {uri}: the uri of the http request (starting with a slash), including the query string if any
- {uriPath}: the uri of the http request (starting with a slash), NOT including the query string part if any
- {host}: the host of the http request
- {port}: the port number of the http request
- {protocol}: either the string "http" or the string "https", depending on the http request
- {ip}: the ip address bound with the http request
- {nr}: will be converted to a PHP_EOL (i.e. carriage return)


 
The configuration key is **httpRequestFormat**.

Note: the uri/uriPath lingo comes from the [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md),
basically: uri = uriPath + queryString
 
