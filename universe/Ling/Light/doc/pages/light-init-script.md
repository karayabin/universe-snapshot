Light init script
================
2020-12-03



The light framework provides a script to initialize the app.



Amongst other things, the script creates the service container, and initializes the app.

Those are available as instances via the following variables:

- $container (references the service container) 
- $light (references the Light instance)


It's meant to be included in another script.



So for instance, if you want to create a quick php script that requires access to the
initialized app, you can simply do something like this:



```php

<?php 

require_once "../scripts/Ling/Light/app.init.inc.php";

$container->get('my_service')->testMethod();

 
```



