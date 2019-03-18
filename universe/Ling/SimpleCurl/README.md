SimpleCurl
===========
2019-03-14



A curl wrapper.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SimpleCurl
```

Or just download it and place it where you want otherwise.






Summary
===========
- [SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use?](#how-to-use)



How to use?
=============



```php
$url = "http://www.example.com/";
$curl = new SimpleCurl();
if (false !== $response = $curl->call($url)) {
    a($response->getHttpCode()); // int 200
    a($response->getHeaders());
    a($response->getBody());
} else {
    a($curl->getErrors());
}

```






History Log
=============

- 1.0.2 -- 2019-03-14

    - fix doc missing inserts

- 1.0.1 -- 2019-03-14

    - updating doc

- 1.0.0 -- 2019-03-14

    - initial commit