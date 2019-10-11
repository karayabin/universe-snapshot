My snippets
==============
2019-10-04



Here I'm starting a list of snippets I find useful to put here.




Mysql Transaction
-------------


phpStorm: transs

```php
/**
 * @var $db SimplePdoWrapperInterface
 */
$db = $this->container->get("database");
/**
 * @var $exception \Exception
 */
$exception = null;
$res = $db->transaction(function () {
    $END$
    
}, $exception);

if (false === $res) {
    throw $exception;
}

```
