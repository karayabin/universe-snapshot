Tim
===========
2015-12-11




Tim is a simple protocol to help with communication between a client and a server.
Upon a server's response, the client knows whether or not the server's response was a success or a failure.



Tim protocol
--------------

This is actually just an idea:

the client sends its request,
the server must respond with a json array containing two keys:

- t: string(e|s), the message type, e means error, s means success 
- m: mixed, the server's answer. The data can be a string or an array, or a bool, anything... 



Note: The name tim comes from the letters t and m.



Tools
----------

### TimServer (php)

TimServer is a php implementation of a tim server.
It helps you creating a php service.


#### Example code

The code below showcases the TimServer features.
It uses the [bigbang technique](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md) to autoload 
the classes.


 
```php  
<?php

require_once "bigbang.php"; // start the local universe


use Tim\TimServer\TimServer;
use Tim\TimServer\TimServerInterface;


TimServer::create()
    ->start(function (TimServerInterface $server) {
        if (isset($_POST['id'])) {
            // ...
            if ('valid') {
                $server->success("Congrats!");
            }
            else {
                throw new \Exception("division by zero!");
            }
        }
        else {
            $server->error("Oops");
        }
    })
    ->output();

```

#### Service provider code example

Since 1.4.0, this is a possible code example for service providers.

```php
<?php

require_once "bigbang.php"; // start the local universe


use Tim\TimServer\TimServer;
use Tim\TimServer\TimServerInterface;
use Tim\TimServerGlobal;


OpaqueTimServer::create()
    ->setServiceName ( 'myAwesomeTimService' )
    ->start(function (TimServerInterface $server) {
        if (isset($_POST['id'])) {
            // ...
            if ('valid') {
                $server->success("Congrats!");
            }
            else {
                throw new \Exception("division by zero!");
            }
        }
        else {
            $server->error("Oops");
        }
    })
    ->output();

```

The main difference with the previous example is that now the service has a name, 
and this allows the user (developer) to configure the service from her application. 
See [1.4.0 notes](https://github.com/lingtalfi/Tim/blob/master/doc/notes.1.4.0.md) for the rationale.





### tim functions (js)

Tim functions is a mini library of functions for a javascript client.
Just include the tim-functions.js script in your head and you're ready to go.


#### How to use?

tim functions depends on [jquery](https://jquery.com/).


The main function is timPost, which is a wrapper to the [jquery's post](http://api.jquery.com/jquery.post/) method.

```
jqXHR       timPost ( str:url, arrayObject:data, callback:onSuccess, callback:onFailure=null )
```


********

- Simple call:

```js
timPost("/service/event.php", {
    id: 20
}, function (msg) {
    console.log("timpost success");
});
```

If a tim error occurs (t=e), then by default the timError function is called, 
which alerts the error message to the user.
It is recommended that if you want to improve the error 
message appearance (fancy popup?) you simply override the timError function.

********

- Call with control on error:

You can also define the error handler on a per call basis.
```js
timPost("/service/event.php", {
    id: 20
}, function (msg) {
    console.log("timpost success");
}, function(msg){
    // note that the msg should be an array or a string, you can use the _timErrorToString function to create a string
    console.log("timpost error");
});
``` 
 
********
 
- Use Jquery jqXHR:


Since timPost returns a jqXHR object, you can still use its [methods](http://api.jquery.com/category/deferred-object/).
For instance, you can chain the timPost function to the always method of the jqXHR object.


```js 
timPost("/service/event.php", {
    id: 20
}, function (msg) {
    console.log("timpost success");
})
.always(function(){
    console.log("I'm always executed");
});
```


Note: this also works with the jqXHR's fail() method.

Do not confound a tim onFailure callback with the jqXHR's fail() method.

jqXHR's fail() method is concerned with network problems (wrong url),
whereas tim onFailure is concerned with application logic problems (user is not granted to perform some action...).
In the case of tim's onFailure, the server has been hit, while if the process goes down to jqXHR's fail() method,
it probably hasn't.

 
 
 
 
 
History Log
------------------
    
- 1.6.0 -- 2016-01-18

    - TimServer: add serviceName parameter to the log callback
    
- 1.5.0 -- 2016-01-18

    - TimServer: code re-organisation
    - TimServerGlobal: handles namespaces
        
- 1.4.0 -- 2016-01-18

    - add [external configuration layer for service provider](https://github.com/lingtalfi/Tim/blob/master/doc/notes.1.4.0.md)
        
- 1.3.0 -- 2016-01-17

    - add TransparentException mechanism
    
- 1.2.0 -- 2016-01-09

    - add timProcessResponse in tim-functions.js
    
- 1.1.0 -- 2015-12-27

    - add OpaqueTimServer
    
- 1.0.0 -- 2015-12-11

    - initial commit
    
     
 
 
 







